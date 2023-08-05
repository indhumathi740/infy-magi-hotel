<?php
require_once('report/function.php');
dbconnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .order{
            color: #3C8DBC;
        }

        header {
            background-color:  #222D32;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: border;        }

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
        .direct{
            text-decoration: none;
            color: #fff;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1> Magizham Reports</h1>
            <a class="direct" onclick="history.back()"><span class="fa fa-circle-arrow-left"></span> Go Back</a>
        </div>
    </header>
    <div class="container">
    
    <div class="widget">
    <h2 class="order">Order Report</h2>
    <div class="row">
        <div class="col-md-6">
        <p class="description" id="branch">Branchwise Reports</p><br>
                        <form method="post" action="report/ordat.php">
                        <label for="orderDate">Select Branch</label><br><br>
                <select name="bname" class="form-control" id="">
                    <option value="">Select</option>
                    <?php

                    $clo = $pdo->query("SELECT name FROM stores");

                    while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$data[name]'>$data[name]</option>";
                    }
                    ?>

                </select><br>
                <input type="submit" class="btn btn-dark" value="submit">

        </form>
        </div>
        <div class="col-md-6">
            <p class="description" id="branch">Datewise - Reports</p><br>
            <form method="post" action="report/orderdate.php">
            <label for="orderDate">Select Date</label><br><br>
            <input type="date" id="orderDate" class="form-control" name="orderDate"><br>
            <input type="submit" class="btn btn-dark" value="Submit">
            </form>
        </div>
            </div>
    
        </div>


        <div class="widget">
            <h2 class="order">Stock report</h2>
            <div class="row">
        <div class="col-md-6">
            <!-- <p class="data">50</p> -->
            <p class="description" id="branch">Branchwise Reports</p><br>
            <form method="post" action="report/sto.php">
            <label for="orderDate">Select Branch</label><br><br>

                <select name="bssname" class="form-control" id="">
                    <option value="">Select</option>
                    <?php

                    $clo = $pdo->query("SELECT name FROM stores");

                    while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$data[name]'>$data[name]</option>";
                    }
                    ?>

                </select><br>
        
                <input type="submit" class="btn btn-dark"  value="submit">
            </form> 
            </div>
            <div class="col-md-6">
            <p class="description" id="branch">Datewise - Reports</p><br>

            </form>
            <form method="post" action="report/stodate.php">
        <label for="orderDate">Select Date</label><br><br>
        <input type="date" id="stockDate"   class="form-control" name="stockDate"><br>
        <input type="submit"  class="btn btn-dark" value="Submit">
    </form>  
    </div>
    </div>      
 </div>

        <div class="widget">
        <h2 class="order">waste report</h2>
        <div class="row">
        <div class="col-md-6">
            <!-- <p class="data">50</p> -->
            <p class="description" id="branch">branchwise Reports</p><br>           
             <form method="post" action="report/was.php">
             <label for="orderDate">Select Branch</label><br><br>

                <select name="bsname" class="form-control" id="">
                    <option value="">Select</option>
                    <?php

                    $clo = $pdo->query("SELECT name FROM stores");

                    while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$data[name]'>$data[name]</option>";
                    }
                    ?>

                </select><br>
        
                <input type="submit"  class="btn btn-dark" value="submit">
            </form>
            </div>
            <div class="col-md-6">

            <p class="description" id="branch">Datewise - Reports</p><br>

            <form method="post" action="report/wasdate.php">
        <label for="orderDate">Select Date</label><br><br>
        <input type="date" id="wasteDate"class="form-control" name="wasteDate"><br>
        <input type="submit"  class="btn btn-dark" value="Submit">
    </form>        </div>

    </div>
    </div>
    <!-- <div class="widget">
        <h2 class="order"> Transport Waste</h2> -->
            <!-- Assuming you have a form where the user can select a date -->
<!-- <form action="report/transport.php" method="get">
    <label for="selected_date">Select a date:</label>
    
    
   
    <input type="date" name="selected_date" id="selected_date" required>
    <input type="submit" value="Get Waste Results">
</form>
    </div> -->
    <!-- <div class="widget">
    <form method="post" action="report/usedqty.php">
    <label for="orderDate">Select Branch</label><br><br>
    <select name="selected_branch" class="form-control" id="">
        <option value="">Select</option>
        <?php
        $clo = $pdo->query("SELECT name FROM stores");
        while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($data['name']) . "'>" . htmlspecialchars($data['name']) . "</option>";
        }
        ?>
    </select><br>
    <input type="submit" class="btn btn-dark" value="submit">
</form>
    </div>
    <div class="widget">
       
  
    <p class="description" id="branch">Transport waste</p>
<br>

<form method="post" action="report/used.php">
    <label for="orderDate">Select Branch</label><br><br>
    <select name="bssname" class="form-control" id="">
        <option value="">Select</option>
        <?php
        $clo = $pdo->query("SELECT name FROM stores");
        while ($data = $clo->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($data['name']) . "'>" . htmlspecialchars($data['name']) . "</option>";
        }
        ?>
    </select><br>
    <input type="submit" class="btn btn-dark" value="submit">
</form>
     -->
            
</body>

</html>

