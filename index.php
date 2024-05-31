<?php
include'functions.php';
// if(empty($_SESSION['login']))
//     header("location:login.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <title>RE-CYCLE</title>
    <link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>           
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?">RE-CYCLE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">              
            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu"> 
                    <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
                    <li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-th-list"></span> Nilai bobot kriteria</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-film"></span> Alternatif <span class="caret"></span></a>              
                <ul class="dropdown-menu" role="menu">                 
                    <li><a href="?m=alternatif"><span class="glyphicon glyphicon-film"></span> Alternatif</a></li>
                    <li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-signal"></span> Nilai bobot alternatif</a></li>    
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span> Perhitungan <span class="caret"></span></a>              
                <ul class="dropdown-menu" role="menu">                 
                <li><a href="?m=ahp_topsis"><span class="glyphicon glyphicon-equalizer"></span> AHP-TOPSIS</a></li>
                    <li><a href="?m=ahp_saw"><span class="glyphicon glyphicon-stats"></span> AHP-SAW</a></li>    
                </ul>
            </li>              
            <!-- <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li> -->
            <!-- <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>                                -->
          </ul>          
          <div class="navbar-text"></div>
        </div><!--/.nav-collapse -->
    </div>
    </nav>

    <div class="container">
    <?php
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <!-- <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> TugasAkhir.Id <em class="pull-right">Updated 17 September 2018</em></p>
      </div>
    </footer> -->
</body>
</html>