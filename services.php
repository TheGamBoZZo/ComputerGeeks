<?php 
include('functions/userFunctions.php') ;
include('includes/header.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home / 
            </a>
            <a class="text-white" href="services.php">
                Services / 
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                   <h1>Our Services</h1> 
                </div>
                <div class="card-body" >
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>




                <?php
                $services = getAllActiveS();

                if(mysqli_num_rows($services) > 0 )
                {
                    foreach ($services as $item)
                    {
                        ?>
                        <tr>
                            <th> <?= $item['name'] ;?> </th>
                            <th> <?= $item['price'] ;?> </th>

                        </tr>

                        <?php
                    }
                }
                else 
                {
                    echo "No data available";
                }
                ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>