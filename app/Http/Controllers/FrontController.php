<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome() 
    {
        $announcements = Announcement::where('is_accepted', true)->take(6)->orderBy('created_at', 'DESC')
        ->get();
        
        return view('welcome' , compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow' , compact('category'));
    }

    public function becomeRevisor()
    {
	Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    return redirect()->back()->with('message' , 'Complimenti! Hai richiesto di diventare revisore correttamente');
    }
    Public function  makeRevisor (User $user)
    {
	Artisan::call('presto:make-user-revisor' , ["email"=>$user->email]);
	return redirect('/')->with('message.revisor' , "Complimenti! L'utente è diventato revisore");
    }
    public function searchAnnouncements (Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted' , true)->paginate(10);

        return view('announcements.index' , compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale' , $lang);
        return redirect()->back();
    }
}
