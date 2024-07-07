<?php 

include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
//include('../functions/myfunctions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Services</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $products = getAllS("services");

                                if(mysqli_num_rows($products) > 0 )
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                            <tr>
                                <th> <?= $item['id'] ;?> </th>
                                <th> <?= $item['name'] ;?> </th>
                                <td>
                                    <?= $item['price']; ?>
                                </td>
                                <td>
                                    <a href="edit-services.php?id=<?= $item['id'] ;?>" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                        <form action="code.php" method="POST">
                                        <input type="hidden" name="service_id" value="<?=$item['id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_service_btn">Delete</button>
                                        </form>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('includes/footer.php'); ?>