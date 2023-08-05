<?php
require_once('function.php');
dbconnect();

// Check if the form is submitted
if (isset($_POST['bssname'])) {
    // Get the selected branch name from the form
    $selected_branch = $_POST['bssname'];

    // Query to get the difference between received_qty and send_qty for the selected branch
    $sql = "SELECT (send_qty - received_qty) AS quantity_difference FROM orders WHERE name = :selected_branch";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':selected_branch', $selected_branch);
    $stmt->execute();

    // Fetch the result and display
    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>Quantity Difference: " . $data['quantity_difference'] . "</p>";
    }
} else {
    echo "<p>No branch selected.</p>";
}
?>