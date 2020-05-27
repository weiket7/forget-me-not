<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        return view("admin");
    }
  
    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            if (!Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
                return view("login", ['error'=>true]);
            } else {
                return redirect("backend");
            }
        }
        return view("login");
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect("login");
    }
  
    public function uploadImage(Request $request)
    {
        $name_with_extension = $request->upload->getClientOriginalName();
        $name_without_extension = explode('.', $name_with_extension)[0];
      
        $image_name = BackendHelper::uploadImage($request->folder, $name_without_extension, $request->upload);
        $data['uploaded'] = 1;
        $data['url'] = url('/') . '/images/'.$request->folder.'/'.$image_name;
        return $data;
    }
    
    public function deleteRecord(Request $request)
    {
        DB::table($request->table)->where($request->column, $request->id)->delete();
    }
}
