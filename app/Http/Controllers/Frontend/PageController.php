<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function contact(){
        return view('frontend.pages.contact');
    }
}
