<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\C3\Chart;
class PostagController extends Controller
{
    //
    public function index(){
        if(\Session::has('user')){
            $subject = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',1)->where('status','=',0)->first();
            $predikat = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',2)->where('status','=',0)->first();
            $keterangan = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',3)->where('status','=',0)->first();
            $pie  =	 \Charts::create('pie', 'highcharts')
            ->title('Chart Pelabelan yang belum di approve ahli bahasa')
            ->labels(['Subjek', 'Predikat', 'Keterangan'])
            ->values([$subject->total,$predikat->total,$keterangan->total])
            ->dimensions(1000,500)
            ->responsive(true);
            $subject = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',1)->where('status','=',1)->first();
            $predikat = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',2)->where('status','=',1)->first();
            $keterangan = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',3)->where('status','=',1)->first();
            $pies  =	 \Charts::create('pie', 'highcharts')
            ->title('Chart Pelabelan yang sudah di approve ahli bahasa')
            ->labels(['Subjek', 'Predikat', 'Keterangan'])
            ->values([$subject->total,$predikat->total,$keterangan->total])
            ->dimensions(1000,500)
            ->responsive(true);
            $subject = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',1)->where('status','=',2)->first();
            $predikat = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',2)->where('status','=',2)->first();
            $keterangan = DB::table('word_users')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('category_id','=',3)->where('status','=',2)->first();
            $piet  =	 \Charts::create('pie', 'highcharts')
            ->title('Chart Pelabelan yang di tolak ahli bahasa')
            ->labels(['Subjek', 'Predikat', 'Keterangan'])
            ->values([$subject->total,$predikat->total,$keterangan->total])
            ->dimensions(1000,500)
            ->responsive(true);
            $fixcom = DB::table("user_comments")->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('status','=',1)->first();
            $ignorecom = DB::table("user_comments")->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('status','=',2)->first();
            $waitcom = DB::table("user_comments")->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->where('status','=',0)->first();
            
            $fix = \Charts::create('pie', 'highcharts')
            ->title('Chart Memperbaiki kalimat')
            ->labels(['Yang sudah Benar', 'Yang Salah', 'Menunggu'])
            ->values([$fixcom->total,$ignorecom->total,$waitcom->total])
            ->dimensions(1000,500)
            ->responsive(true);
        return view('user.index1',compact('pie','pies','piet','fix'));
        }else{
            return redirect()->route('home');
        }
    }
    public function coba(){
        $news = DB::table('news')->get(['news']);
        // $news = explode(chr(1),str_replace(array(' '),chr(1),$news));
        // $split = explode(chr(3),str_replace(array('.',' ',','),chr(3),$row['news']));
        // echo "<pre>";
        // var_dump($news);
        // die();
        return view('debug.coba',compact('news',$news));
    }
    public function store(Request $request){
        $sentence = $request->new;
        $idsentence = $request->id;
        $kategori = $request->kategori;
        $total = count($request->id);
        
        for($i = 0; $i < $total; $i++){
            DB::table('words')->insert(['words'=>$sentence[$i],'sentence_id'=>$idsentence[$i]]);
            $kategoris = DB::table('words')->orderBy('words_id','desc')->get('words_id')->first();
            DB::table('word_users')->insert(['words_id'=>$kategoris->words_id,'words'=>$sentence[$i],'username'=>\Session::get('user')['username'],
            'category_id'=>$kategori[$i],'status'=>0]);
        }
        
        \Session::flash('sukses','Terimakasih Sudah Melakukan Pelabelan');
        return redirect()->route('user');
    }
    
    public function profile(){
        $reward = DB::table('notifikasi_user')->select(DB::raw('count(*) as total'))->where('username','=',\Session::get('user')['username'])->first();
        // var_dump($reward);
        // die();
        return view('user.profile',compact('reward'));
    }

   
    public function logout(){
        \Session::flush();
        return redirect()->route('home');
    }
    public function tagging(){
        $news = DB::table('sentences')->get()->random(5);
        $pilih['news'] =$news; 
        $kategori = DB::table('categories_words')->get();
        $pilih['kategori'] =$kategori; 
        
        // $news = explode(chr(1),str_replace(array(' '),chr(1),$news));
        // $split = explode(chr(3),str_replace(array('.',' ',','),chr(3),$row['news']));
        // echo "<pre>";
        // die();
        return view('user.tagging',compact('pilih',$pilih));
    }
    public function fixxing(){
        $comment = DB::table('comments')->get()->random(7);
        return view('user.fixxing',compact('comment',$comment));
    }
    public function doFix(Request $request){
        $count = count($request->comment);
        for($i = 0; $i <$count;$i++){
               if(empty($request->comment[$i])){
                \Session::flash('kosong','Harap mengisi semua field');
                return redirect()->route('fixxing');
            }
        }
        for($i = 0; $i <$count;$i++){
            DB::table('user_comments')->insertGetId(['username'=>\Session::get('user')['username'],'comment_id'=>$request->id[$i],'fix_comment'=>$request->comment[$i],'status'=>0]);
        }
        \Session::flash('sukses','Terimakasih Sudah Melakukan perbaikan');
        return redirect()->route('user');
    }
    public function notif(){
        $notif = \DB::table('notifikasi_user')->join('reward','notifikasi_user.id_reward','=','reward.id_reward')->where('username','=',\Session::get('user')['username'])->get();
        return view('user.notif',compact('notif'));
    }
}
