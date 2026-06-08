<?php

include "phpqrcode/qrlib.php";

$qr_image = "";

if(isset($_POST['generate']))
{
    $text = trim($_POST['qr_text']);

    if($text != "")
    {
        if(!is_dir("qr_images"))
        {
            mkdir("qr_images");
        }

        $filename = "qr_images/" . time() . ".png";

        QRcode::png( $text, $filename, QR_ECLEVEL_L, 5 );

        $qr_image = $filename;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
</head>
<body>

<h2>PHP QR Code Generator</h2>

<form method="post">

    <input type="text" name="qr_text" placeholder="Enter text" required style="width:300px;">

    <button type="submit" name="generate"> Generate QR </button>

</form>

<?php

if($qr_image != "")
{
    echo "<h3>Generated QR Code</h3>";
    echo "<img src='$qr_image'>";
}

?>

</body>
</html>