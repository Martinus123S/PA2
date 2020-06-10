<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function index(){
        if(!\Session::get('user')){
            return redirect()->route('home');
        }
        return view('admin.index');
    }
    public function daftar(){
        return view('admin.ahli');
    }
    public function lihatuser(){
        $user = User::where('id_role','=','1')->paginate(5);

        return view('admin.lihat',compact('user'));
    }
    public function lihatchecking(){
        $fix = \DB::table('user_comments')->join('comments','user_comments.comment_id','=','comments.comment_id')
        ->select('user_com_id','user_comments.comment_id','fix_comment','comment_content','username','status')->paginate(5);
        
        return view('admin.lihatfixed',compact('fix'));
    }
    public function sendnotif(Request $request){
        if($request->total >= 30 && $request->total <=70){
            \DB::table('notifikasi_user')->insertGetId(['username'=>$request->id,'id_reward'=>121]);
            \DB::table('user_comments')->where('username','=',$request->id)->update(['status'=>1]);
            \Session::flash('sukses','Berhasil Mengirim Hadiah');
            return redirect()->route('adminn');
        }
    }
    public function sendnotifid(Request $request){
        if($request->total >= 70 && $request->total <=120){
            \DB::table('notifikasi_user')->insertGetId(['username'=>$request->id,'id_reward'=>121]);
            \DB::table('word_users')->where('username','=',$request->id)->update(['status'=>1]);
            \Session::flash('sukses','Berhasil Mengirim Hadiah');
            return redirect()->route('adminn');
        }
    }
    public function prosesDaftar(Request $request){
        $role = Role::where('role','ahli bahasa')->first();
        $this->validate($request,[
            'username' =>'required|min:6|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);
        User::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'no_telpon'=>0,
            'password'=>bcrypt($request->password),
            'id_role'=>$role->id_role,
        ]);
        \Session::flash('sukses','Ahli Bahasa Sudah Di masukkan');
        return redirect()->route('adminn');
    }
    public function notif(){
        $notif = \DB::table('user_comments')->select(\DB::raw('count(*) as total,username'))->where('status','=',1)->havingRaw('COUNT(*)>=30')->groupBy('username')->get();
        
        $word = \DB::table('word_users')->select(\DB::raw('count(*) as total,username'))->where('status','=',1)->havingRaw('COUNT(*)>=70')->groupBy('username')->get();
        return view('admin.notif',compact('notif','word'));
    }
    public function show(){
        $user = User::paginate(10);
        return view('admin.lihatuser',['user'=>$user]);
    }
    public function logout(){
        \Session::flush();
        return redirect()->route('home');
    }
    public function lihatword(){
        $sentence = \DB::table('sentences')->join('words','sentences.sentence_id','=','words.sentence_id')
        ->join('word_users','words.words_id','=','word_users.words_id')
        ->join('categories_words','word_users.category_id','=','categories_words.category_id')
        ->select('word_users.id_word_users','sentences.sentece','words.words','categories_words.word_cat','word_users.username','word_users.status')->paginate(6);
        return view('admin.lihatword',compact('sentence'));
    }
}
