<?php
session_start();
require("include/connection.php");

$score = fetchRecord("SELECT SUM(score) FROM activities");

?>
<!doctype html>
<html>

<head>
<title>Ninja Mini Game</title>
<meta charset="utf-8" />
<link href="include/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<h1>Your Gold: <?php echo $score['SUM(score)']; ?></h1>
<div class="building">
  <h2>Farm</h2>
  <p>(earn 10-20 gold)</p>
  <form id="farm" action="process.php" method="post">
    <input name="farm" type="hidden" value="farm" />
    <input type="submit" value="Find Gold!" /></form>
</div>
<div class="building">
  <h2>Cave</h2>
  <p>(earn 5-10 gold)</p>
  <form action="process.php" method="post">
    <input name="cave" type="hidden" value="cave" />
    <input type="submit" value="Find Gold!" /></form>
</div>
<div class="building">
  <h2>House</h2>
  <p>(earn 2-5 gold)</p>
  <form action="process.php" method="post">
    <input name="house" type="hidden" value="house" />
    <input type="submit" value="Find Gold!" /></form>
</div>
<div class="building">
  <h2>Casino!</h2>
  <p>(earn/takes 0-50 gold)</p>
  <form action="process.php" method="post">
    <input name="casino" type="hidden" value="casino" />
    <input type="submit" value="Find Gold!" /></form>
</div>
<div class="clear">
</div>
<p>Activities: </p>
<table>
  <?php

$activities = mysql_query("SELECT * FROM activities");

while ($row = mysql_fetch_array($activities))
{
  if ($row['score'] < 0){
    echo "<tr>";
  echo "<td class='red'>You entered a " . $row['activity'] . " and lost " . $row['score'] . "gold.</td><td>" . $row['datetime']  . "</td>";
  }
  else{
echo "<tr>";
echo "<td>You entered a " . $row['activity'] . " and earned " . $row['score'] . "gold.</td><td>" . $row['datetime']  . "</td>";
}
}


?>
</table>

</body>

</html>
