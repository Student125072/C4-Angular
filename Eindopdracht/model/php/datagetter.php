<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "eindopdrachtc4");
$result = $conn->query("SELECT id, voornaam, achternaam, straat, huisnummer, postcode, woonplaats, telefoonnummer, tijdtoegevoegd FROM personen");
$outp = "";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
    $outp .= sprintf('{"id":"%s","voornaam":"%s", "achternaam":"%s", "straat":"%s", "huisnummer":"%s",
      "postcode":"%s", "woonplaats":"%s", "telefoonnummer":"%s", "tijdtoegevoegd":"%s"}',
      $rs['id'], $rs['voornaam'], $rs['achternaam'], $rs['straat'], $rs['huisnummer'],
      $rs['postcode'], $rs['woonplaats'], $rs['telefoonnummer'], $rs['tijdtoegevoegd']
    );
}
header('Content-Type: application/json');
$outp = '{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>
