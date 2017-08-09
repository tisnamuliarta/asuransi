<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\User;
use App\UserTree;
use App\PinCode;
use App\Bank;
use App\AdminNote;
use Auth;
use Hashids;
use DB;
use Faker\Factory;

class MemberController extends Controller
{
    /**
     * constructor
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * autocomplete for search bank name
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function autocompleteBank(Request $request)
    {
        $query = $request->get('term','');
        $banks = Bank::where("name","LIKE","%".$query."%")->get();

        $data=array();
        foreach ($banks as $bank) {
                $data[]=array('value'=>$bank->name,'id'=>$bank->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }


        /**
     * auto complete for search upline name
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term','');
        $users = User::where("name","LIKE","%".$query."%")->get();

        $data= []; $dataUser = [];

        foreach ($users as $user) {
            $dataUser[]=array('value'=>$user->name,'id'=>$user->id);
        }
        // total data
        $total = count($dataUser);

        $uplines = User::join('users as parent', 'parent.parent_id','=','users.id')->select('users.id','users.parent_id','users.name',DB::raw('count(*) as children'))->groupBy('users.id')->get();

        foreach ($users as $user) {
            foreach ($uplines as $upline) {
                if (($upline->children <=3) && ($upline->id != $user->id)) {
                    $data[]=array('value'=>$user->name,'id'=>$user->id);
                }
            }   
        }

        if ($total) {
            if ($total == 1) {
                return $dataUser;
            }else {
                return $data;
            }
        }else {
            return ['value'=>'No Result Found','id'=>''];
        }
    }

    /**
     * show downline
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function downline($id)
    {
        $users = User::find(Hashids::decode($id))->first();
        $parent = User::where('parent_id', '=', $users->id);
        $allDownline = User::pluck('name', 'id')->all();
        $trees = User::select('id','parent_id','name')->get();
        return view('member.showDownline', compact('users', 'trees'));
    }

    /**
     * show member pins order
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showPins(Request $request,$id)
    {
        $id = Hashids::decode($id);
        $users = User::find($id)->first();
        return view('member.showPins', compact('users'));
    }

    /**
     * [getDataPins description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getDataPins($id)
    {
        $order_id = Hashids::decode($id);
        DB::statement(DB::raw('set @rownum=0'));
        $user = PinCode::select(DB::raw('@rownum := @rownum + 1 as NO'),'id', 'order_pin_id','pinCode', 'status')
                        ->where('order_pin_id', $order_id)->get();
        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                $id = Hashids::encode($user->id);
                if ($user->status == 0) {
                    return '<a href="'.route('editpin.index', $id).'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                }else {
                    return '<a href="'.route('user.show', $id).'" class="btn btn-sm btn-success btn-fill" target="_blank"><i class="glyphicon glyphicon-edit"></i> Details</a>';
                }
                
            })
            ->editColumn('status', function($user) {
                if ($user->status == 0) {
                    return '<span class="label label-warning">Pin belum digunakan</span> ';
                }else {
                    return '<span class="label label-info">Pin sudah digunakan</span>';
                }
            })
            ->filterColumn('NO', function($query, $keyword){
                $query->whereRaw('@rownum  + 1 like ?', ["%{$keyword}%"]);
            })
            ->rawColumns(['status', 'action'])
            ->escapeColumns()
            ->make(true);
    }

    /**
     * [addMember description]
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addMember()
    {
        return view('member.add');
    }

    /**
     * Searches for the first match.
     * @param      \Illuminate\Http\Request  $r      { parameter_description }
     * @return     <type>                    ( description_of_the_return_value )
     */
    public function search(Request $r)
    {
        $search = $r->get('search');
        $users = User::where('name', 'like', '%'.$search.'%')->orderBy('name')->paginate(10);
        return view('member.search', compact('users'));   
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserTree::create([
            'user_id' => $request->user_id,
            'parent_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function storeEditPin(Request $request, $id)
    {
        // validate request
        $this->validate($request, [
            'pinCode' => 'unique:users',
            'upline_name' => 'required',
            'name' => 'required',
            'username' => 'required',
            'address' => 'required|min:10',
            'phone_number' => 'required|numeric',
            'momName' => 'required',
            'ahliwaris' => 'required',
            'bankName' => 'required',
            'bankNumber' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        // select upline username base on input
        $uplineName = $request->input('upline_name');
        $upline = User::where('name', $uplineName)->first();

        // create faker object
        $faker = Factory::create();
        $password = mt_rand(1000000-9999999);
        $temp_pass = $password;

        $user = User::create([
            'parent_id' => $upline->id,
            'pinCode' => $request->input('kodePin'),
            'sponsorName' => $request->input('sponsor_name'),
            'uplineName' => $request->input('upline_name'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'slug' => str_slug($request->input('username')),
            'address' => $request->input('address'),
            'phoneNumber' => $request->input('phone_number'),
            'momName' => $request->input('momName'),
            'ahliwaris' => $request->input('ahliwaris'),
            'bankName' => $request->input('bankName'),
            'bankNumber' => $request->input('bankNumber'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);

        PinCode::where('pinCode', '=', $request->input('kodePin'))
            ->update(['status' => 1]);
        $parent = User::where('name', '=', $request->input('sponsor_name'))->first();
        $pinCode = $request->input('kodePin');
        AdminNote::create([
            'user_id' => $user->id,
            'created_by' => $parent->id,
            'pinCode' => $pinCode,
            'username' => $user->username,
            'password' => $temp_pass,
        ]);


        return redirect(route('show.pins', Hashids::encode(Auth::user()->id)));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpin($id)
    {
        $user = PinCode::find(Hashids::decode($id))->first();
        $sponsor = User::select('name')->where('id', '=', $user->order_pin_id)->first();
        return view('member.pin.edit', compact('user', 'sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
