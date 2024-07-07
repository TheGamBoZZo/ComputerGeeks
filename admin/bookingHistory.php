<?php 

include('includes/header.php') ;
include('../middleware/adminMiddleware.php');  

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                   <h4 class="text-white">Appointments
                   <a href="orders.php" class="btn btn-dark float-end">Back</a>
                   </h4> 
                </div>
                <div class="card-body" id= "">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Service</th>
                                <th>Appointment Date</th>
                                <th>Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $appointments = getAppointmentHistory();

                                if(mysqli_num_rows($appointments) > 0)
                                {
                                    foreach($appointments as $item)
                                    {
                                        ?>
                                <tr>
                                    <td><?=$item ['id']?></td>
                                    <td><?=$item ['name']?></td>
                                    <td><?=$item ['service']?></td>
                                    <td><?=$item ['date']?></td>
                                    <td><?=$item ['time']?>:00</td>

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