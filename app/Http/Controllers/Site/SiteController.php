<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	/* página inicial do site */
    public function index()
    {
    	return view('site.home');
    }
}
