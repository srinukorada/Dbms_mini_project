<?php include 'dbcon.php';?>
<?php

   if(!empty($_POST['username']) && !empty($_POST['password'])) {  
       $user=$_POST['username'];  
       $pass=$_POST['password'];  

        
     
       $query=mysqli_query($conn,"SELECT * from admin WHERE adm_id='".$user."' AND passwd='".$pass."' ");  
       $numrows=mysqli_num_rows($query);  
       if($numrows!=0)  
       {  
       while($row=mysqli_fetch_assoc($query))  
       {  
       $dbusername=$row['adm_id'];  
       $dbpassword=$row['passwd'];	   
       }  
     
       if($user == $dbusername && $pass == $dbpassword)  
       {		   
       session_start();  
       $_SESSION['sess']="admin";
	   
     
       /* Redirect browser */  
     //   echo "successfully logged in";
    	  header("Location: admin_home.php");  
       }  
       }
	   else {
			echo "Invalid";
       echo "<script>alert('Invalid Login Credentials');
       window.location.href='admin_login.php';</script>"; 
       }  
     
   } else {  
       echo "<script>alert('All fields are required!');
       window.location.href='admin_login.php';</script>"; 
   }  
   
   
   
   
   ?>

