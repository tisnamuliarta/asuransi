<?php

namespace App\Http\Controllers\Admin;

use App\Bonus;
use App\BonusHistory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setoran;

class SetoranMemberController extends Controller
{
    protected $arrayBonus = [
      '9000','8000','7000','6000','5000','4500','4000','3500','3000','2750','2500','2000','1750','1250','750'
    ];
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.setoran.index');
    }

    public function postConfirm(Request $request, $id)
    {
        $user_id = $request->input('user_id');

        $setoran = Setoran::findOrFail($id);
        $setoran->status = 1;
        $setoran->save();

        $this->countBonus($user_id, $setoran->id);

        return redirect()->back()->with('success', 'Setoran Terkonfirmasi!');
    }

    public function countBonus($id, $setoran_id)
    {
        $user_id = User::where('id','=',$id)->first();
        $parent = User::where('id','=',$user_id->parent_id)->first();
        $sponsor = User::where('id','=',$user_id->sponsorName)->first();
        $setoran = Setoran::find($setoran_id);
        //if member has parent id giver them bonus
        if ($sponsor) {
            $bonus = new Bonus();
            $bonus->user_id = $sponsor->id;
            $bonus->bonus_referensi = 30000;
            $bonus->save();
        }

       if ($user_id->parent_id != null) {

           $bonus = new Bonus();
           $bonus->user_id = $parent->id;
           $bonus->bonus_berbagi = 9000;
           $bonus->save();

           // level 2
           $l2 = User::where('id','=',$parent->id)->first();
           $pl2 = User::where('id','=',$l2->parent_id)->first();
           if ($l2->parent_id != null) {
               $bonus2 = new Bonus();
               $bonus2->user_id = $pl2->id;
               $bonus2->bonus_berbagi = 8000;
               $bonus2->save();

               // level 3
               $l3 = User::where('id','=',$pl2->id)->first();
               $pl3 = User::where('id','=',$l3->parent_id)->first();
               if ($l3->parent_id != null) {
                   $bonus3 = new Bonus();
                   $bonus3->user_id = $pl3->id;
                   $bonus3->bonus_berbagi = 7000;
                   $bonus3->save();

                   // level 4
                   $l4 = User::where('id','=',$pl3->id)->first();
                   $pl4 = User::where('id','=',$l4->parent_id)->first();
                   if ($l4->parent_id != null) {
                       $bonus4 = new Bonus();
                       $bonus4->user_id = $pl4->id;
                       $bonus4->bonus_berbagi = 6000;
                       $bonus4->save();

                       // level 5
                       $l5 = User::where('id','=',$pl4->id)->first();
                       $pl5 = User::where('id','=',$l5->parent_id)->first();
                       if ($l5->parent_id != null) {
                           $bonus5 = new Bonus();
                           $bonus5->user_id = $pl5->id;
                           $bonus5->bonus_berbagi = 5000;
                           $bonus5->save();

                           //level 6
                           $l6 = User::where('id','=',$pl5->id)->first();
                           $pl6 = User::where('id','=',$l6->parent_id)->first();
                           if ($l6->parent_id != null) {
                               $bonus6 = new Bonus();
                               $bonus6->user_id = $pl6->id;
                               $bonus6->bonus_berbagi = 4500;
                               $bonus6->save();

                               // level 7
                               $l7 = User::where('id','=',$pl6->id)->first();
                               $pl7 = User::where('id','=',$l7->parent_id)->first();
                               if ($l7->parent_id != null) {
                                   $bonus7 = new Bonus();
                                   $bonus7->user_id = $pl7->id;
                                   $bonus7->bonus_berbagi = 4000;
                                   $bonus7->save();

                                   // level 7
                                   $l8 = User::where('id','=',$pl7->id)->first();
                                   $pl8 = User::where('id','=',$l8->parent_id)->first();
                                   if ($l8->parent_id != null) {
                                       $bonus8 = new Bonus();
                                       $bonus8->user_id = $pl8->id;
                                       $bonus8->bonus_berbagi = 3500;
                                       $bonus8->save();

                                       // level 7
                                       $l9 = User::where('id','=',$pl8->id)->first();
                                       $pl9 = User::where('id','=',$l9->parent_id)->first();
                                       if ($l9->parent_id != null) {
                                           $bonus9 = new Bonus();
                                           $bonus9->user_id = $pl9->id;
                                           $bonus9->bonus_berbagi = 3000;
                                           $bonus9->save();

                                           // level 7
                                           $l10 = User::where('id','=',$pl9->id)->first();
                                           $pl10 = User::where('id','=',$l10->parent_id)->first();
                                           if ($l10->parent_id != null) {
                                               $bonus10 = new Bonus();
                                               $bonus10->user_id = $pl10->id;
                                               $bonus10->bonus_berbagi = 2750;
                                               $bonus10->save();

                                               // level 7
                                               $l11 = User::where('id','=',$pl10->id)->first();
                                               $pl11 = User::where('id','=',$l11->parent_id)->first();
                                               if ($l11->parent_id != null) {
                                                   $bonus11 = new Bonus();
                                                   $bonus11->user_id = $pl11->id;
                                                   $bonus11->bonus_berbagi = 2500;
                                                   $bonus11->save();

                                                   // level 7
                                                   $l12 = User::where('id','=',$pl11->id)->first();
                                                   $pl12 = User::where('id','=',$l12->parent_id)->first();
                                                   if ($l12->parent_id != null) {
                                                       $bonus12 = new Bonus();
                                                       $bonus12->user_id = $pl12->id;
                                                       $bonus12->bonus_berbagi = 2000;
                                                       $bonus12->save();

                                                       // level 7
                                                       $l13 = User::where('id','=',$pl12->id)->first();
                                                       $pl13 = User::where('id','=',$l13->parent_id)->first();
                                                       if ($l13->parent_id != null) {
                                                           $bonus13 = new Bonus();
                                                           $bonus13->user_id = $pl13->id;
                                                           $bonus13->bonus_berbagi = 1750;
                                                           $bonus13->save();

                                                           // level 7
                                                           $l14 = User::where('id','=',$pl13->id)->first();
                                                           $pl14 = User::where('id','=',$l14->parent_id)->first();
                                                           if ($l14->parent_id != null) {
                                                               $bonus14 = new Bonus();
                                                               $bonus14->user_id = $pl14->id;
                                                               $bonus14->bonus_berbagi = 1250;
                                                               $bonus14->save();

                                                               // level 7
                                                               $l15 = User::where('id','=',$pl14->id)->first();
                                                               $pl15 = User::where('id','=',$l15->parent_id)->first();
                                                               if ($l15->parent_id != null) {
                                                                   $bonus15 = new Bonus();
                                                                   $bonus15->user_id = $pl15->id;
                                                                   $bonus15->bonus_berbagi = 750;
                                                                   $bonus15->save();
                                                               }
                                                           }
                                                       }
                                                   }
                                               }
                                           }
                                       }
                                   }
                               }
                           }
                       }
                   }
               }
           }

           $bonus_history = new BonusHistory();
           $bonus_history->user_id = $setoran->user_id;
           $bonus_history->setoran_id = $setoran->id;
           $bonus_history->bonus_id = $bonus->id;
           $bonus_history->save();
       }
        //repeat until 15 level
    }

    public function getBonus($id, $bonus)
    {
        // level 7
        $l7 = User::where('id','=',$id->id)->first();
        $pl7 = User::where('id','=',$l7->parent_id)->first();
        if ($l7->parent_id != null) {
            $bonus7 = new Bonus();
            $bonus7->user_id = $pl7->id;
            $bonus7->bonus_berbagi = $bonus;
            $bonus7->save();
        }
    }
}
