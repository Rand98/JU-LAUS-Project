<?php
session_start();

include("includes/config.php");  
//include_once 'languages/common.php';




$Status='';
$Status2='';    // messege for  wrong login 

// USER LOGIN
if(isset($_POST['Submit2']))
{
	
$Username=$_POST['Username']; //name in aform
$Password=md5($_POST['Password']);



$query1 = mysqli_query($Conn,"SELECT * FROM users WHERE (Username='$Username' AND Password='$Password') AND (Type='User' AND Status='Not Block')"); 
		

if (mysqli_num_rows($query1)>0)
{

$row1=mysqli_fetch_array($query1);
$U_ID=$row1['ID'];
$_SESSION['U_Log'] = $U_ID;


echo '<script language="JavaScript">
            document.location="Users/";
        </script>';
	
	

	
	
}else{
	

		
		
	$Status2='Error ... Please Check User Username Or Password !';



		
}
}














//ADMIN LOGIN 

if(isset($_POST['Submit']))
{
	
$Username=$_POST['Username'];
$Password=md5($_POST['Password']);



$query = mysqli_query($Conn,"SELECT * FROM users WHERE (Username='$Username' AND Password='$Password') AND Type='Admin'"); 
		

if (mysqli_num_rows($query)>0)
{

$row=mysqli_fetch_array($query);
$U_ID=$row['ID'];



$_SESSION['U_Log'] = $U_ID;


echo '<script language="JavaScript">
            document.location="Users_Admins/";
        </script>';
	
	

	
	
}else{
	
	
			$Status='Error ... Please Check User Username Or Password !';


		
}
}


?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>:: JU - LAUS ::</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/vendor/all.css" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.countdown.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "html" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "html" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "html" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/html/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/app/app.css" rel="stylesheet">

  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/material.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/messages.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="images/logo.png"/>
    <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	




</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-logo">
          <a href="index.php">
           					<center><img src="images/logo.png" width="100px" height="105px"/></center>

          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-nav-margin-left">
         
		 
		 
		 <li class="dropdown active">
            <a href="index.php" class="">Home</a>
           
          </li>
		 
		 
		 
		 <li class="dropdown">
            <a href="About_Us.php" class="">About Us</a>
           
          </li>
		 
		 
		
		  
	
		  
		  
		  
		 
		  <li class="dropdown">
            <a href="Contact_Us.php" class="">Contact Us</a>
           
          </li>
		
        </ul>
		
		
	       <?php          //?
	 $URL_1 = $_SERVER['REQUEST_URI'];
	 
	if (strpos($URL_1,'?lang=')) {
	 $URL = substr($URL_1,0,-8);
	}else{                             
		
	$URL = $URL_1;

	}
	?>

	
	
	
        <div class="navbar-right" >
   
      <a href="http://ju.edu.jo/home.aspx" class="navbar-btn btn btn-primary" target="_blank" style="background-color:#fff"><img src="images/ju.png" width="32px"/></a>
          <a href="http://ju.edu.jo/home.aspx" class="navbar-btn btn btn-primary" target="_blank" style="background-color:#fff"><img src="images/logo.png" width="34px"/></a>

   
         <!-- <a  href="<?php echo $URL; ?>?lang=en" class="navbar-btn btn btn-primary"><img src="languages/images/en.png"/></a>
          <a href="<?php echo $URL; ?>?lang=ar" class="navbar-btn btn btn-primary"><img src="languages/images/ar.png"/></a>
       
-->
   



	   </div>
	
	
     
      </div>
      <!-- /.navbar-collapse -->

    </div>
  </div>
  
<br><br>
  <div class="parallax cover overlay cover-image home">


		<center>
				
		<img src="images/banner.png" width="35%" style="border-radius: 8px"/>		

		</center>
	
	
	
  </div>
  
  
  
  				

  <div class="container">
   
    <div class="row" data-toggle="gridalicious">






	  <div class="media">
        
	  <div class="media-body">
	  
          <div class="panel panel-default">
            <div class="panel-body">
             

			  <div class="panel-body">
			 <form action="index.php" method="post">

            <div class="form-group">
			 			  						<h1>Users Login (Admin)</h1>

              <div class="form-control-material">
                <input class="form-control" id="username" style="border: 1px solid #000;" name="Username" type="text" placeholder="Username" required>
                <center><font for="username">Username</font></center>
              </div>
            </div>
            <div class="form-group">
			
              <div class="form-control-material">
			  
                <input class="form-control" id="password" style="border: 1px solid #000;" name="Password" type="password" placeholder="Password" required>
                <center><font for="password">Password</font></center>
              </div>
            </div>
			
			<br>
			 <center>

            <button type="submit" name="Submit" class="btn btn-primary">Login<i class="fa fa-fw fa-unlock-alt"></i></button>
            <button type="reset" class="btn btn-danger">Clear<i class="fa fa-fw fa-lock"></i></button>
			<br>
			<strong><font color="red"><?php echo $Status2; ?></font></strong>
			</center>
			</form>
          </div>
		  
		  
		  
              		   

            </div>
          </div>
        </div>
      </div>
	  
	  
	  
     
	 <div class="media">
        
	 <div class="media-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-headline"><center><img src="images/logo.png"></center></div>
  		   

            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   

      
	 
	  <div class="media">
        
	  <div class="media-body">
	  
          <div class="panel panel-default">
            <div class="panel-body">
             

			  <div class="panel-body">
			   <form action="index.php" method="post">

            <div class="form-group">
			 			  						<h1>Users Login (User)</h1>

              <div class="form-control-material">
                <input class="form-control" id="username" style="border: 1px solid #000;" name="Username" type="text" placeholder="Username" required>
                <center><font for="username">Username</font></center>
              </div>
            </div>
            <div class="form-group">
			
              <div class="form-control-material">
			  
                <input class="form-control" id="password" style="border: 1px solid #000;" name="Password" type="password" placeholder="Password" required>
                <center><font for="password">Password</font></center>
              </div>
            </div>
			
			<br>
			 <center>

            <button type="submit" name="Submit2" class="btn btn-primary">Login<i class="fa fa-fw fa-unlock-alt"></i></button>
            <button type="reset" class="btn btn-danger">Clear<i class="fa fa-fw fa-lock"></i></button>
			<br>
			<strong><font color="red"><?php echo $Status2; ?></font></strong>
			</center>
			</form>
          </div>
		  
		  
		  
              		   

            </div>
          </div>
        </div>
      </div>

      
	  
	 

      
	  

	 
	 
	 
	 
	 
	 
	 
	 
	 
    </div>
	
	 

    </div>
	

	
	
	
	

  </div>
  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="container">
    
	
	 
		
		
		
		
		
		
		
    <div class="row" data-toggle="gridalicious">

     
	
	 
	
	 
	 
	 
	 
	 
	 
	 
    </div>

    </div>

  </div>
  
  
  
  
  
  
  
  
  
  
  
  


  <!-- Footer -->
  <footer class="footer">
    <strong><font color="#000">JU - LAUS © 2020. All Rights Reserved.</font></strong>
  </footer>
<!-- // Footer -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
 

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
  <script src="js/vendor/all.js"></script>

  <!-- Vendor Scripts Standalone Libraries -->
  <!-- <script src="js/vendor/core/all.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.js"></script> -->
  <!-- <script src="js/vendor/core/bootstrap.js"></script> -->
  <!-- <script src="js/vendor/core/breakpoints.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.nicescroll.js"></script> -->
  <!-- <script src="js/vendor/core/isotope.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/packery-mode.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.grid-a-licious.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.cookie.js"></script> -->
  <!-- <script src="js/vendor/core/jquery-ui.custom.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/handlebars.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/load_image.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.debouncedresize.js"></script> -->
  <!-- <script src="js/vendor/core/modernizr.js"></script> -->
  <!-- <script src="js/vendor/core/velocity.js"></script> -->
  <!-- <script src="js/vendor/tables/all.js"></script> -->
  <!-- <script src="js/vendor/forms/all.js"></script> -->
  <!-- <script src="js/vendor/media/slick.js"></script> -->
  <!-- <script src="js/vendor/charts/flot/all.js"></script> -->
  <!-- <script src="js/vendor/nestable/jquery.nestable.js"></script> -->
  <!-- <script src="js/vendor/countdown/all.js"></script> -->
  <!-- <script src="js/vendor/angular/all.js"></script> -->

  <!-- App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
  <script src="js/app/app.js"></script>

  <!-- App Scripts Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->

  <!-- <script src="js/app/essentials.js"></script> -->
  <!-- <script src="js/app/material.js"></script> -->
  <!-- <script src="js/app/layout.js"></script> -->
  <!-- <script src="js/app/sidebar.js"></script> -->
  <!-- <script src="js/app/media.js"></script> -->
  <!-- <script src="js/app/messages.js"></script> -->
  <!-- <script src="js/app/maps.js"></script> -->
  <!-- <script src="js/app/charts.js"></script> -->

  <!-- App Scripts CORE [html]:
        Includes the custom JavaScript for this theme/module;
        The file has to be loaded in addition to the UI modules above;
        app.js already includes main.js so this should be loaded
        ONLY when using the standalone modules; -->
  <!-- <script src="js/app/main.js"></script> --> 
 <script type="text/javascript" src="scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>

</html>