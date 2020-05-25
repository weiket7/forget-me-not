<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Adopt;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Enums\AdoptStat;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data['posts'] = Blog::getLatestPosts();
        return view('home', $data);
    }
    public function adopt(Request $request, $slug)
    {
        $data['adopt'] =  Adopt::where('slug', $slug)->first();
        return view('adopt-view', $data);
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

    public function contactForm()
    {
        return view('contact');
    }
    
    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->saveContact($request->all());
        Mail::send(new ContactMail($contact));
        if (Mail::failures()) {
            $mainEmail = Setting::getMainEmail();
            return redirect()->back()->with('error', 'An error occurred, please email '.$mainEmail. ' directly');
        }
        return redirect(url()->previous() . '#contact')->with("success", 'Your message has been sent. We will get back to you once we can.');
    }
    
    public function volunteer(Request $request)
    {
        $data['page'] = Content::where('page', 'volunteer')->pluck('content', 'key');
        return view('volunteer', $data);
    }

    public function view(Request $request, $slug)
    {
        $data['adopt'] = Adopt::where('slug', $slug)->first();
        return view('view', $data);
    }
  
    public function about(Request $request)
    {
        $data['page'] = Content::where('page', 'about')->pluck('content', 'key');
        return view('about', $data);
    }
  
    public function sponsor(Request $request)
    {
        $data['page'] = Content::where('page', 'sponsor')->pluck('content', 'key');
        return view('page', $data);
    }
  
    public function merchandise(Request $request)
    {
        $data['page'] = Content::where('page', 'merchandise')->pluck('content', 'key');
        return view('page', $data);
    }
  
    public function events(Request $request)
    {
        $data['page'] = Content::where('page', 'events')->pluck('content', 'key');
        return view('page', $data);
    }

    public function donate(Request $request)
    {
        $data['page'] = Content::where('page', 'donate')->pluck('content', 'key');
        return view('donate', $data);
    }
    
    public function blog(Request $request)
    {
        $data['posts'] = Blog::get();
        return view('blog', $data);
    }
}
