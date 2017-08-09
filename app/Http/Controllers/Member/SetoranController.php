<?php

namespace App\Http\Controllers\Member;

use App\Setoran;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Hashids;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class SetoranController extends Controller
{
	public function index($id)
	{
		try {
			$decode_id = Hashids::decode($id);
		} catch(Exception $e) {
			abort(404);
		}
		return view('setoran.index',compact('setoran'));
	}

	public function displayConfirmForm($id)
	{
	    $decode = Hashids::decode($id);
	    return view('setoran.confirm');
	}

	public function postConfirmForm(Request $request)
    {
        $this->validate($request, [
            'dateSetoran' => 'required|date',
            'file' => 'required|file|mimes:jpg,png,jpeg,tif,pdf|max:1024"'
        ]);

        $name = $this->uploadFile($request);
        $total = 350000;

        Setoran::create([
            'user_id' => $request->user()->id,
            'dateSetoran' => $request->input('dateSetoran'),
            'totalSetoran' => $total,
            'images' => $name
        ]);

        return redirect(route('user.setoranindex', Hashids::encode($request->user()->id)))->with('status','Konfirmasi terkirim!');
    }

    protected function uploadFile(Request $request)
    {
        $file = Input::file('file');
        $name = str_random(30).'-'.  $request->user()->id . '.' . $file->getClientOriginalExtension();
//        Input::file('file')->move('/public/upload/setoran', $name);
        $path = $request->file('file')->storeAs(
            'setoran', $name
        );
        return $name;
    }

    public function displaySendMessage()
    {
        return view();
    }
}
