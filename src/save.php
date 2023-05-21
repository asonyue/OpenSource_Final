<?php
$name = $_POST['name'];
$level = $_POST['level'];
$id = md5($name . $level);

$db = new SQLite3('mydatabase.db');

$sql = "INSERT INTO scores (id, name, level) VALUES ('$id', '$name', '$level')";

if ($db->exec($sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $db->lastErrorMsg();
}

$sql = "SELECT name, level FROM scores ORDER BY level DESC LIMIT 5";
$result = $db->query($sql);

$html = "<table>\n";
$html .= "<tr><th>Name</th><th>Level</th></tr>\n";

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $html .= "<tr><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td></tr>\n";
}

$html .= "</table>\n";

echo $html;

$db->close();
?>
