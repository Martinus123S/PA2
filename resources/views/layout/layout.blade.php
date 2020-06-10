<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{asset('/image/logo.png')}}">
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('/css/bootstrap.min.css')}}">
  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <script src="{{asset('/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/js/popper.js')}}"></script>
  <style type="text/css">
  body {
    background-image: url('{{ asset('/image/bg2.jpg')}}');


  /* Center and scale the image nicely */
  background-repeat: no-repeat;
  background-size: cover;
  }
  .w-80{width:80%!important}
  .formstyle{
    max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
  }
 
  </style>
</head>
<body>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('/js/font.js')}}" crossorigin="anonymous"></script>
<style>
  

</style>
<!------ Include the above in your HEAD tag ---------->
<div class="d-flex bd-highlight">
  <div class="p-2 w-75 bd-highlight">
    <img src="{{asset('/image/logo.png')}}" alt=""></div>
  <div class="p-2 flex-shrink-1 bd-highlight mt-4">@yield('button')</div>
</div>
@yield('container')
<script>
  $("document").ready(function(){
  setTimeout(function(){
      $("div.alert").fadeOut(1000);
  }, 2000 ); // 5 secs
});
</script>