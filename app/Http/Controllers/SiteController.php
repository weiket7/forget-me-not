<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Helpers\ViewHelper;
use App\Http\Requests\ContactRequest;
use App\Mail\AdoptionApplicationMail;
use App\Mail\ContactMail;
use App\Models\Adopt;
use App\Models\AdoptionForm;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Enums\AdoptStat;
use App\Models\Enums\BlogType;
use App\Models\Enums\EventType;
use App\Models\Event;
use App\Models\Gift;
use App\Models\Page;
use App\Models\Question;
use App\Models\Testimonial;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class SiteController extends Controller
{
    public function home(Request $request)
    {
        $data['featuredPost'] = Blog::getFeaturedPost();
        if (! $request->session()->get('rand')) {
            $request->session()->put('rand', rand());
        }
        $rand = $request->session()->get('rand');
        $data['adopts'] = Adopt::getFeaturedAdopts($rand);
        return view('home', $data);
    }
  
    public function giftShop(Request $request)
    {
        $gifts = Gift::orderBy('position')->get();
        $data['gift_chunks'] = $gifts->chunk(4);
        return view('gift-shop', $data);
    }
  
    public function events(Request $request)
    {
        if ($request->get('type') == 'B') {
            $data['events'] = Event::where('date', '>=', Carbon::today())->where('type', EventType::BasicObedienceClass)->orderBy('date', "desc")->get();
        } else {
            $adoption_drives = Event::where('date', '>=', Carbon::today())->where('type', EventType::AdoptionDrive)->get();
            $events = Event::where('date', '>=', Carbon::today())->where('type', '!=', EventType::AdoptionDrive)->orderBy('date', "desc")->get();
            $data['events'] = $adoption_drives->merge($events);
        }
        return view('events', $data);
    }
  
    public function event(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->first();
        $adopt_ids = DB::table('adoption_drive')->where('event_id', $event->event_id)->pluck('adopt_id');
        $data['adopts'] = Adopt::whereIn('adopt_id', $adopt_ids)->select('adopt_id', 'name', 'slug', 'image', 'birthday', 'gender', 'hdb')->get();
        $data['event'] = $event;
        return view('event', $data);
    }
  
    public function iWantToAdopt(Request $request)
    {
        $adopt_ids = $request->hearts;
        $data['adopts'] = Adopt::whereIn('adopt_id', explode(',', $adopt_ids))->get();
        return view('i-want-to-adopt', $data);
    }
  
    public function adoptionApplication(Request $request, $application_token)
    {
        $adoption_form = AdoptionForm::where('application_token', $application_token)->first();
        $data['questions'] = Question::orderBy('position')->select('content', 'is_header', 'question_id')->get();
    
        if ($request->isMethod("post")) {
            //var_dump($request->all()); exit;
  
            $adoption_form->saveApplication($request->all(), BackendHelper::getBrowser());
  
            $data_for_email['answers'] = $adoption_form->getAnswers($adoption_form->adoption_form_id);
            $data_for_email['dog_names'] = implode(", ", DB::table('adoption_form_adopt as afa')->join('adopt as a', 'afa.adopt_id', '=', 'a.adopt_id')
        ->where('adoption_form_id', $adoption_form->adoption_form_id)->pluck('name')->toArray());
            $data_for_email['adoption_form'] = $adoption_form;
            $adoption_application_mail = new AdoptionApplicationMail($data_for_email['adoption_form'], $data_for_email['answers'], $data_for_email['dog_names']);
  
            $pdf = PDF::loadView('emails.adoption-application', $data_for_email);
            $pdf_name = "ASD Adoption Application, " . $adoption_form->name . " on " . ViewHelper::formatDate($adoption_form->applied_on) . ".pdf";
            $adoption_application_mail->attachData($pdf->output(), $pdf_name);
  
            Mail::send($adoption_application_mail);
        }
    
        if ($request->isMethod("post") || $adoption_form->applied_on) {
            $data_for_email['answers'] = $adoption_form->getAnswers($adoption_form->adoption_form_id);
            $data['submitted'] = true;
            $answers = [];
            foreach ($data_for_email['answers'] as $a) {
                $answers[$a->question_id] = $a->answer;
            }
            $data['answers'] = $answers;
        }
        return view('adoption-application', $data);
    }
  
    public function adoptionAgreement(Request $request, $agreement_token)
    {
        $adoption_form = AdoptionForm::where('agreement_token', $agreement_token)->first();
        if ($adoption_form->agreed_on) {
            throw new Exception('getAgreement - Adoption form id = ' . $adoption_form->adoption_form_id . ' already agreed');
        }
  
        $data['adopt'] = Adopt::find($adoption_form->adopt_id);
        $data['adoption_form'] = $adoption_form;
        $data['answers'] = $adoption_form->getAnswers($adoption_form->adoption_form_id);
        //var_dump($data['answers']); exit;
        $data['agreement_token'] = $agreement_token;
        return view('adoption-agreement', $data);
    }
  
    public function volunteer(Request $request)
    {
        $data['contents'] = Page::getContents();
        return view('volunteer', $data);
    }
  
    public function donate(Request $request)
    {
        $data['content'] = Page::getContent('Donate');
        return view('donate', $data);
    }
  
    public function dogListenerAcademy(Request $request)
    {
        $data['content'] = Page::getContent('Dog Listener Academy');
        $data['events'] = Event::where('date', '>=', Carbon::today())->where('type', EventType::BasicObedienceClass)->orderBy('date', "desc")->get();
        return view('dog-listener-academy', $data);
    }
  
    public function trainingForm(Request $request)
    {
        $dates = Event::where('date', '>=', Carbon::today())->where('type', EventType::BasicObedienceClass)->orderBy('date')->pluck('date');
        $result = [''=>''];
        foreach ($dates as $date) {
            $result[$date] = ViewHelper::formatDate($date);
        }
        $data['dates'] = $result;
        $data['content'] = Page::where('title', 'Boarding Form')->value('content');
        return view('training-form', $data);
    }

    public function pages(Request $request, $slug)
    {
        $data['page'] = Page::where('slug', $slug)->first();
        return view('pages', $data);
    }
  
    public function dogsForAdoption(Request $request, $current_page = 1)
    {
        if (! $request->session()->get('rand')) {
            $request->session()->put('rand', rand());
        }
        $page_limit = 24;
        $offset = ($current_page-1)*$page_limit;
        $rand = $request->session()->get('rand');
        $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->skip($offset)->limit($page_limit)->get();
        $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
        $data['adopts_per_page'] = $page_limit;
        return view('adopt', $data);
    }
  
    public function adopt(Request $request, $slug)
    {
        $data['adopt'] =  Adopt::where('slug', $slug)->first();
        return view('adopt-view', $data);
    }
  
    public function adoptionDrive()
    {
        $event = Event::where('type', EventType::AdoptionDrive)->orderBy('date', 'desc')->first();
        $adopt_ids = DB::table('adoption_drive')->where('event_id', $event->event_id)->pluck('adopt_id');
        $data['adopts'] = Adopt::whereIn('adopt_id', $adopt_ids)->select('adopt_id', 'name', 'slug', 'image', 'birthday', 'gender')->get();
        $data['event'] = $event;
        return view('event', $data);
    }
  
    public function aboutUs(Request $request)
    {
        $data['content'] = Page::where('slug', 'who-we-are')->value('content');
        return view('about-us', $data);
    }
  
    public function form(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->saveContact($request->all());
        Mail::send(new ContactMail($contact));
    }
  
    public function contact(Request $request)
    {
        $data['contents'] = Page::getContents();
        return view('contact', $data);
    }
  
    public function boardingServices()
    {
        $data['content'] = Page::where('title', 'Boarding Services')->value('content');
        $data['testimonials'] = Testimonial::all();
        return view('boarding-services', $data);
    }
  
    public function boardingForm()
    {
        return view('boarding-form');
    }
  
    public function sponsor()
    {
        return view('sponsor');
    }
  
    public function news()
    {
        $data['posts'] = Blog::where('type', BlogType::News)->orderBy('posted_on', 'desc')->get();
        $data['type'] = 'News';
        return view('blog', $data);
    }
    public function goneToLovingHomes()
    {
        $data['posts'] = Blog::where('type', BlogType::GoneToLovingHomes)->orderBy('posted_on', 'desc')->get();
        $data['type'] = 'Gone to Loving Homes';
        return view('blog', $data);
    }
    public function dogsInNeed()
    {
        $data['posts'] = Blog::where('type', BlogType::DogsInNeed)->orderBy('posted_on', 'desc')->get();
        $data['type'] = 'Dogs In Need';
        return view('blog', $data);
    }
  
    public function post($slug)
    {
        $data['blog'] = Blog::where('slug', $slug)->first();
        return view('blog-post', $data);
    }
  
    public function paypal(Request $request, $amount)
    {
        $data['amount'] = $amount;
        return view('paypal', $data);
    }
}
