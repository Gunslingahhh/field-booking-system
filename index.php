<?php
    session_start();
    // Include the database connection file
    include "php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Field Booking System</title>
        <link href="css/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include "php/topnav.php";?>
        <div class="d-flex justify-content-center">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="text-center mb-5">Welcome to Field Booking System</h3>
                    <form class="d-flex justify-content-center" action="php/booking_process.php" method="POST">
                        <div class="mb-3 w-50">
                            <label for="booking_date">Choose a date</label>
                            <input type="date" class="form-control mb-3" id="booking_date" name="booking_date" min="<?php echo date('Y-m-d'); ?>">
                            
                            <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<div class='alert alert-primary mt-3 text-center'>" . $_SESSION['message'] . "</div>";
                                    unset($_SESSION['message']);
                                }
                            ?>

                            <div class="d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary" name="date-check" value="Check"></input>
                            </div>
                        </div> 
                        <br> 
                    </form>
                    <?php
                        if (isset($_SESSION['booking_date'])) {
                            echo"
                            <table class='table table-striped'>
                                    <thead class='thead'>
                                        <tr>
                                            <th scope='col'>Field</th>
                                            <th scope='col'>Time</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>";

                                /*select date, then check from booking table if there are booking on the date, 
                                if there are, check what field are booked, display the field that are not booked*/
                            $datecheck_sql = "SELECT f.field_id, f.field_name, f.field_time, f.field_price
                                            FROM field f
                                            LEFT JOIN booking b ON f.field_id = b.field_id AND b.booking_date = ?
                                            WHERE b.booking_id IS NULL";

                            $stmt = $conn->prepare($datecheck_sql);
                            $stmt->bind_param("s", $booking_date);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            echo"<tbody>";
                            while ($row = $result->fetch_assoc()) {
                                $field_id=$row['field_id'];
                                echo "
                                <form method='POST' action='php/booking_slot.php'>
                                <tr>
                                    <input type='hidden' name='field_id' value=$field_id>
                                    <td scope='row'>" . $row['field_name'] . "</td>
                                    <td scope='row'>" . $row['field_time'] . "</td>
                                    <td scope='row'>RM" . $row['field_price'] . "</td>
                                    <input type='hidden' name='booking-date' value='$booking_date'>
                                    <td><input type='submit' class='btn btn-primary' name='booking-slot' value='Book'></td>
                                </tr>
                                </form>";
                            }
                            echo"</tbody>
                            </table>";

                            if (isset($_SESSION['booking_slot'])) {
                                echo $_SESSION['booking_slot'];
                                echo $_SESSION['booking_date'];
                            }
                            else{
                                echo $_SESSION['booking_slot'];
                                echo $_SESSION['booking_date'];
                            }    
                        }
                        unset($_SESSION['booking_slot']);
                        unset($_SESSION['booking_date']);
                    ?>
                </div>
            </div>
        </div>
        <script src="js/js/bootstrap.bundle.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>