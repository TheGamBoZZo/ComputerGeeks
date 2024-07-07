<?php 
include('functions/userFunctions.php') ;
include('includes/header.php');
include('config/dbcon.php');
include('authenticator.php');

if(isset($_GET['date'])) {
    $date = $_GET['date'];
} else {
    $date = date('Y-m-d');
}
$userId = $_SESSION['auth_user']['user_id'];
?>

<div class="container">
    <h1 class="text-center mt-3">Book for Date:<br><?php echo date('d F Y', strtotime($date));?></h1><hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="functions/handleBooking.php" method="POST" autocomplete="off">
                <input type="hidden" name="user_id" value="<?=$userId?>">
                <div class="form-group mb-3">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone Number:</label>
                    <input type="number" class="form-control" name="pNumber" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Select Times:</label><br>
                    <div class="row">
                        <div class="col-md-3">
                            <select name="service_time"  class="btn btn-lg btn-secondary dropdown-toggle">
                                <option value="8">8:00</option>
                                <option value="9">9:00</option>
                                <option value="10">10:00</option>
                                <option value="11">11:00</option>
                                <option value="13">13:00</option>
                                <option value="14">14:00</option>
                                <option value="15">15:00</option>
                                <option value="16">16:00</option>
                                <option value="17">17:00</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <input type="date" id="date" name="date" value="<?=$date?>" readonly disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="">Select Services:</label><br>
                    <select name="service_name" class="btn btn-lg btn-secondary dropdown-toggle w-100">
                            <?php
                            $services = getAllActiveS();

                            if(mysqli_num_rows($services) > 0 )
                            {
                                foreach ($services as $item)
                                {
                            ?>
                                    <option> <?= $item['name'];?> </option>
                            <?php
                                }
                            }
                            else 
                            {
                                echo "No data available";
                            }
                    ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary submitBookingTime" type="submit" name="submitBookingTime">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php')
?>