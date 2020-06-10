<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhliController extends Controller
{
    //
    public function index(){
        return view('ahlibahasa.index');
    }
    public function periksa(){
        $sentence = \DB::table('sentences')->join('words','sentences.sentence_id','=','words.sentence_id')
        ->join('word_users','words.words_id','=','word_users.words_id')
        ->join('categories_words','word_users.category_id','=','categories_words.category_id')
        ->select('word_users.id_word_users','sentences.sentece','words.words','categories_words.word_cat','word_users.username')
        ->where('status','=',0)->paginate(6);
        return view('ahlibahasa.periksa',compact('sentence'));
    }
    public function periksacheck(){
        $fix = \DB::table('user_comments')->join('comments','user_comments.comment_id','=','comments.comment_id')
        ->where('status','=','0')
        ->select('user_com_id','user_comments.comment_id','fix_comment','comment_content','username')->paginate(5);
        
        return view('ahlibahasa.periksachecking',compact('fix'));
    }
    public function update($id){
        $fix = \DB::table('user_comments')->where('user_com_id',$id)->update(['status'=>1]);
        
        \Session::flash('sukses','Berhasil Menyetujui');
        return redirect()->route('checking');
    }
    public function reject($id){
        $fix = \DB::table('user_comments')->where('user_com_id',$id)->update(['status'=>2]);
        \Session::flash('sukses','Berhasil Menolak');
        return redirect()->route('checking');
    }
    public function updateword($id){
        $fix = \DB::table('word_users')->where('id_word_users','=',$id)->update(['status'=>1]);
        \Session::flash('sukses','Berhasil Menyetujui');
        return redirect()->route('periksacheck');
    }
    public function rejectword($id){
        $fix = \DB::table('word_users')->where('id_word_users','=',$id)->update(['status'=>2]);
        \Session::flash('sukses','Berhasil Menolak');
        return redirect()->route('periksacheck');
        
    }
}
