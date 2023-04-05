<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome() 
    {
        $announcements = Announcement::take(6)->orderBy('created_at' , 'desc')->get();
        
        return view('welcome' , compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow' , compact('category'));
    }
}
