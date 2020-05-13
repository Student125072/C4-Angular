<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "bedrijf");
$result = $conn->query("SELECT bedrijfsnaam, adres, woonplaats, telnr FROM bedrijf");
$outp = "";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
    $outp .= '{"bedrijfsnaam":' . "'" . $rs['bedrijfsnaam'] . "'" . ',' . '"adres":' . "'" . $rs['adres'] . "'" . ',';
    $outp .= '"woonplaats":' . "'" . $rs['woonplaats'] . "'" . ',' . '"telnr":' . "'" . $rs['telnr'] . "'" . '}';
}
header('Content-Type: application/json');
$outp = '{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>
