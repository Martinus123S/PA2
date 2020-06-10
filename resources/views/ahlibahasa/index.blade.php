@extends('layout.layout')
@section('title','Dashboard')
@section('button')
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
<a href="{{route('ahlibahasa')}}" class="btn btn-success">Beranda</a>
@endsection
@section('container')
<div>
    <div class="jumbotron jumbotron-fluid">
        <h1 style="text-align:center;">Selamat Datang Ahli Bahasa</h1>
    </div>
    
    <div class="row" style="padding: 100px">
     
        <div class="col-md-5" style="background-color:white;  border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">Periksa Kalimat</h1>
            <center><img src="{{asset('/image/checking1.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:lightblue;"><a href="{{route('checking')}}"><h1 style="text-align:center;">Periksa</h1></a></div>
       
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5" style="background-color:white;  border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">Periksa Pelabelan</h1>
        <center><img src="{{asset('/image/tagging2.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:lightblue;"><a href="{{route('periksacheck')}}"><h1 style="text-align:center;">Periksa</h1></a></div>
        </div>
    </div>
    <br><br>
</div>
@endsection
