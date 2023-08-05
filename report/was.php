<?php
require_once('function.php');
dbconnect();

if (isset($_POST['bsname'])) {
    $selectedStore = $_POST['bsname'];
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE name = ?");
    $stmt->execute([$selectedStore]);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // The form is not submitted or no store is selected, handle this case accordingly
    $categories = array(); // Empty array to prevent errors in the table
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
            <h2>Waste Report for <?php echo htmlspecialchars($selectedStore); ?></h2>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Branch Name</th>
                        <th>Qty</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody class='table-striped'>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category['id']); ?></td>
                            <td><?php echo htmlspecialchars($category['name']); ?></td>
                            <td><?php echo htmlspecialchars($category['qty']); ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
