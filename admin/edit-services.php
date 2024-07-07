<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $services = getByIDS("services", $id);

                    if(mysqli_num_rows($services) > 0)
                    {
                        $data = mysqli_fetch_array($services);

                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Services
                                <a href="services.php" class="btn btn-primary float-end"> 
                                Back
                            </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <input type="hidden" name="service_id" value="<?= $data['id'] ?>">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter category name" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Description</label>
                                            <textarea rows="3" type="text" name="description" placeholder="Enter the description"class="form-control"><?= $data['description'] ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Popular</label>
                                            <input type="checkbox" name="popular" >
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="update_services_btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        echo "Service not found";
                    }

                }
                else
                {
                   echo "id missing from the url";
                }
                ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>