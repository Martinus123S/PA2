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
           <th>Nama</th>
           <th>Username</th>
           <th>Email</th>
           <th>No Telepon</th>
       </tr>
       @foreach($user as $users)
       <tr>
        <td>{{$users->nama}}</td>
        <td>{{$users->username}}</td>
        <td>{{$users->email}}</td>
        <td>
            {{$users->no_telpon}}
        </td>
        
        </tr>
        @endforeach
   </table>
   {{$user->links()}}
</div>
@endsection
