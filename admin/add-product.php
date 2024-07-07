<?php 

include('includes/header.php'); 
include('../middleware/adminMiddleware.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add products</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select Category</option>
                                    <?php 
                                        $categories = getAll('categories');

                                        if(mysqli_num_rows($categories) > 0 )
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No category available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Name</label>
                                <input type="text" required name="name" placeholder="Enter category name"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label  class="mb-0" for="">Slug</label>
                                <input type="text" required name="slug" placeholder="Enter slug"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Small Description</label>
                                <textarea rows="3" required type="text" name="small_description"
                                    placeholder="Enter the small description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Description</label>
                                <textarea rows="3" required type="text" name="description"
                                    placeholder="Enter the description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label  class="mb-0" for="">Original Price</label>
                                <input type="text" required name="original_price" placeholder="Enter original price"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label  class="mb-0" for="">Selling Price</label>
                                <input type="text" required name="selling_price" placeholder="Enter Selling Price"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label  class="mb-0" for="">Quantity</label>
                                <input type="number" required name="qty" placeholder="Enter Quantity"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-3">
                                <label  class="mb-0" for="">Status</label></br>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-3">
                                <label  class="mb-0" for="">Trending</label></br>
                                <input type="checkbox" name="trending">
                            </div>

                            <div class="col-md-12">
                                <label  class="mb-0" for="">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter Meta Title"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Enter Meta Description"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords" placeholder="Enter Meta Keywords"
                                    class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>