<?php

$conn = mysqli_connect("localhost", "root", "", "test");

$message = "";

$fname = $mname = $lname = $city = $contact = $email = $aadhar = $pan = $gender = "";
$pass = $cpass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    $fname = $_POST["firstname"];
    $mname = $_POST["middlename"];
    $lname = $_POST["lastname"];
    $city = $_POST["City"];
    $contact = $_POST["Contact"];
    $email = $_POST["Email"];
    $aadhar = $_POST["aadhar"];
    $pan = $_POST["pan"];
    $gender = $_POST["gender"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    // First Name
    if (empty($fname) || !preg_match("/^[a-zA-Z ]+$/", $fname)) {
        $message = "Invalid First Name";
        $fname = ""; // clear only wrong field
        $valid = false;
    }

    // Middle Name
    elseif (empty($mname) || !preg_match("/^[a-zA-Z ]+$/", $mname)) {
        $message = "Invalid Middle Name";
        $mname = "";
        $valid = false;
    }

    // Last Name
    elseif (empty($lname) || !preg_match("/^[a-zA-Z ]+$/", $lname)) {
        $message = "Invalid Last Name";
        $lname = "";
        $valid = false;
    }

    // Contact
    elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
        $message = "Invalid Contact Number";
        $contact = "";
        $valid = false;
    }

    // Email
    elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $message = "Invalid Email";
        $email = "";
        $valid = false;
    }

    // Aadhar
    elseif (!preg_match("/^[0-9]{12}$/", $aadhar)) {
        $message = "Invalid Aadhar Number";
        $aadhar = "";
        $valid = false;
    }

    // PAN
    elseif (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", strtoupper($pan))) {
        $message = "Invalid PAN Format";
        $pan = "";
        $valid = false;
    }

    // Password
    elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/", $pass)) {
        $message = "Weak Password";
        $pass = "";
        $valid = false;
    }

    // Confirm Password
    elseif ($pass != $cpass) {
        $message = "Passwords do not match";
        $cpass = "";
        $valid = false;
    }

    if ($valid) {

        $sql = "INSERT INTO users 
        (fname, mname, lname, city, contact, email, aadhar, pan, gender, pass)
        VALUES
        ('$fname','$mname','$lname','$city','$contact','$email','$aadhar','$pan','$gender','$pass')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration Successful";

            // clear all after success
            $fname = $mname = $lname = $city = $contact = $email = $aadhar = $pan = $gender = "";
            $pass = $cpass = "";
        } else {
            $message = "Database Error: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <style>
        body{
            font-family: Arial;
            background: white;
        }

        .box{
            width: 350px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 5px 5px 5px grey;
        }

        h2{
            text-align: center;
            color: blue;
        }

        input{
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type=radio]{
            width: auto;
        }

        input[type=submit]{
            background: grey;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover{
            background: green;
        }

        .msg{
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .Gen{
            text-align: center;
        }
    </style>

</head>

<body>

<div class="box">

<h2>Registration Form</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="post">

<input type="text" name="firstname" placeholder="First Name"
value="<?php echo $fname; ?>">

<input type="text" name="middlename" placeholder="Middle Name"
value="<?php echo $mname; ?>">

<input type="text" name="lastname" placeholder="Last Name"
value="<?php echo $lname; ?>">

<input type="text" name="City" placeholder="City"
value="<?php echo $city; ?>">

<input type="text" name="Contact" placeholder="Contact No"
value="<?php echo $contact; ?>">

<input type="email" name="Email" placeholder="Email"
value="<?php echo $email; ?>">

<input type="text" name="aadhar" placeholder="Aadhar No"
value="<?php echo $aadhar; ?>">

<input type="text" name="pan" placeholder="PAN No"
value="<?php echo $pan; ?>">

<p class="Gen">Gender</p>

<input type="radio" name="gender" value="male"
<?php if($gender=="male") echo "checked"; ?>> Male

<input type="radio" name="gender" value="female"
<?php if($gender=="female") echo "checked"; ?>> Female

<input type="radio" name="gender" value="other"
<?php if($gender=="other") echo "checked"; ?>> Other

<input type="password" name="pass" placeholder="Password">

<input type="password" name="cpass" placeholder="Confirm Password">

<input type="submit" value="Register">

</form>

</div>

</body>
</html>
