<?php

include 'dbcon.php';

if(!isset($_POST['teams'])) {
  $teams = 'NULL';
}      
else $teams = $_POST['teams'];
$team=json_encode($teams);
$team = trim($team, '[]');
$age=$_POST['age'];
$country=$_POST['country'];

//total strike_rate
$query=mysqli_query($conn,"select sum(strike_rate) from ball_to_ball");
//$row=mysqli_fetch_row($query);

//total wickets
$query1=mysqli_query($conn,"select sum(wicket) from ball_to_ball");
//$row1=mysqli_fetch_row($query1);
if($age!='all' && $country=='India' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and player.country='".$country."' and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age=='all' && $country=='Overseas' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.")  and player.country!='India' order by strike_rate desc limit 5";
else if($age!='all' && $country=='Overseas' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and player.country!='India' and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age!='all' && $country=='all' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.") and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age=='all' && $country=='India' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.")  and player.country='India' order by strike_rate desc limit 5";
else if($age=='all' && $country=='all' && (strpos($team, 'all') == false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.team_id in (".$team.") order by strike_rate desc limit 5";
else if($age!='all' && $country=='India' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.country='".$country."' and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age=='all' && $country=='Overseas' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id  and player.country!='India' order by strike_rate desc limit 5";
else if($age!='all' && $country=='Overseas' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id  and player.country!='India' and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age!='all' && $country=='all' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id  and 2008-year(DOB) between ".$age." order by strike_rate desc limit 5";
else if($age=='all' && $country=='India' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id and player.country='India' order by strike_rate desc limit 5";
else if($age=='all' && $country=='all' && (strpos($team, 'all') !== false))
$query5=" select player_name,player.strike_rate from player,team where player.team_id=team.team_id  order by strike_rate desc limit 5";



//print_r($query5);
//Most strike_rate
$query2=mysqli_query($conn,$query5);
//Most wickets
$query4=mysqli_query($conn,"select player_name,sum(ball_to_ball.wicket) from ball_to_ball,player where player_id=bowler group by bowler order by sum(wicket) desc LIMIT 5");
//$row4=mysqli_fetch_row($query4);

$output='';

while($row2=mysqli_fetch_row($query2))
{
	$output.=  '
                <div class="rca-table">
                  <div class="rca-col rca-name-info">
				  
                    <span class="rca-tag-info"></span>'.$row2[0].'
                  </div>
                  <div class="rca-col rca-name-score">'.
                   $row2[1].'
                  </div>
                </div>';
		
}


//Most Runs
//$query

echo $output;

?>