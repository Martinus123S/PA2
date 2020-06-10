@extends('layout.layout')
@section('title','Dashboard')
@section('button')
<a href="{{route('daftarahlibahasa')}}">Daftar Ahli bahasa</a>
<a href="{{route('adminn')}}" class="btn btn-success">Beranda</a>
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
@endsection
@section('container')
<div class="container">
    <br>
   <table class="table table-striped">
    <tr>
         <th>
            Username     
        </th>  
        <th>
            Keterangan
        </th>
        <th>
            Option
        </th>
    </tr>   
    @foreach($notif as $value)
    <tr>
        <td>
            {{$value->username}}
        </td>
        <td>
            Sudah Memperbaiki {{$value->total}} Komen
        </td>
        <td>
        <a href="/kirim/{{$value->username}}/{{$value->total}}" class="btn btn-success">Kirim Hadiah</a>
        </td>
    </tr>       
    @endforeach
    @foreach($word as $value)
    <tr>
        <td>
            {{$value->username}}
        </td>
        <td>
            Sudah Melabel sebanyak {{$value->total}} kata
        </td>
        <td>
        <a href="/kirimid/{{$value->username}}/{{$value->total}}" class="btn btn-success">Kirim Hadiah</a>
        </td>
    </tr>       
    @endforeach
   </table>
</div>
@endsection
