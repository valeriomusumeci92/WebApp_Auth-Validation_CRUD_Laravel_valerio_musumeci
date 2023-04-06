<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function createAnnouncement(){
    return view ('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement ){
        return view ('announcements.show' , compact('announcement'));
    } 

    public function indexAnnouncement(){
        $announcements = Announcement::where('is_accepted', true)->paginate(3);
        return view ('announcements.index' , compact('announcements'));
    }

}
