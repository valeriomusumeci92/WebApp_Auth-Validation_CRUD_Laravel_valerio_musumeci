<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index (){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view ('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', "Complimenti,annuncio accettato");
    }
    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message' , "Annuncio rifiutato con successo");
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


}
