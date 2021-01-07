
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

    <title>RICHDEVID - SHARE YOUR FEELING</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $GLOBALS['path'] ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $GLOBALS['path'] ?>/css/starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <?php session_start();
    function randomuname($length = 6) {
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"), 0, $length);
    }
    if (isset($_SESSION['username'])) {
    $usernamenya = $_SESSION['username'];
    } else {
    $unamerand = randomuname();
    $usernamenya = 'anon_'.$unamerand.'';
    $_SESSION['username'] = $usernamenya;
    }


    function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }
  $ip = get_client_ip();
    ?>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SHARE YOUR FEELINGS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="/miniframework/public/home/about">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
   if(isset($_POST['submit'])){
      $name = $usernamenya;
      $post = $_POST['feelingku'];
      $time = date('Y-m-d H:i:s', time());
      $ip = $ip;
      $test = $this->model('Posts')->postbaru($name,$post,$time,$ip); ?>
      <div class="alert alert-success" role="alert">
        Sukses memasukkan keluh kesah!
      </div>
      <?php
    //  var_dump($test);
   }

   ?>

    <div class="container">

      <div class="starter-template">
        <h1>Selamat datang!</h1>
        <p class="lead">Sekarang kamu dapat mengeluarkan keluh kesah kamu tanpa mengungkap identitasmu<br> Semua yang dipost bersifat anon.</p>
      </div>
      <form method="post">
  <div class="form-group">
    <label for="inputpost">Kata-kata</label>
    <textarea class="form-control" rows="3" id="yourfeeling" name="feelingku" placeholder="Hari ini aku...." required ></textarea>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" required> Saya bersedia mematuhi Terms of Service</input>
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form><br><br>
<h2 style="text-align:center">KELUH KESAH ORANG-ORANG</h2>
<ul class="list-group">
<?php foreach ($data['post'] as $posts){ ?> <li class="list-group-item">

      <b>Oleh</b> : <?php echo $posts['name']; ?> <br>
      <b>Jam</b> : <?php echo $posts['date']; ?><br>
      <b>Post</b> : <?php echo $posts['post']; ?>

  <?php }?>
</li>
  </ul>
    </div>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo $GLOBALS['path'] ?>/js/bootstrap.min.js"></script>
  </body>
</html>
