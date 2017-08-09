<?php

namespace App\Http\Controllers\Member;

use App\AdminNote;
use App\OrderMessages;
use App\OrderPinCode;
use App\PinCode;
use Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helper\DisplayDatatableController;
use Mail;
use App\Mail\RegisterMember;

class MemberController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except' => 'tree']);
	}

	public function tree($id)
    {
        try {
            $decrypt_id = decrypt($id);
            $user = User::with('children')->where('id',$decrypt_id)->get();
            return response()->json($user);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function show(Request $request, $id)
    {
    	try {
	    	$decrypt_id = decrypt($id);
			$user = User::findOrFail($decrypt_id)->first();
    	} catch (DecryptException $e) {
    		abort(404);
    	}

    	return view('member.show',compact('user'));
    }

    public function addDownline($id)
    {
        $datatable = new DisplayDatatableController();

        return view('member.add-downline');
    }

    public function decodeId($id)
    {
        return Hashids::decode($id);
    }

    public function getAddDownlineForm(Request $request, $id)
    {
        $realId = $this->decodeId($id);
        $orderPins = DB::table('order_pin_codes')
                ->join('pin_codes',function ($join) {
                    $join->on('order_pin_codes.id','=','pin_codes.order_pin_id')
                    ->where('pin_codes.status','=',0);
                })
                ->where('order_pin_codes.user_id','=', $realId)
                ->select('order_pin_codes.id','pin_codes.pinCode','pin_codes.status')->get();
        return view('member.get-add-downline', compact('orderPins'));
    }

    public function postAddDownline(Request $request, $id)
    {
        $decode = $this->decodeId($id);
        //validate input
        $this->validateInput($request);

        $this->saveUser($request);

        // dd($request->input('name'));
        return redirect()->back()->with('status','Member Berhasil dibuat!');

    }
    protected function saveUser(Request $request)
    {
        $password = $this->generatePassword();
        //save data to database
        $user = User::where('pinCode','=',$request->pinCode)->first();
        $user->name = $request->name;
        $user->parent_id = $request->uplineName;
        $user->sponsorName = $request->sponsorName;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->slug = str_slug($request->name);
        $user->bank_id = $request->bankName;
        $user->bankNumber = $request->bankNumber;
        $user->address = $request->address;
        $user->phoneNumber = $request->phoneNumber;
        $user->momName = $request->momName;
        $user->ahliwaris = $request->ahliwaris;
        $user->save();

        $adminNote = new AdminNote();
        $adminNote->user_id = $user->id;
        $adminNote->name = $request->name;
        $adminNote->password = $password;
        $adminNote->pinCode = $request->pinCode;
        $adminNote->save();

        $pinCode = PinCode::where('pinCode','=',$request->pinCode)->first();
        $pinCode->status = 1;
        $pinCode->save();

        $content = [
            'pinCode' => $request->pinCode,
            'password' => $password,
            'name' => $request->name
        ];

        // send email
        Mail::to($request->email)->send(new RegisterMember($content));
    }

    protected function generatePassword()
    {
        $password = mt_rand(100000,999999);
        return $password;
    }


    protected function parentId($name)
    {
        if ($this->checkUserCount() == 0) {
            return null;
        } else {
            $pin = User::where('id',$name)->first();
            return $pin->id;
        }
    }

    /**
     * validate input for create new user
     *
     * @param Request $request
     * @return void
     */
    public function validateInput(Request $request)
    {
        //validate if there are no data on table users
        // validate if there are no user
        $this->validate($request, [
            'pinCode' => 'required',
            'sponsorName' => 'required',
            'uplineName' => 'required',
            'name' => 'required|unique:users|min:3',
            'email' => 'required|email',
            'bankName' => 'required',
            'bankNumber' => 'required|numeric|unique:users',
            'address' => 'required',
            'phoneNumber' => 'required',
            'momName' => 'required',
            'ahliwaris' => 'required'
        ]);
    }

    /**
     * check users table count
     *
     * @return void
     */
    protected function checkUserCount()
    {
        $user = User::count();
        return $user;
    }

    public function getOrderPinForm($id)
    {
        $decode = Hashids::decode($id);
        return view('pins.displaySendForm');
    }

    public function postOrderPinForm(Request $request, $id)
    {
        $this->validate($request, [
           'totalOrder' => 'required'
        ]);

        $orderMessages = new OrderMessages();
        $orderMessages->user_id = $request->user()->id;
        $orderMessages->total = $request->totalOrder;
        $orderMessages->keterangan = $request->keterangan;
        $orderMessages->save();

        return redirect()->back()->with('status', 'Pesan Berhasil dikirim!');
    }
}
