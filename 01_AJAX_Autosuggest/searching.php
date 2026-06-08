<?php

include "database.php";

$type = trim($_GET['type'] ?? '');

if ($type == "suggest")
{
    $q = trim($_GET['q'] ?? '');

    if ($q == '')
    {
        exit;
    }

    $sql = "
    SELECT *
    FROM internship
    WHERE stud_name LIKE '$q%'
    LIMIT 10
    ";

    $result = mysqli_query($conn, $sql);
}
   

if ($type == "mode")
{
    $mode =($_GET['mode'] ?? '');

    if ($mode != '')
    {
      

        $sql = "
        SELECT *
        FROM internship
        WHERE mode = '$mode'
        ";
    }
    else
    {
        $sql = "
        SELECT *
        FROM internship
        ";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        echo "
        <table>
            <tr>
                <th><strong>Name</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Contact</strong></th>
                <th><strong>Mode</strong></th>
            </tr>
        ";

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "
            <tr>
                <td>".$row['stud_name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['contact']."</td>
                <td>".$row['mode']."</td>
            </tr>
            ";
        }

        echo "</table>";
    }
    else
    {
        echo "No Records Found";
    }
}

mysqli_close($conn);

?>