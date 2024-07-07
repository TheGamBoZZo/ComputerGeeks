<?php 

include('functions/userFunctions.php') ;
include('includes/header.php') ;
include('authenticator.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php" class="text-white">
                Home / 
            </a>
            <a class="text-white" href="appointments.php" class="text-white">
                My Appointments / 
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Name</th>
                                <th>Appointment Time</th>
                                <th>Appointment Date</th>
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
                                    <td><?=$item ['name']?></td>
                                    <td><?=$item ['service_time']?>:00</td>
                                    <td><?=$item ['date']?></td>
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