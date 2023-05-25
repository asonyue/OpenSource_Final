<?php

$name = $_POST['name'];
$level = $_POST['level'];
$id = md5($name . $level);

$db = new SQLite3('mydatabase.db');

$sql1 = "INSERT INTO scores (id, name, level) VALUES ('$id', '$name', '$level')";

if (!($db->exec($sql1))) {
    error_log("Error: Insert Unsucessful");
} 

$sql2 = "SELECT name, level FROM scores ORDER BY level DESC LIMIT 5";
$result = $db->query($sql2);

$html = "<table class='score-table'>\n";
$html .= "<tr><th>Name</th><th>Level</th></tr>\n";

$i = 0;
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $html = getHtml($i, $row, $html);
}

$html .= "</table>\n";

echo $html;

$sql3 = "DELETE FROM scores WHERE id NOT IN (SELECT id FROM scores ORDER BY level DESC LIMIT 5)";

if (!($db->exec($sql3))) {
    error_log("Error: Delete Unsucessful");
}

$db->close();

?>

<style>
.score-table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

.score-table th, .score-table td {
  text-align: left;
  padding: 8px;
}

.score-table th {
  background-color: #4CAF50;
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
