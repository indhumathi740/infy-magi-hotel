<div class="content-wrapper show">
<!DOCTYPE html>
<html>

<head>
    
    <style>
        .report{
            text-align: center;
        }
    </style>
    <!-- <div class="content-wrapper show"> -->
    <title>Report Page</title>

    <!-- Add CSS for date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add JavaScript for date picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="wrapper">
    <h1 class="report">Report Page</h1>

    <!-- Filter box to choose day, month, or year -->
    <label for="dateFilter">Choose Date Range:</label>
    <select id="dateFilter">
        <option value="day">Day</option>
        <option value="month">Month</option>
        <option value="year">Year</option>
    </select>
    <input type="text" id="startDate" class="datepicker">
    <input type="text" id="endDate" class="datepicker">
    <button id="filterBtn">Filter</button>

    <!-- Links to Order, Stock, and Waste reports -->
    <h2>Order Report</h2>
    <a href="<?php echo base_url('orders/') ?>" id="orderReportLink">View Order Report</a>

    <h2>Stock Report</h2>
    <a href="#" id="stockReportLink">View Stock Report</a>

    <h2>Waste Report</h2>
    <a href="#" id="wasteReportLink">View Waste Report</a>

    <script type="text/javascript">
        // Add JavaScript code here for the filter option and linking to specific reports

    </script>
</body>
</html>
<script type="text/javascript">
    // Function to handle the filter button click
    function handleFilterClick() {
        var dateFilter = $('#dateFilter').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        if (startDate && endDate) {
            var reportLink = 'order';
            if (dateFilter === 'month') {
                reportLink += '_monthly';
            } else if (dateFilter === 'year') {
                reportLink += '_yearly';
            }
            reportLink += '_report?start_date=' + startDate + '&end_date=' + endDate;
            window.location.href = reportLink;
        } else {
            alert('Please select both start and end dates.');
        }
    }

    // Function to initialize date picker
    function initializeDatePicker() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    }

    // Call the necessary functions when the page loads
    $(document).ready(function() {
        initializeDatePicker();

        $('#filterBtn').on('click', handleFilterClick);

        // Link to Order Report
        $('#orderReportLink').on('click', function() {
            window.location.href = 'order_report';
        });

        // Link to Stock Report
        $('#stockReportLink').on('click', function() {
            window.location.href = 'stock_report';
        });

        // Link to Waste Report
        $('#wasteReportLink').on('click', function() {
            window.location.href = 'waste_report';
        });
    });
</script>
<!-- ... Other HTML code ... -->

<script type="text/javascript">
    // Function to handle the filter button click
    function handleFilterClick() {
        var dateFilter = $('#dateFilter').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        if (startDate && endDate) {
            var reportLink = 'order';
            if (dateFilter === 'month') {
                reportLink += '_monthly';
            } else if (dateFilter === 'year') {
                reportLink += '_yearly';
            }
            reportLink += '_report?start_date=' + startDate + '&end_date=' + endDate;
            window.location.href = reportLink;
        } else {
            alert('Please select both start and end dates.');
        }
    }

    // Function to load order report data
    function loadOrderReport() {
        // Make an AJAX call to fetch order report data from the server
        $.ajax({
            url: '<?php echo base_url('orders/fetchOrderReportData'); ?>', // Change this URL to the appropriate endpoint in your CodeIgniter application
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    // Display the order report data on the page
                    // Replace '#orderReportContainer' with the ID of the container where you want to show the order report data
                    $('#orderReportContainer').html(data.html);
                } else {
                    alert('Error fetching order report data.');
                }
            },
            error: function (xhr, status, error) {
                alert('An error occurred while fetching order report data.');
            }
        });
    }

    // Call the necessary functions when the page loads
    $(document).ready(function() {
        initializeDatePicker();

        $('#filterBtn').on('click', handleFilterClick);

        // Link to Order Report
        $('#orderReportLink').on('click', function() {
            loadOrderReport(); // Load order report data when clicking on the "Order Report" link
            return false; // Prevent the link from navigating to the 'order_report' URL
        });

        // Link to Stock Report
        $('#stockReportLink').on('click', function() {
            window.location.href = 'stock_report';
        });

        // Link to Waste Report
        $('#wasteReportLink').on('click', function() {
            window.location.href = 'waste_report';
        });
    });
</script>

<!-- ... Other HTML code ... -->
