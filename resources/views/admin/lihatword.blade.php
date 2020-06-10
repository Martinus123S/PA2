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
           <th>No</th>
           <th>Kata</th>
           <th>label</th>
           <th>Kalimat</th>
           <th colspan="2">Status</th>
       </tr>
       @foreach($sentence as $value)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$value->words}}</td>
        <td>{{$value->word_cat}}</td>
        <td>{{$value->sentece}}</td>
        <td>
            @if($value->status == 0)
            <h4 style="color: grey">Menunggu</h4>
            @elseif($value->status == 1)
            <h4 style="color: green">Benar</h4>
            @else
            <h4 style="color: red">Salah</h4>
            @endif
        <td>
        </tr>
       @endforeach

   </table>
   {{$sentence->links()}}
</div>
@endsection
