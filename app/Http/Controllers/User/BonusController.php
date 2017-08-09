<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BonusController extends Controller
{
   public function index()
   {
   	return view('bonus.index');
   }

   public function countBonus($id)
   {

   }
}
