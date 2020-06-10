<?php

namespace App\Http\Controllers;

use Twilio\Rest\Verify\V2\Service\VerificationCheckInstance;
use Twilio\Rest\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Role;
use App\User;
class UserController extends Controller
{
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
        //
        $role = Role::where('role','user')->first();
        $this->validate($request,[
            'username' =>'required|min:6|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'no_telpon'=>'required|unique:users'
        ]);
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($request->no_telpon, "sms");
        
        User::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'no_telpon'=>$request->no_telpon,
            'password'=>bcrypt($request->password),
            'id_role'=>$role->id_role,
        ]);

        return redirect()->route('verify')->with(['phone_number' => $request->no_telpon]);
    }
    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
                    if ($verification->valid) {
            $user = tap(User::where('no_telpon', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            \Session::flash('sukses','Nomor sudah terverifikasi silahkan login');
            return redirect()->route('home');
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }
    public function postLogin(Request $request){
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];
        $user = User::where('email',$request->username)->first();
        if(\Auth::attempt($credentials) == 1 && $user->id_role==1){
            \Session::put('user',$user);
            return redirect()->route('user');
        }
        if(\Auth::attempt($credentials) == 1 && $user->id_role==2){
            \Session::put('user',$user);
            return redirect()->route('adminn');
        }
        if(\Auth::attempt($credentials) == 1 && $user->id_role==3){
            \Session::put('user',$user);
            return redirect()->route('ahlibahasa');
        }
        if(\Auth::attempt($credentials) == 0){
            // \Session::put('user',$user);
            \Session::flash('gagal','Akun tidak ditemukan, Silahkan Register');
            return redirect()->route('home');
        }
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
    public function edit($id)
    {
        //
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
        
    }
}
