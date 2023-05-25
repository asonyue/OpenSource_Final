<style>

    .score-table {
        border-collapse: collapse;
        width: 20%;
        margin-bottom: 20px;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    .score-table th, .score-table td {
        text-align: left;
        padding: 8px;
    }

    .score-table th {
        background: rgb(254,126,253);
        background: linear-gradient(90deg,rgba(254,126,253,1)20%,rgba(0,212,255,1)80%);
        color: white;
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
$id = md5($name . $level);

$db = new PDO('mysql:host=localhost;dbname=record', 'root', '');

$sql1 = "INSERT INTO scores (id, name, level) VALUES ('$id', '$name', '$level')";

if (!($db->exec($sql1))) {
  error_log("Error: Insert Unsuccessful");
}

/**
 * @param $i
 * @param $row
 * @param $html
 * @return string
 */
function getHtml($i, $row, $html): string
{
    $i++;
    if ($i % 2 == 0) {
        $html .= "<tr class='even-row' style='background-color: #f2f2f2;'><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td></tr>\n";
    } else {
        $html .= "<tr class='odd-row' style='background-color: #ffffff;'><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td></tr>\n";
    }
    return $html;
}

try {

  // Get the top 5 scores
  $sql2 = "SELECT name, level FROM scores ORDER BY level DESC LIMIT 5";
  $result = $db->query($sql2);

  // Create the HTML table
  $html = "<table class='score-table'>\n";
  $html .= "<tr><th>Name</th><th>Level</th></tr>\n";

  // Iterate over the results and add them to the table
  $i = 0;
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html = getHtml($i, $row, $html);
  }

  // Close the table
  $html .= "</table>\n";

  // Echo the HTML
  echo $html;

  // Delete all scores except the top 5
  $sql3 = " DELETE FROM scores
            WHERE id <> (
                SELECT id
                FROM scores
                ORDER BY level DESC
                LIMIT 5
            );";
  if (!($db->exec($sql3))) {
    error_log("Error: Delete Unsuccessful");
  }

  // Close the database connection
   exit();

} 
catch (PDOException $e) {}

?>




<!DOCTYPE html>
<html lang="">
<button onclick="window.location.href='index.html'">Retry?</button>
</html>

<style>
body {
  text-align: center;
  background: rgb(254,126,253);
	background: linear-gradient(90deg,rgba(254,126,253,1)20%,rgba(0,212,255,1)80%);
	justify-content: center;
	align-items: end;
	flex-direction: column;
}
button{
  font-family: sans-serif;
  background: rgb(254,126,253);
	background: linear-gradient(90deg,rgba(254,126,253,1)20%,rgba(0,212,255,1)80%);
  font-size:30px;

  position: absolute;
  bottom:25%;
  left:50%;
  transform: translate(-50%, -50%);

  color: white;
  padding: 10px;
  border: 3px solid white;
  border-radius:10px;
  opacity: 1;
}
</style>