<?php



require_once('function.php');
dbconnect();


if (isset($_GET['selected_date'])) {
    // Get the selected date from the URL parameter
    $selected_date = $_GET['selected_date'];

    // Query to get the difference between received_qty and send_qty for the selected date
    $sql = "SELECT (received_qty - send_qty) AS quantity_difference FROM orders WHERE order_date= :selected_date";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':selected_date', $selected_date);
    $stmt->execute();

    // Fetch the result and display
    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>Quantity Difference: " . $data['quantity_difference'] . "</p>";
    }
} else {
    echo "<p>No date selected.</p>";
}
?>
