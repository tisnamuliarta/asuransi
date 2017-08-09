<?php

namespace App\Http\Controllers\Member;

use App\Bonus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashids;
use DB;

class BonusController extends Controller
{
    public function displayBonuses($id)
    {
        $decode = Hashids::decode($id);
        $query = Bonus::select('user_id',DB::raw('SUM(bonus_referensi) as bonus_referensi'), DB::raw('SUM(bonus_berbagi) as bonus_berbagi'))
            ->where('user_id','=',$decode)
            ->groupBy('user_id')
            ->first();

        return view('member.display-bonus', compact('query'));
    }
}
