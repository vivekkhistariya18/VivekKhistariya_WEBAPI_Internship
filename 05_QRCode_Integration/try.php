<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";
include "phpqrcode/qrlib.php";

$sql = "SELECT * FROM qr_records";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
    $id = $row['id'];
    $token = $row['qr_token'];

    // Skip if token is empty
    if(trim($token) == '')
    {
        continue;
    }

    $image_path = "qr_images/" . $token . ".png";

    $qr_url =
    "http://localhost/qrcode/view.php?token=" . $token;

    QRcode::png(
        $qr_url,
        $image_path,
        QR_ECLEVEL_H,
        8
    );

    echo "Generated : " . $image_path . "<br>";
}

echo "<hr>Completed";
?>