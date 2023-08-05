<?php
var_dump($_POST['selected_branch']);

require_once('function.php');
dbconnect();

if (isset($_POST['selected_branch'])) {
    // Get the selected branch from the form
    $selected_branch = $_POST['selected_branch'];

    // Query to get the difference between qty in order_items and qty in categories for the selected branch
    $sql = "SELECT (oi.qty - c.qty) AS quantity_difference
            FROM orders_item oi
            JOIN categories c ON oi.qty = c.qty
            WHERE oi.qty = :selected_branch";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selected_branch', $selected_branch);
        $stmt->execute();

        // Fetch the result and display
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>Quantity Difference: " . $data['quantity_difference'] . "</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>No branch selected.</p>";
}
?>
