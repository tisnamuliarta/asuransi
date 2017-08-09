<?php

namespace App\Http\Controllers\Helper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banks;
use App\User;
use App\PinCode;
use App\OrderPinCode;
use DB;

class AutoCompleteController extends Controller
{
    public function getBanks(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Banks::select("id","name")
                ->where("name","LIKE","%$search%")->get();
        }
        return response()->json($data);
    }

    public function getMemberName(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = User::select("id","name")
                ->where("name","LIKE","%$search%")->get();
        }
        return response()->json($data);
    }


    public function getSponsorName(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = User::select("id","name")
                ->where("name","LIKE","%$search%")->get();
        }
        return response()->json($data);
    }

    public function getUplineName(Request $request)
    {
        $data = [];
        $datausers = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = User::select("id","name")
                ->where("name","LIKE","%$search%")->get();

            $uplines = User::select('id','name', DB::raw('(select count(id) from users as child where child.parent_id=users.id LIMIT 1) as children'))->get();

            foreach ($uplines as $upline) {
                foreach ($data as $key) {
                    if ($upline->children < 3 && ($key->name == $upline->name)) {
                        $datausers[] = array('id' => $key->id,'name' => $key->name);
                    }
                }
            }
        }
        return response()->json($datausers);   
    }
}
