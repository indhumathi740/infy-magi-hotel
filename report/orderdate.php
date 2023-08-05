<?php
require_once('function.php');
dbconnect();


if (isset($_POST['orderDate'])) {
    $selectedOrder = $_POST['orderDate'];
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_date = ?");
    $stmt->execute([$selectedOrder]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // The form is not submitted or no store is selected, handle this case accordingly
    $orders = array(); // Empty array to prevent errors in the table
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
            <h2>Order Report for <?php echo htmlspecialchars($selectedOrder); ?></h2>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Branch Name</th>
                        <th>Status Date</th>
                        <th>Type</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody class='table-striped'>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['name']); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                            <td><?php echo htmlspecialchars($order['type']); ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
