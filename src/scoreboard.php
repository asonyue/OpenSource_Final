<!DOCTYPE html>
<html>
<head>
    <title>Scoreboard</title>
    <style>
      body {
        text-align: center;
        background: rgb(254,126,253);
        background: linear-gradient(90deg,rgba(254,126,253,1)20%,rgba(0,212,255,1)80%);
        justify-content: center;
        align-items: bottom;
        flex-direction: column;
      }

      button {
        font-family: sans-serif;
        background: rgb(254,126,253);
        background: linear-gradient(90deg,rgba(254,126,253,1)20%,rgba(0,212,255,1)80%);
        font-size:30px;
      
        margin: 0 auto;
        width: 20%;
        top: 10%;
        transform: translateY(1000%);
      
        color: white;
        padding: 10px;
        border: 3px solid white;
        border-radius:10px;
        opacity: 1;
      }
    </style>
</head>
<body>
    <button onclick="window.location.href='index.html'">Retry</button>
</body>
</html>

<style>
#container {
  width: 200px;
  height: 200px;
}

.score-table {
  border-collapse: collapse;
  margin: 0 auto;
  width: 20%;
  top: 10%;
  transform: translateY(100%);
}

.score-table th,
.score-table td {
  text-align: left;
  padding: 8px;
  align-items: center;
}

.score-table th {
  background: rgb(254, 126, 253);
  background: linear-gradient(90deg, rgba(254, 126, 253, 1)20%, rgba(0, 212, 255, 1)80%);
  align-items: center;
  justify-content: center;
  color: white;
}

.score-table tr.even-row {
  background-color: #f2f2f2;
}

.score-table tr.odd-row {
  background-color: #ffffff;
}

.score-table td {
  font-size: 18px;
  font-weight: bold;
  color: #333333;
}
</style>

<?php

require_once "db_conn.php";

$name = $_POST['name'];
$level = $_POST['level'];

$db = new PDO('mysql:host=localhost;dbname=record', 'root', '');

$sql1 = "INSERT INTO scores (name, level) VALUES ('$name', '$level')";

if (!($db->exec($sql1))) {
  error_log("Error: Insert Unsucessful");
} 

  // Get the top 5 scores
  $sql2 = "SELECT name, level FROM scores ORDER BY level DESC LIMIT 5";
  $result = $db->query($sql2);

  // Create the HTML table
  $html = "<table class='score-table'>\n";
  $html .= "<tr><th>Name</th><th>Level</th></tr>\n";

  // Iterate over the results and add them to the table
  $i = 0;
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $i++;
    if ($i % 2 == 0) {
      $html .= "<tr class='even-row' style='background-color: #f2f2f2;'><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td></tr>\n";
    } else {
      $html .= "<tr class='odd-row' style='background-color: #ffffff;'><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td></tr>\n";
    }
  }

  // Close the table
  $html .= "</table>\n";

  // Echo the HTML
  echo $html;

  // Delete all scores except the top 5
  $sql3 = "DELETE scores
  FROM scores
  LEFT JOIN (
      SELECT id
      FROM scores
      ORDER BY level DESC
      LIMIT 5
  ) AS subquery ON scores.id = subquery.id
  WHERE subquery.id IS NULL;";
  
  if (!($db->exec($sql3))) {
    error_log("Error: Delete Unsucessful");
  }

  // Close the database connection
  exit();

?>