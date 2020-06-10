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
           <th>No</th>
           <th>Kata</th>
           <th>Label</th>
           <th>Kalimat</th>
           <th>Username</th>
           <th colspan="2" style="text-align: center">Option</th>
       </tr>
       @foreach($sentence as $value)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$value->words}}</td>
        <td>{{$value->word_cat}}</td>
        <td>{{$value->sentece}}</td>
        <td>{{$value->username}}</td>
        <td>
        <a href="/updateword/{{$value->id_word_users}}" class="btn btn-success">Setuju</a>
        </td>
        <td>
            <a href="/rejectword/{{$value->id_word_users}}" class="btn btn-danger">Tolak</a>
        </td>
        
        </tr>
       @endforeach

   </table>
   {{$sentence->links()}}
</div>
@endsection
