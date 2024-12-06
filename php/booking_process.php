<?php
    // Include the database connection file
    include "connection.php";

    $booking_date = $_POST['booking_date'];

    if (isset($_POST['date-check'])){
        $stmt = $conn->prepare("SELECT COUNT(*) FROM booking WHERE booking_date = ? AND booking_status = 'booked'");
        $stmt->bind_param("s", $booking_date);
        $stmt->bind_result($count);
        $stmt->fetch();

        if ($count == 0) {
            header("Location: ../index.php");
        } else {
            echo "Slot is booked";
        }
    }
    else{
        echo "no";
    }
?>
