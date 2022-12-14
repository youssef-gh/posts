<?php

namespace App\Http\Controllers;

use App\Mail\Postliked;
use App\Models\Post;
use Illuminate\Http\Request;
use Mail;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    
    public function index() {
        // we use posts (collection) and not posts() (relations)
        
        // dd(Post::find(6)->created_at->toTimeString());

        return view('dashboard');
    }
}
