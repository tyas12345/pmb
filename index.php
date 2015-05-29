<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Penerimaan Mahasiswa Baru</title>
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="1/index.html">Home</a>
    </div>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div><button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">About</a></li>
        <li><a href="#">Admin</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/full-slider.css" rel="stylesheet">
    </head>
    <body>

  <div class="page-header">
      <img src="img/header.jpg" style="width:1350px;">
  </div>
     
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <center><div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="header-unesa.jpg">
    </div> 

    <div class="item">
      <img src="BEM_UNESA.jpg">
    </div>

    <div class="item">
      <img src="wawancarastan-1.jpg">
    </div>

    <div class="item">
      <img src="IMG_7729.jpg" >
    </div>
  </div></center>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
  <div class="container" style="margin-top:50px;">
    <ul class="nav nav-tabs">
  		<li role="presentation" class="active"><a href="#JSP" data-toggle="tab">Jadwal SPMB</a></li>
  		<li role="presentation"><a href="#Pend" data-toggle="tab">Pendaftaran</a></li>
        <li role="presentation"><a href="#Peng" data-toggle="tab">Pengumuman</a></li>
	</ul>
    
    <div class="tab-content">
    	<div class="tab-pane fade in active" id="JSP">
        	<h1>Jadwal SPMB</h1>
            <table class="table table-striped">
            	<tr>
                	<th>Gelombang SPMB</th>
                    <th>Jenjang Pendidikan</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Tanggal Ujian Tulis-Wawancara</th>
                    <th>Tanggal Pengumuman</th>
                    <th>Status</th>
                </tr>
                <?php
                	$con = mysql_connect('localhost','root','');
					mysql_select_db("pmb",$con);
					$jadwal = mysql_query("SELECT jm.GELOMBANG_SP, j.NAMA_JENJANG, jm.TGL_PENDAFTARAN, jm.TGL_UJIAN_TULIS___WAWANCR, jm.TGL_PENGUMUMAN, jm.stts_jal FROM jalmas_spmb jm inner join jenjang_pendidika j on jm.ID_JENJANG = j.ID_JENJANG");
					
					while($row = mysql_fetch_array($jadwal)){
						$f1 = $row['GELOMBANG_SP'];
						$f2 = $row['NAMA_JENJANG'];
						$f3 = $row['TGL_PENDAFTARAN'];
						$f4 = $row['TGL_UJIAN_TULIS___WAWANCR'];
						$f5 = $row['TGL_PENGUMUMAN'];
            $f6 = $row['stts_jal'];
				?>
                <tr>
                	<td><?php echo $f1?></td>
                	<td><?php echo $f2?></td>
                	<td><?php echo $f3?></td>
                	<td><?php echo $f4?></td>
                	<td><?php echo $f5?></td>
                  <td><?php echo $f6?></td>
                </tr>
                <?php 
					}
				?>
			</table>
        </div>
        <div class="tab-pane fade" id="Pend">
        <center><div class="col-md-12" style="margin-top:50px;">
        	<h1>Pendaftaran SPMB</h1>

            <h3>Registrasi terlebih dahulu setelah membayar biaya pendaftaran</h3>
        	
             <!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<center><div class="panel panel-default" id="pendaf" style="margin-top:50px; width:60%;">
  <div class="panel-heading">
    <h3 class="panel-title">Registrasi</h3>
  </div>
  <div class="panel-body">
   	<h5>Masukkan nomer rekening pembayaran!<h5>
    <form method="post" action="index.php">  
    <input type="text" id="userName" class="form-control input-sm chat-input" name="trans" placeholder="Nomer Transaksi" style="width:70%;"/>
    <input type="submit" name="regis-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Registrasi" style="width:60%; background-color:#0CF; margin-top:20px;">
    </form>
  </div>
  <div class="Peringatan" style="color:red; margin-bottom:10px;">
  <?php
  $con = mysql_connect('localhost','root','');
  mysql_select_db("pmb",$con);  
  
    if(isset($_POST['regis-submit'])) {
        $No_reken = $_POST['trans'];
        $r_reken = mysql_query("select Nomer_rekening, stts_pemb from transaksi_pembayaran where Nomer_rekening = '$No_reken' and stts_pemb=0");

        if(mysql_num_rows($r_reken)){  
            echo "<script>window.open('SPMB/Registrasi.php','_self')</script>";
        }
        else{  
            echo "Maaf nomer yang anda masukkan tidak valid !!!"; 
        } 
    }
?>
</div>
</div></center>

			<h3>LogIn untuk mengisi form pendaftaran</h3>
    <!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<center><div class="panel panel-default" id="pendaf" style="margin-top:50px; width:60%;">
  <div class="panel-heading">
    <h3 class="panel-title">LogIn Sebagai Pendaftar</h3>
  </div>
  <div class="panel-body">
    <center><div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <div class="form-login">
			<form action="index.php" method="post">
            <h3>LogIn</h3>
            <input type="text" id="userName" class="form-control input-sm chat-input" name="No_Pend" placeholder="No.Pendaftaran" />
            </br>
            <input type="password" id="userPassword" class="form-control input-sm chat-input" name="Pass" placeholder="Password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
               <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In" style="background-color:#0CF;">
            </span>
			</form>
            </div>
            </div>
        </div>
    </div></center>
    <?php
		
$con = mysql_connect('localhost','root','');
mysql_select_db("pmb",$con);  
  
if(isset($_POST['login-submit']))  
{  
    $Nomer=$_POST['No_Pend'];  
    $Pass=$_POST['Pass'];  
  
    $check_user="select NO_PENDAFTARAN, pass from calon_mahasiswa_spmb WHERE NO_PENDAFTARAN='$Nomer' AND pass='$Pass'";  
  	
    $run=mysql_query($check_user,$con);  
  	
	if($Nomer=="" && $Pass==""){
		echo "Mohon diisi terlebih dahulu";
	}
	
    if(mysql_num_rows($run))  
    {  
       echo "<script>window.open('SPMB/Form Pendaftaran.php','_self')</script>";
	}
    else  
    {  
       echo "<script>alert('Nomer pendaftaran dan password tidak valid!!!')</script>"; 
    }  
}  
?> 
</div>
  </div></center>
</div>
</div>
        <div class="tab-pane fade" id="Peng">
        	<h1>Pengumuman Penerimaan SPMB</h1>
          <h3>Masukkan nomer pendaftaran di bawah ini</h3>
          <div class="panel-body">
    <form method="post" action="index.php">  
    <input type="text" id="userName" class="form-control input-sm chat-input" name="peng" placeholder="Masukkan nomer pendaftaran" style="width:40%;"/>
    <input type="submit" name="peng-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Search" style="width:30%; background-color:#0CF; margin-top:20px;">
    </form>
<div class="Nlolos" style="margin-top:30px;">
 <?php
 include ("db.php");   
  
if(isset($_POST['peng-submit']))  
{  
    $Nomer_peng=$_POST['peng']; 
    
    $run=mysql_query("select NO_PENDAFTARAN from mahasiswa_spmb WHERE NO_PENDAFTARAN='$Nomer_peng'");  
    
  if($Nomer_peng==""){
    echo "Mohon diisi terlebih dahulu";
  }
  else{
    if(mysql_num_rows($run))  
    {  
       echo "<h1>Selamat anda lolos</h1><br>";
       $ketrima =  mysql_query("SELECT NO_PENDAFTARAN, NM_SISWA_SP, GELOMBANG_SP, NAMA_JENJANG, NAMA_PRODI FROM mahasiswa_spmb WHERE NO_PENDAFTARAN='$Nomer_peng'");
       while($row = mysql_fetch_array($ketrima)){
            $g1 = $row['NO_PENDAFTARAN'];
            $g2 = $row['NM_SISWA_SP'];
            $g3 = $row['GELOMBANG_SP'];
            $g4 = $row['NAMA_JENJANG'];
            $g5 = $row['NAMA_PRODI'];
?>
       <p>Nomer pendaftaran : <?php echo $g1 ?><br>     
          Nama : <?php echo $g2 ?><br>
          Gelombang : <?php echo $g3 ?><br>
          Prodi : <?php echo $g4?> <?php echo $g5?></p>
<?php
       }
    }
    else  
    {  
       echo "Maaf anda belum lolos"; 
    }  
  }
}  
?>
</div>     
  </div>
        </div>
    </div>
    </div>

	<footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2015</p>
        </div>
    </footer>
            
	<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
    </body>
</html>
