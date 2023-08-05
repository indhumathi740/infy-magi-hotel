<?php
require_once('function.php');
dbconnect();

if (isset($_POST['bssname'])) {
    $selectedStore = $_POST['bssname'];
    $stmt = $pdo->prepare("SELECT * FROM brands WHERE name = ?");
    $stmt->execute([$selectedStore]);
    $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // The form is not submitted or no store is selected, handle this case accordingly
    $brands = array(); // Empty array to prevent errors in the table
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-- ... previous header content ... -->
    </header>
    <div class="container">
        <div class="widget">
            <h2>Stock Report for <?php echo htmlspecialchars($selectedStore); ?></h2>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Branch Name</th>
                        <th>qty</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody class='table-striped'>
                    <?php foreach ($brands as $brand) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($brand['id']); ?></td>
                            <td><?php echo htmlspecialchars($brand['name']); ?></td>
                            <td><?php echo htmlspecialchars($brand['qty']); ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
