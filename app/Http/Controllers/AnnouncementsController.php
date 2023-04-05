<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function createAnnouncement(){
    return view ('announcements.create');
    }
}
