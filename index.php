<?php
require 'connect.php';

$sql = "SELECT `COL 1`  FROM `table 1`";

$telefoni = mysqli_query($conn, $sql);
$number = mysqli_num_rows($telefoni);
$arr_telefoni = array();
while ($row = mysqli_fetch_assoc($telefoni)) {
    array_push($arr_telefoni,$row['COL 1']);
}
$arr_tel = array();
$file = 'C:\Users\Astra\Desktop\contact.txt';
foreach($arr_telefoni as $phone) {
    $onlyNumber = preg_replace('/[^0-9]+/', '', $phone);
    $prviTri = substr($onlyNumber, 0, 3);
    $pocetna = substr($onlyNumber, 0, 1);
    $kraenBroj = $onlyNumber;
    if ($prviTri == '389') {
        $kraenBroj = "+" . $onlyNumber;
    } else if ($pocetna == 0) {
        $kraenBroj = "+389" . substr($onlyNumber, 1);
    } else {
        $kraenBroj = "+389" . $onlyNumber;
    }

 /*  if (strlen($kraenBroj) == 12) {
        $kraenBroj.= "\r\n";
    }
*/
    $kraenBroj.= "\r\n";

    file_put_contents($file, $kraenBroj, FILE_APPEND);
}
?>

