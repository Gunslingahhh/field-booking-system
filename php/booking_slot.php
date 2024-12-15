<?php
    session_start();
    // Include the database connection file
    include "connection.php";
    $field_id = $_POST['field_id'];
    $booking_date = $_POST['booking_date'];

    if (isset($_POST['booking-slot'])){
        $_SESSION['message'] = "Enter your information";
        header("Location: ../index.php");
    }
    else{
        //Do nothing
    }

    /* $sql = "INSERT INTO `booking` (`booking_date`, `field_id`, `booking_status`) VALUES (?, ?, 'booked');";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $booking_date, $field_id);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    } */
?>
