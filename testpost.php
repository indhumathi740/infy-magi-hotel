<?php
require_once('report/function.php');
dbconnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .widget {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .widget h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .widget p {
            margin-bottom: 0;
        }

        .widget .data {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .widget .description {
            color: #888;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Dashboard</h1>
        </div>
    </header>
    <div class="container">
        <div class="widget">
            <h2>order report</h2>
            <p class="data">100</p>
            <p class="description" id="branch">branch</p>
            <form method="post" action="report/ordat.php">
                <select name="bname" class="form-control" id="">
                    <option value="">Select</option>
                    <?php

                    $clo = $pdo->query("SELECT name FROM stores");

                    while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$data[name]'>$data[name]</option>";
                    }
                    ?>

                </select>
                <input type="submit" value="submit">
            </form>

        </div>


        <div class="widget">
            <h2>waste report</h2>
            <p class="data">50</p>
            <p class="description" id="branch">branch</p>
            <form method="post" action="report/ordat.php">
                <select name="bname" class="form-control" id="">
                    <option value="">Select</option>
                    <?php

                    $clo = $pdo->query("SELECT name FROM stores");

                    while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$data[name]'>$data[name]</option>";
                    }
                    ?>

                </select>
                <input type="submit" value="submit">
            </form>        </div>

    </div>
</body>

</html>