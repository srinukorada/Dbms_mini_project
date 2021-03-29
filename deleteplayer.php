<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
/*$path="deleteplayer.php";
$query0=mysqli_query($conn,"select perm_id from permissions where perm_desc='".$path."'");
$row0=mysqli_fetch_row($query0);
$query3=mysqli_query($conn,"select role_id from role where role_name='".$_SESSION['sess']."'");
$row3=mysqli_fetch_row($query3);
$perm_id=$row0[0];
$role_id=$row3[0];
$query4=mysqli_query($conn,"select * from role_perm where perm_id='".$perm_id."' and role_id='".$role_id."'");
$numrows=mysqli_num_rows($query4);               
if($numrows==0)
{
    header("Location: admin_login.php");
}*/	


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL-Indian Premier League</title>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style-1.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	 <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/paytm.css"/>
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="brand">IPL-Indian Premier League</div>
    <div class="address-bar"><b></b></div>
  
	<div class="header">
		<div class="container">
			<!--<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/nitk.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="queries">
						<p>Availability of food is restricted to Timings:<span>7pm-2am</span><label></label></p>
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="checkout.html">
								<h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">Empty card</a></p>
							<div class="clearfix"> </div>
						</div>
					</div>
				<div class="clearfix"></div>
			</div>-->
		</div>
   <?php
    include "admin_nav.php";
	?>
	<div class="main">
     <div class="container">
      <div class="register">
          <form action="" method="post"> 
         <div class="register-top-grid">
         
          <h3>DELETE PLAYER</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>PLAYER ID<label>*</label></span>
            <input type="text" name="Id" id="Id"> 
            <div class="clearfix"> </div>
           </div>
		   
           
           <div class="rca-clear"></div>
        <div class="register-but">
           
             <input type="submit" value="submit" name='sub'></form>
			 
             <div class="clearfix"> </div>
      
        </div>
       </div>
       </div>
      </div>

  <div class="main">
     <div class="container">
      <div class="register">
  
         <div class="register-top-grid">
		 <form action="" method="post">
          <h3>Player Details</h3>

            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>player id<label>*</label></span>
            <input type="text" id="player_id" name="player" readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Name<label>*</label></span>
            <input type="text" id='player_name' readonly> 
           </div>
           <div class="wow fadeInRight" data-wow-delay="0.4s">
             <span>Team Name<label>*</label></span>
             <input type="text" id='team_id' readonly> 
           </div>
                      </div>
          <div class="clearfix"> </div>

            
      
        <div class="clearfix"> </div>
        <div class="register-but">
      
             <input type="submit" value="Delete" name='del'></form>
             <div class="clearfix"> </div>
      
        </div>
       </div>
       </div>
      </div>

<div class="clearfix"></div>
	      <?php
		  include 'dbcon.php';
         if(isset($_POST['sub']))
         {
           
			if(!empty($_POST['Id']))
               $id=$_POST['Id'];
		  // echo $id;
				//$player_name=$_POST['pname'];
               $query="SELECT player_id,player_name,team_name FROM player,team where player.team_id=team.team_id and player_id='".$id."'";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $player_id=$row[0];
                 $player_name=$row[1];
                 $team_id=$row[2];
               }
         
             }
         
         if(isset($_POST['del']))
         {
			 
           if(!empty($_POST['player']))
           {
			 //  echo "Hello";
             $id=$_POST['player'];
             $query="DELETE FROM player where player_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {print_r("Deleted Successfully");
              echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
   	
			 }
			 else
				echo "<script type='text/javascript'>location.href = 'deleteplayer.php';</script>";
   	 
		   }
         }
         
         ?>
      <script type="text/javascript">
	  document.getElementById('Id').value="<?php echo $player_id; ?>";
         document.getElementById('player_id').value="<?php echo $player_id; ?>";
         document.getElementById('player_name').value="<?php echo $player_name; ?>";
         document.getElementById('team_id').value="<?php echo $team_id; ?>";
      </script>
      

</body>
</html>