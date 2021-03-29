
<?php include "dbcon.php";?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPL</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link type="text/css" href="schedule.css" rel="stylesheet">
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

    
  <?php
session_start();
if(!isset($_SESSION['sess']))
include 'index_nav.php';
else
include 'admin_nav.php';
	?>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">teams
                        <strong>list</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="table-responsive">
        <table class="table table-bordered table-responsive table-hover">
			<thead>
				<tr>
				    <th colspan="1">team_ID</th>
					<th colspan="1">team_name</th>
					<th> total Runs</th>
					<th> total Wickets</th>
                    <th>trophies</th>
                    <th>winning %</th>
					
					
				</tr>
			</thead>
				<?php
				$query=mysqli_query($conn,"select team_id,team_name,runs,wickets,trophies,won/(won+lost)*100 from team ");
				while($row = mysqli_fetch_array($query))
				{
                    if($row[0]<=8)
                    $row[6]=$row[0];
                    else
                    $row[6]=9;
				echo "<tr>";
				echo "<td><a href=team".$row[6].".php?team=".$row[0].">" . $row[0] . "</td>";
				echo "<td><a href=team".$row[6].".php?team=".$row[0].">" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[4] . "</td>";
				echo "<td>" . $row[5] . "</td>";
				echo "</tr>";
				}

			  ?>
				
				
		</table>
		</div>
		</div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; iplt20.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
