<?php

session_start();

include('config/dbcon.php');
include('../functions/myFunctions.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';

    $image = $_FILES['image']['name'] ;

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories 
    (name,slug,description, meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("category.php","Category Added Successfull Boss");
    }
    else
    {
        redirect("add-category.php","Something went wrong");
    }


}
else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") 
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else 
    {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET 
        name='$name', 
        slug='$slug',
        description='$description',
        meta_title='$meta_title',
        meta_description='$meta_description',
        meta_keywords='$meta_keywords',
        status='$status',
        popular='$popular'";

    if ($new_image != "") {
        $update_query .= ", image='$update_filename'";
    }

    $update_query .= " WHERE id='$category_id'";


    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path .'/'.$update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Category Update was unsuccessful");
    }
    
}

else if(isset($_POST['delete_category_btn']))
{
    $category_id= mysqli_real_escape_string($con,$_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if (file_exists("../uploads/" . $image)) 
        {
            unlink("../uploads/" . $image);
        }

        redirect("category.php", "Category deleted Succesfully");
    }
    else
    {
        redirect("category.php", "Something went wrong");

    }
}
else if(isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'] ;

    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name != "" && $slug !="" && $description !="")
    {

        $product_query = "INSERT INTO products 
        (category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,image)
        VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title','$meta_description','$meta_keywords','$status','$trending','$filename')";
        
        $product_query_run = mysqli_query($con,$product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("products.php", "Product was successfully added");
        }
        else
        {
            redirect("add-product.php", "Something went wrong boss");
        }
    }
    else
    {
        redirect("add-product.php", "All fields are mandatory");
    }



}
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'] ;

    $path = "../uploads";

    $new_image = $_FILES['image']['name'] ;
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET 
    category_id='$category_id', name='$name' ,slug='$slug' ,small_description='$small_description' ,description='$description' 
    ,original_price='$original_price' , selling_price = '$selling_price' , qty='$qty' ,meta_title='$meta_title' ,meta_description='$meta_description' 
    ,meta_keywords='$meta_keywords',status='$status',trending='$trending' , image='$update_filename' WHERE id='$product_id'" ;
    
    $update_product_query_run = mysqli_query($con,$update_product_query);

    if ($update_product_query_run) 
    {
        if (!empty($_FILES['image']['name'] != "" )) 
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) 
            {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("products.php", "Product Updated Successfully");
    } 
    else 
    {
        redirect("edit-products.php?id=$product_id", "Category Update was unsuccessful");
    }
}
else if(isset($_POST['delete_product_btn']))
{
    $product_id= mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if (file_exists("../uploads/" . $image)) 
        {
            unlink("../uploads/" . $image);
        }

        redirect("products.php", "Category deleted Succesfully");
    }
    else
    {
        redirect("products.php", "Something went wrong");

    }
}
else if(isset($_POST['update_order_btn']))
{
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateStatus_query = "UPDATE orders SET status='$order_status' WHERE tracking_no = '$track_no'";
    $updateStatus_query_run =mysqli_query($con, $updateStatus_query);

    redirect("viewOrder.php?t=$track_no", "Order Status has been Successfully Updated");
}
else if(isset($_POST['add_service_btn']))
{   
;
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $popular = isset($_POST['popular']) ? '1':'0';


    if($name != "" && $slug !="" && $description !="")
    {

        $service_query = "INSERT INTO services 
        (name,slug,description,price,popular)
        VALUES ('$name','$slug','$description','$price','$popular')";
        
        $service_query_run = mysqli_query($con,$service_query);

        if($service_query_run)
        {
            redirect("add-services.php", "Service was successfully added");
        }
        else
        {
            redirect("add-services.php", "Something went wrong boss");
        }
    }
    else
    {
        redirect("add-services.php", "All fields are mandatory");
    }



}
else if(isset($_POST['update_services_btn']))
{
    $service_id = $_POST['service_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $popular = isset($_POST['popular']) ? '1':'0';


    $updateS_query = "UPDATE services SET name='$name', slug='$slug',description='$description',popular='$popular'
    WHERE id='$service_id' ";

    $updateS_query_run = mysqli_query($con, $updateS_query);

    if ($updateS_query_run) 
    {
        redirect("services.php", "Service Updated Successfully");
    } 
    else 
    {
        redirect("services.php?id=$service_id", "Service Update was unsuccessful");
    }
}
else if(isset($_POST['delete_service_btn']))
{
    $service_id= mysqli_real_escape_string($con,$_POST['service_id']);

    $services_query = "SELECT * FROM services WHERE id='$service_id'";
    $services_query_run = mysqli_query($con, $services_query);
    $services_data = mysqli_fetch_array($services_query_run);

    $deleteS_query = "DELETE FROM services WHERE id='$service_id'";
    $deleteS_query_run = mysqli_query($con, $deleteS_query);

    if($deleteS_query_run)
    {

        redirect("services.php", "Services deleted Succesfully");
    }
    else
    {
        redirect("services.php", "Something went wrong");

    }
}
else if(isset($_POST['add_viewed_btn']))
{
    $username = $_POST['username'];


    $cate_query = "INSERT INTO users 
    (name,ID)
    VALUES ('$name','$ID')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        redirect("index.php","Category Added Successfull Boss");
    }
    else
    {
        redirect("index.php","Something went wrong");
    }


}
else
{
    header('Location: ../index.php');
}








?>