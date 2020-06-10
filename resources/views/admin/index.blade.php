@extends('layout.layout')
@section('title','Dashboard')
@section('button')
<a href="{{route('daftarahlibahasa')}}">Daftar Ahli bahasa</a>
<a href="{{route('adminn')}}" class="btn btn-success">Beranda</a>
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
@endsection
@section('container')
<div>
    <div class="jumbotron jumbotron-fluid">
        <h1 style="text-align:center;">Selamat Datang Admin</h1>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            @if($message = \Session::get('sukses'))
            <div class="alert alert-success alert-block">
                {{$message}}
            </div>
            @endif
        </div>
        <div class="col-md-3 ml-5" style="background-color:white;  border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">User</h1>
            <center><img src="{{asset('/image/user-1.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:white;"><a href="{{route('lihatuser')}}"><h1 style="text-align:center;">Lihat</h1></a></div>
       
        </div>
        <div class="col-md-3 ml-5" style="background-color:white;  border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">Pelabelan Kata</h1>
        <center><img src="{{asset('/image/tagging2.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:white;"><a href="{{route('lihatword')}}"><h1 style="text-align:center;">Lihat</h1></a></div>
        </div>
        
        <div class="col-md-3 ml-5" style="background-color:white; border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">Perbaikan Kalimat</h1>
            <center><img src="{{asset('/image/checking1.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:white;"><a href="{{route('lihatfixed')}}"><h1 style="text-align:center;">Lihat</h1></a></div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-3 mt-5" style="background-color:white; border:1px solid black; border-radius:10px;">
            <h1 style="text-align:center">Notifikasi</h1>
            <center><img src="{{asset('/image/notif1.png')}}" width="200px" alt="" srcset=""></center>
        <div style="background-color:white;"><a href="{{route('notif')}}"><h1 style="text-align:center;">Lihat</h1></a></div>
        </div>
    </div>
    <br><br>
</div>
@endsection
