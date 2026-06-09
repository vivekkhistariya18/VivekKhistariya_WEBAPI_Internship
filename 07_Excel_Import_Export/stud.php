<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name       = $_POST['name'];
    $birthdateInput = $_POST['birthdate']; // in dd/mm/yyyy

// Convert to yyyy-mm-dd before strtotime
$birthdate = '';
if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $birthdateInput, $matches)) {
    $day = $matches[1];
    $month = $matches[2];
    $year = $matches[3];
    
    // Validate date
    if (checkdate($month, $day, $year)) {
        $birthdate = "$day/$month/$year"; // Save in dd/mm/yyyy
    } else {
        $birthdate = "Invalid Date";
    }
} else {
    $birthdate = "Invalid Format";
}
    $bloodgroup = $_POST['bloodgroup'];
    $contact    = $_POST['contact'];
    $address    = $_POST['address'];
    $photoPath  = "";

    // Handle File Upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "upload/";
        $fileName  = basename($_FILES["photo"]["name"]);
        $photoPath = $targetDir . time() . "_" . $fileName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
    }

    // Prepare Excel
    $file = 'students.xlsx';
    if (file_exists($file)) {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
    } else {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(['Name', 'Birthdate', 'Blood Group', 'Contact', 'Address', 'Photo Path'], NULL, 'A1');
    }

    $sheet->fromArray(
        [$name, $birthdate, $bloodgroup, $contact, $address, $photoPath],
        NULL,
        'A' . ($sheet->getHighestRow() + 1)
    );

    $writer = new Xlsx($spreadsheet);
    $writer->save($file);

    $message = "Student record saved successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Entry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Student Entry Form</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Birthdate</label>
            
			<input type="text" name="birthdate" class="form-control" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Blood Group</label>
            <select name="bloodgroup" class="form-select" required>
                <option value="">Select</option>
                <option>A+</option><option>A-</option>
                <option>B+</option><option>B-</option>
                <option>O+</option><option>O-</option>
                <option>AB+</option><option>AB-</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" pattern="\d{10}" required>
        </div>

        <div class="col-12">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="2" required></textarea>
        </div>

        <div class="col-12">
            <label class="form-label">Upload Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*" required>
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
