<?php
    // Include the database connection file
    include "php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Field Booking System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <?php include "php/topnav.php";?>
        <div class="d-flex justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <h3 class="text-center mb-5">Welcome to Field Booking System</h3>
                    <form class="d-flex justify-content-center" action="php/booking_process.php" method="POST">
                        <div class="mb-3 w-50">
                            <label for="booking_date">Choose a date</label>
                            <input type="date" class="form-control mb-3" id="booking_date" name="booking_date" min="<?php echo date('Y-m-d'); ?>" aria-readonly>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" name="date-check">Check</button>
                            </div>
                        </div> 
                        <br> 
                    </form>
                    <?php
                    
                    echo"<table class='table table-striped'>
                            <thead class='thead'>
                                <tr>
                                    <th scope='col'>Field</th>
                                    <th scope='col'>Time</th>
                                    <th scope='col'>Duration</th>
                                </tr>
                            </thead>
                        </table>
                        ";?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>