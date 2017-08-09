<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$id = Auth::user()->id;
    	$user = User::findOrFail($id)->first();
        return view('welcome',compact('user'));
    }
}
