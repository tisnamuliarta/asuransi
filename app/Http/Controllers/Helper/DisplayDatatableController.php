<?php

namespace App\Http\Controllers\Helper;

use App\OrderPinCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Setoran;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hashids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DisplayDatatableController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth', ['except' => ['getMemberData','adminGetSetoran','getListOrder']]);
    }

    public function getSetoran(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $setoran = Setoran::select([
                DB::raw('@rownum := @rownum + 1 as rownum'),
                'id', 'user_id', 'dateSetoran', 'images', 'status', 'updated_at'
            ])
            ->where('user_id',Auth::user()->id)->get();
        
        $datatables = Datatables::of($setoran)
            ->editColumn('images', function ($q) {
                return '
                    <a href="/public/upload/setoran/'.$q->images.'" target="_blank">
                    <img style="width: 60px" class="img-responsive img-small" src="/public/upload/setoran/'.$q->images.'">
                    </a>
                   ';
            })
            ->addColumn('action', function($q) {
                $id = Hashids::encode($q->id);
                if ($q->status == 0) {
                    return '<a href="" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                }
            })
            ->editColumn('status', function ($q) {
                if ($q->status == 0) {
                    return '<span class="label bg-orange"><i class="glyphicon glyphicon-edit"></i> pending</span>';
                }else {
                    return '<span class="label bg-green"><i class="glyphicon glyphicon-edit"></i> confirm</span>';
                }
            })
            ->rawColumns(['images','action','status'])
            ->escapeColumns();
        
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rowNum + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    public function adminGetSetoran(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $setoran = Setoran::join('users', 'setorans.user_id', 'users.id')
                ->select([
                DB::raw('@rownum := @rownum + 1 as rownum'),
                'setorans.*','users.name as name', 'users.id as user_id'
            ])
            ->get();
        
        $datatables = Datatables::of($setoran)
            ->addColumn('action', function($q) {
                $id = Hashids::encode($q->id);
                return '<a href="" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Details</a>';
            })
            ->editColumn('images', function ($q) {
                return '
                    <a href="/public/upload/setoran/'.$q->images.'" target="_blank">
                    <img style="width: 40px" class="img-responsive img-small" src="/public/upload/setoran/'.$q->images.'">
                    </a>
                   ';
            })
            ->editColumn('status', function ($q) {
                if ($q->status == 0) {
                    return '<span class="label bg-orange">pending </span>
                        <form method="post" style="margin-top: 10px;" action="'.route('confirm-setoran', $q->id).'">
                            '.csrf_field().'
                            <input type="hidden" name="user_id" value="'.$q->user_id.'">
                            <button type="submit" class="btn btn-sm btn-info">Konfirmasi Setoran</button>
                        </form>
                    ';
                }else {
                    return '<span class="label bg-green">confirm</span>';
                }
            })
            ->rawColumns(['status','images'])
            ->escapeColumns();
        
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rowNum + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    public function getMemberData(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $users = User::join('users as parent', 'users.parent_id', 'parent.id')
            ->join('users as sponsor', 'users.sponsorName', 'sponsor.id')
            ->join('banks', 'users.bank_id', 'banks.id')
            ->select([
                 DB::raw('@rownum := @rownum + 1 as rownum'),
                'users.*', 'parent.name as upline', 'sponsor.name as sponsor', 'banks.name as bankName'
            ])
            ->get();

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '
                    <a href="" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Details</a>
                ';
            })
            ->editColumn('avatar', function($user){
                return '<img class="img-responsive img-small" src="/public/img/user/'.$user->avatar.'">';
            })
            ->rawColumns(['avatar', 'action', 'uplineName'])
            ->escapeColumns()
            ->make(true);
    }

    public function getListOrder()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $orders = OrderPinCode::join('users', 'order_pin_codes.user_id', 'users.id')
            ->select([
                DB::raw('@rownum := @rownum + 1 as rownum'),
                'users.name', 'order_pin_codes.amount', 'order_pin_codes.orderTotal','order_pin_codes.status', 'order_pin_codes.id'
            ])
            ->get();

        return Datatables::of($orders)
            ->editColumn('status', function ($q) {
                if ($q->status == 0) {
                    return '<span class="label bg-orange">pending </span>
                        <form method="post" style="margin-top: 10px;" action="'.route('confirm-order', $q->id).'">
                            '.csrf_field().'
                            <input type="hidden" name="amount" value="'.$q->amount.'">
                            <input type="hidden" name="order_pin_id" value="'.$q->id.'">
                            <input type="hidden" name="user_order_id" value="'.$q->user_id.'">
                            <button type="submit" class="btn btn-sm btn-info">Konfirmasi Pin</button>
                        </form>
                    ';
                }else {
                    return '<span class="label bg-green">confirm</span>';
                }
            })
            ->editColumn('orderTotal', 'Rp. {{ $orderTotal}}')
            ->rawColumns(['status','images'])
            ->escapeColumns()
            ->make(true);
    }

    public function getMemberDownline($id)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $user = User::select([
            DB::raw('@rownum := @rownum + 1 as rownum'),
            'id', 'avatar', 'name', 'sponsorName'
        ])
            ->where('parent_id',$id)->get();

        $datatables = Datatables::of($user)
            ->addColumn('sponsor', function ($q) {
                $user = User::where('sponsorName','=',$q->sponsorName)->first();
                return $user->name;
            })
            ->addColumn('action', function ($q) {
                return '<a class="btn btn-info btn-sm" href="'.route("add.downline", $q->id).'">Details</a>';
            })
            ->editColumn('avatar', function($user){
                return '<img style="width: 50px" class="img-responsive img-small" src="/public/img/user/'.$user->avatar.'">';
            })
            ->rawColumns(['avatar','action','name'])
            ->escapeColumns();

        return $datatables->make(true);
    }

    public function getBonus()
    {

    }
}
