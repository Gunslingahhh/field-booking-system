<?php
    session_start();
    // Include the database connection file
    include "connection.php";
    $field_id = $_POST['field_id'];
    $booking_date = $_POST['booking_date'];

    if (isset($_POST['date-check'])){

        if ($booking_date == ""){
            $_SESSION['message'] = "Please select a date!";
            header("Location: ../index.php");
        }
        else{
            $_SESSION['message'] = $booking_date;
            $_SESSION['booking_date'] = $booking_date;
            header("Location: ../index.php");
        }
    }
    else{
        $_SESSION['message'] = "Please try again.";
        header("Location: ../index.php");
    }

    
?>
