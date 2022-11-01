<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function product() {
        return view('pages.product');
    }

    public function news() {
        return view('pages.news');
    }
}
?>
