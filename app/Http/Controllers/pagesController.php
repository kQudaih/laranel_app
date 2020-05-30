<?php

namespace BestBlog\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $title = ' Hello to index';
        return view('pages.index') -> with('title', $title);       
    }
    
    public function about(){
        return view('pages.about');
    }
    
    public function services(){
        
        $data = [
            'title' => ' The following services are providing: ',
            'services' => [
                'programming','automation','web design'
            ]
        ];
        return view('pages.services')->with($data);
    }
}
