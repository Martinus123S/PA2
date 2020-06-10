<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="{{asset('/image/logo.png')}}">
  <title>POSTAG</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('/css/bootstrap.min1.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('/css/simple-sidebar.css')}}" rel="stylesheet">

</head>
@php($option = "")

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper" style="background-color: #d7ebf4">
      <div class="sidebar-heading"><img src="{{asset('/image/logo1.png')}}">POSTAG </div>
      <div class="list-group list-group-flush" style="background-color: #d7ebf4">
      <a href="{{route('user')}}" class="list-group-item list-group-item-action">Beranda</a>
        <a href="{{route('fixxing')}}" class="list-group-item list-group-item-action">Memperbaiki Kalimat</a>
        <a href="{{route('tagging')}}" class="list-group-item list-group-item-action ">Pelabelan Kata</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #d7ebf4">
        <button class="btn btn-primary" id="menu-toggle">=</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#a" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Selamat datang,{{\Session::get('user')['nama']}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('profile')}}">Profil</a>
                <a class="dropdown-item" href="#">Notifikasi</a>
                <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logoutuser')}}">Keluar</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
<br>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  
        <form action="{{route('cobalagi')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @php($id = 0 )
            @php($idtext = 0 )
            @php($cat_id=0)
            @foreach($pilih['news'] as $new)
                @php($values = explode(chr(2),str_replace(array(' ',','),chr(2),$new->sentece)))
                        
                    @foreach($values as $value)
                    {{-- @php() --}}
                    <input style="width: 100px;" type="hidden" name ="id[{{$id++}}]" value="{{$new->sentence_id}}">
                    <input style="width: 100px;" type="text" name ="new[{{$idtext++}}]" value="{{$value}}" readonly>
                    
                    @endforeach
                    
                    <br>
                    
                    @for($l = 0; $l < count($values);$l++)
                      <select style="width: 100px;" name="kategori[{{$cat_id++}}]" id="">
                          <option value="1">Subjek</option>
                          <option value="2">Predikat</option>
                          <option value="3">Objek</option>
                          <option value="4">Keterangan</option>
                        </select>
                    @endfor
                    <br>
                    <hr>
            @endforeach
            <button type="submit" name="submit">Submit</button>
            </form>
            
            
          </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('/js/jquery.min1.js')}}"></script>
  <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("document").ready(function(){
    setTimeout(function(){
        $("div.alert").fadeOut(1000);
    }, 2000 ); // 5 secs
  });
  </script>

</body>

</html>
