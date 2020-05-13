<?php
$conn = new mysqli("localhost", "root", "", "eindopdrachtc4");

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$voornaam = $data['voornaam'];
$achternaam = $data['achternaam'];
$straat = $data['straat'];
$huisnummer = $data['huisnummer'];
$postcode = $data['postcode'];
$woonplaats = $data['woonplaats'];
$telefoonnummer = $data['telefoonnummer'];
$tijdtoegevoegd = $data['tijdtoegevoegd'];
$toevoegen = $data['toevoegen'];
$verwijderen = $data['verwijderen'];
$update = $data['update'];


if($toevoegen == TRUE) {
  $sql = sprintf("INSERT INTO personen (id, voornaam, achternaam, straat, huisnummer, postcode, woonplaats, telefoonnummer) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",
  $id, $voornaam, $achternaam, $straat, $huisnummer, $postcode, $woonplaats, $telefoonnummer);
  if($conn->query($sql) == TRUE){
    echo "Record inserted.";
    header("Refresh:0");
  } else {
  print_r("Error: " . $sql . "<br>" . mysqli_error($conn));
}

}
elseif ($update) {
  $sql = sprintf("UPDATE personen SET voornaam='%s', achternaam='%s', straat='%s', huisnummer='%s', postcode='%s', woonplaats='%s', telefoonnummer='%s' WHERE id='%s'",
  $voornaam, $achternaam, $straat, $huisnummer, $postcode, $woonplaats, $telefoonnummer, $id);
  if($conn->query($sql) == TRUE){
    echo "Record updated.";
    header("Refresh:0");
  } else {
  print_r("Error: " . $sql . "<br>" . mysqli_error($conn));
}
}

elseif ($verwijderen) {
  $sql = sprintf("DELETE FROM personen WHERE id='%s'", $id);
  if($conn->query($sql) == TRUE){
    echo "Record deleted.";
    header("Refresh:0");
  } else {
  print_r("Error: " . $sql . "<br>" . mysqli_error($conn));
}
}




$conn->close();

 ?>
