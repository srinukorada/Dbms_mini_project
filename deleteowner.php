<?php include 'dbcon.php';
session_start();
if(!isset($_SESSION['sess']))
{
	header("Location: admin_login.php");
}
/*$path="deleteowner.php";
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
}	*/


?>
<!DOCTYPE html>
<html>
<head>
<title>IPL</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<script src="js/jquery.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
<script src="js/simpleCart.min.js"> </script>	
</head>
<body>
  
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
          <form action='' method='post'> 
         <div class="register-top-grid">
          <h3>DELETE Owner</h3>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Owner Id<label>*</label></span>
            <input type="text" id='Id' name='Id' > 
            <div class="clearfix"> </div>
           </div>
          <div class="clearfix"> </div>
        <div class="register-but">
          
             <input type="submit" value="submit" name='sub'>
             <div class="clearfix"> </div>
           </form>
        </div>
       </div>
       </div>
      </div>

  <div class="main">
     <div class="container">
      <div class="register">
          <form action='' method='post'> 
         <div class="register-top-grid">
          <h3>Owner Details</h3>

		  <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Owner Id<label>*</label></span>
            <input type="text" id='owner_id' name='owner' readonly> 
           </div>
           <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Owner Name<label>*</label></span>
            <input type="text"  id='owner_name' readonly> 
           </div>
            <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <span>Team Name<label>*</label></span>
            <input type="text" id='team_name' readonly> 
           </div>
           
           </div>
          <div class="clearfix"> </div>

           
        <div class="clearfix"> </div>
        <div class="register-but">
           
             <input type="submit" value="Delete" name='del'>
             <div class="clearfix"> </div>
           </form>
        </div>
       </div>
       </div>
      </div>

<div class="clearfix"></div>
			
<div class="clearfix"></div>
	      <?php
		  include 'dbcon.php';
         if(isset($_POST['sub']))
         {
           
			if(!empty($_POST['Id']))
               $id=$_POST['Id'];
		        // echo $id;
				//$player_name=$_POST['pname'];
               $query="SELECT owner_id,owner_name,team_name from owner LEFT JOIN team on owner.team_id=team.team_id where owner_id='".$id."'";
               $result=mysqli_query($conn,$query);
               $numrows=mysqli_num_rows($result);
               if($numrows==1)
               {
                 $row=mysqli_fetch_array($result);
                 $owner_id=$row[0];
                 $owner_name=$row[1];
                 $team_name=$row[2];
			    //$capacity=$row[3];
               }
			  //  echo $id;
              // echo $venue_id;
			  // echo $venue_name;
			//	echo $city;
				//echo $owner_name;
             }
         
         if(isset($_POST['del']))
         {
			 
           if(!empty($_POST['owner']))
           {
			  // echo "Hello";
             $id=$_POST['owner'];
             $query="DELETE FROM owner where owner_id='".$id."'";
             if(mysqli_query($conn,$query))
			 {
				 print_r("Deleted Successfully");
				 echo "<script type='text/javascript'>location.href = 'admin_home.php';</script>";
			 }
			 else
				 echo "<script type='text/javascript'>location.href = 'deleteowner.php';</script>";
   	
           }
         }
         ?>
		 
		 <script type="text/javascript">
	     document.getElementById('Id').value="<?php echo $owner_id; ?>";
		 document.getElementById('owner_id').value="<?php echo $owner_id; ?>";
         document.getElementById('owner_name').value="<?php echo $owner_name; ?>";
         document.getElementById('team_name').value="<?php echo $team_name; ?>";
        </script>
      

</body>
</html>