@extends('layout.layout')
@section('title','Dashboard')
@section('button')
<a href="{{route('daftarahlibahasa')}}">Daftar Ahli bahasa</a>
<a href="{{route('adminn')}}" class="btn btn-success">Beranda</a>
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
@endsection
@section('container')
<div class="container">
   <table class="table table-striped">
       @if($message = \Session::get('sukses'))
        <div class="alert alert-success alert-block">
            {{$message}}
        </div>
       @endif
       <tr>
           <th>Komen dari Berita</th>
           <th>Perbaikan dari user</th>
           <th>User</th>
           <th colspan="2">Status</th>
       </tr>
       @foreach($fix as $value)
        <tr>
        <td>{{$value->comment_content}}</td>
        <td>{{$value->fix_comment}}</td>
        <td>{{$value->username}}</td>
        <td>
            @if($value->status == 0)
            <h5 style="color: grey">Menunggu</h5>
            @elseif($value->status == 1)
            <h5 style="color: green">Benar</h5>
            @else
            <h5 style="color: red">Salah</h5>
            @endif
        <td>
        </tr>
       @endforeach

   </table>
   {{$fix->links()}}
</div>
@endsection
