<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function indexAnnouncement (){
        $announcemets = Announcement::all();
        return view ('announcements.index' , compact('announcements'));
    }

}
