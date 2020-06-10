@extends('layout.layout')
@section('title','Dashboard')
@section('container')
@if($message = \Session::get('sukses'))
  <div class="alert alert-success alert-block">
    <strong>{{$message}}</strong>
  </div>
@endif
@if($message = \Session::get('gagal'))
  <div class="alert alert-danger alert-block">
    <strong>{{$message}}</strong>
  </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container register">
                <div class="row">
                    <div class="col-md-7 register-left">
                      <h1 style="color: ; margin-top:70px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Postag Indonesia</h1>
                      <h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">POS Tag merupakan suatu cara pengkategorian kelas kata, seperti kata benda, kata kerja, kata sifat, dan lain-lain</h4>
                    </div>
                    <div class="col-md-5 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="background:white;box-sizing:border-box; border:2px solid white;">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <br>
                          <form action="/login" method="post">
                          {{ csrf_field() }} 
                              <div class="row register-form">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <input type="submit" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="tab-pane fade show " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                            <form action="/register" method="POST">
                                {{ csrf_field() }}  
                                  <div class="row register-form">
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
                                        <div class="form-group">
                                          <input type="text" name="no_telpon" id="" class="form-control" placeholder="Masukkan Nomor Telepon">
                                          <small id="emailHelp" class="form-text text-muted">Menggunakan Awalan +628xxxxxxx</small>
                                          @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                              {{$errors->first('no_telpon')}}
                                            </div>
                                          @endif 
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <input type="submit" class="form-control btn btn-primary">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection