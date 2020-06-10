@extends('layout.layout')
@section('title','Dashboard')
@section('button')
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
<a href="{{route('ahlibahasa')}}" class="btn btn-success">Beranda</a>
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
           <th>Username</th>
           <th colspan="2">Option</th>
       </tr>
       @foreach($fix as $value)
        <tr>
        <td>{{$value->comment_content}}</td>
        <td>{{$value->fix_comment}}</td>
        <td>{{$value->username}}</td>
        <td>
        <a href="/update/{{$value->user_com_id}}" class="btn btn-success">Setuju</a>
        </td>
        <td>
            <a href="/reject/{{$value->user_com_id}}" class="btn btn-danger">Tolak</a>
        </td>
        
        </tr>
       @endforeach

   </table>
   {{$fix->links()}}
</div>
@endsection
