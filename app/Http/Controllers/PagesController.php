<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __invoke()
    {
        if(request()->slug){
            $page = Page::query()->where('slug',request()->slug)->firstOrFail();
            return view('home',compact('page'));
        }else {
            $page = Page::query()->where('slug','welcome')->firstOrFail();
            return view('home',compact('page'));
        }
    }
}
