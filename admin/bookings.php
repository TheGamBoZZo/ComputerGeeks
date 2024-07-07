<?php

include('includes/header.php');
// include('../middleware/adminMiddleware.php');
include('../functions/myFunctions.php') ;
// include('code.php') ;

// $data = $_GET($getUserInfo);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                   <h4 class="text-white">Booking Appointments
                   <a href="bookingHistory.php" class="btn btn-dark float-end">Booking History</a>
                   </h4> 
                </div>
                <div class="card-body" id= "">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Appointment Time</th>
                                <th>Date</th>
                                <th>Service</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $appointment = getAppointment();

                                if(mysqli_num_rows($appointment) > 0)
                                {
                                    foreach($appointment as $item)
                                    {
                                        ?>
                                <tr>
                                    <td><?=$item ['id']?></td>
                                    <td><?=$item ['user_id']?></td>
                                    <td><?=$item ['name']?></td>
                                    <td><?=$item ['service_time']?>:00</td>
                                    <td><?=$date?></td>
                                    <td><?=$item ['service_type']?></td>
                                </tr>
                                        <?php
                                    }

                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="5">No orders yet homie</td>
                                    </tr>
                                    <?php
                                }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>   
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>