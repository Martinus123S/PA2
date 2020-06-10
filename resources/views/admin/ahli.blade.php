@extends('layout.layout')
@section('title','Daftar Ahli Bahasa')
@section('button')
<a href="{{route('daftarahlibahasa')}}">Daftar Ahli bahasa</a>
<a href="{{route('adminn')}}" class="btn btn-success">Beranda</a>
<a href="{{route('logout')}}"  class="btn btn-warning">Logout</a>
@endsection
@section('container')
<a href="{{route('adminn')}}"> &nbsp;<--Back</a>
<br><br>
<form action="{{route('daftarahli')}}" class="formstyle" method="POST">
    {{ csrf_field() }}  
      <div class="row register-form">
          <h4 class="formstyle">Daftar Ahli Bahasa</h4>
          <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Depan" value="{{old('namadepan')}}"/>
            </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <input type="email" name="email" placeholder="Email *" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{old('email')}}">
              @if($errors->has('email'))
                <div class="invalid-feedback">
                  {{$errors->first('email')}}
                </div>
              @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form-control {{$errors->has('username')?'is-invalid':''}}" value="{{old('username')}}">
              @if($errors->has('username'))
                <div class="invalid-feedback">
                  {{$errors->first('username')}}
                </div>
              @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <input type="password" name="password" placeholder="Kata Sandi" class="form-control {{$errors->has('password')?'is-invalid':''}}" required>
              @if($errors->has('password'))
                <div class="invalid-feedback">
                  {{$errors->first('password')}}
                </div>
              @endif
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" class="form-control" required>
            </div>
          </div>
          <div class="col-md-12">
            <input type="submit" class="form-control btn btn-primary">
          </div>
        </div>
      </form>
@endsection
