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
      <div class="container-fluid">
        @if($message = \Session::get('kosong'))
        <div class="alert alert-danger alert-block">
        <strong>{{$message}}</strong>
        </div>
        @endif
        <div class="row mt-3">
          <div class="col-md-12">
            <h3 style="text-align: center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Silahkan Perbaiki Kalimat tersebut</h3>
          </div>
          <div class="col-md-12">
              
    <form action="{{route('dofix')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @php($id = 0)
        @foreach($comment as $com)
        <input type="hidden" name="id[]" value="{{$com->comment_id}}">
          <h6>{{$com->comment_content}}</h6>
          <input type="text"  class="form-control" id="myText" name="comment[]"/>
        @endforeach
        <br>
        <button class="btn btn-success" type="submit" id="start_button" name="submit">Submit</button>
        </form>
        
        
      </div>
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
