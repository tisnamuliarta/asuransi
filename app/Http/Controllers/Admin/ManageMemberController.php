<?php

namespace App\Http\Controllers\Admin;

use App\Banks;
use App\User;
use App\AdminNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\RegisterMember;


class ManageMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => 'postAddMember']);
    }

    public function index()
    {
        $banks = Banks::all();
        $nullValue = null;
        return view('admin.add-member.index', compact('banks','nullValue'));
    }

    /**
     * add member to system
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postAddMember(Request $request) 
    {
        $this->validateInput($request);
        //save user
       $this->saveUser($request);

        // dd($request->input('name'));
        return redirect()->back()->with('status','User created succesfull!');
    }

    protected function saveUser(Request $request)
    {
        $password = $this->generatePassword();
        $pinCode = $this->generatePinCode();
         //save data to database
        $user = new User();
        $user->name = $request->name;
        $user->parent_id = $request->uplineName;
        $user->sponsorName = $request->sponsorName;
        $user->pinCode = $pinCode;
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
        $adminNote->pinCode = $pinCode;
        $adminNote->save();

        $content = [
            'pinCode' => $pinCode,
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
     * generate pin code for user
     *
     * @return void
     */
    protected function generatePinCode()
    {
        $pin = 'GN-' . mt_rand(100000,999999). '-' . str_random(2);
        return $pin;
    }


    /**
     * validate input for create new user
     *
     * @param Request $request
     * @return void
     */
    protected function validateInput(Request $request)
    {
        //validate if there are no data on table users
        // validate if there are no user
        if ($this->checkUserCount() != 0 ) {
            $this->validate($request, [
                'sponsorName' => 'required',
                'name' => 'required|unique:users|min:3',
                'email' => 'required|email|unique:users',
                'bankName' => 'required',
                'bankNumber' => 'required|numeric|unique:users',
                'address' => 'required',
                'phoneNumber' => 'required',
                'momName' => 'required',
                'ahliwaris' => 'required'
            ]);
        }
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

    public function getMember()
    {
        return view('admin.add-member.display');
    }
}
