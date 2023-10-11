<?php

    include("config/config.php");

    $config = new Config();

    $config->connect();

    $res = $config->getAllRecords();

    /*
            mysqli_fetch_array($res);   => Indexed format
            mysqli_fetch_assoc($res);   => Direct access || Accociative array format
    */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <div class="container pt-5">

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            
            <?php while($record = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <th scope="row"> <?php echo $record['id'];?> </th>
                    <td> <?php echo $record['name'];?> </td>
                    <td> <?php echo $record['age'];?> </td>
                    <td> <?php echo $record['course'];?> </td>
                </tr>
            <?php  } ?>
           

        </tbody>
        </table>

    </div>

    
</body>
</html>