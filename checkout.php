<?php 

include('functions/userFunctions.php') ;
include('includes/header.php') ;
include('authenticator.php');

$cartItems = getCartItems();

if(mysqli_num_rows($cartItems) == 0)
(
    redirect("index.php",'Order something bro')
)

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php" class="text-white">
                Home /
            </a>
            <a class="text-white" href="checkout.php" class="text-white">
                Checkout /
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Enter your Full name " class="form-control">
                                <small class="text-danger name"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email" id="email" required placeholder="Enter your email " class="form-control">
                                <small class="text-danger email"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone Number</label>
                                <input type="number" name="phone" id="phone" required placeholder="Enter your phone number" class="form-control">
                                <small class="text-danger phone"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" id="pincode" required placeholder="Enter your pin code " class="form-control">
                                <small class="text-danger pincode"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address (If you are collecting in store then type : "Collection")</label>
                                <textarea name="address" required id="address" class="form-control" rows="5"></textarea>
                                <small class="text-danger address"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order details</h5>
                        <hr>


                        <?php 
                        $items = getCartItems();
                        $totalPrice = 0;

                        foreach ($items as $citem)
                        {
                            ?>
                        <div class="mb-2 border">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?=$citem['image']?>" alt="Image" width="60px">
                                </div>
                                <div class="col-md-5">
                                    <label><?=$citem['name']?></label>
                                </div>
                                <div class="col-md-3">
                                    <label><?=$citem['selling_price']?></label>
                                </div>
                                <div class="col-md-2">
                                    <label>x <?=$citem['prod_qty']?></label>
                                </div>

                            </div>
                        </div>
                        <?php
                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'] ;
                        }

                        ?>
                        <hr>
                        <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice ?></span> </h5>
                        <hr>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                        </div>
                        <button name="placeOrderBtn" title="Cash on delivery" type="submit" class="btn btn-primary w-100 mb-3" >Confirm and Place order </button>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>

<script src="https://www.paypal.com/sdk/js?client-id=AW6xli437qvJRq2xTmglimuXgvgvMZ5DYYZDMHrsyfBf5i6TWE29651oL_WPj46hGDNOqgtEVpyHsBIx&components=buttons&enable-funding=venmo,paylater"></script>

<script>
               
    paypal.Buttons({
        onClick(){
            // console.log("On click");

            var name = $('#name').val();     
            var email = $('#email').val();   
            var phone = $('#phone').val();   
            var pincode = $('#pincode').val();   
            var address = $('#address').val();

            if(name.length == 0)
            {
                $('.name').text("*This field is required");
            }
            else
            {
                $('.name').text("");
            }
            if(email.length == 0)
            {
                $('.email').text("*This field is required");
            }
            else
            {
                $('.email').text("");
            }
            if(phone.length == 0)
            {
                $('.phone').text("*This field is required");
            }
            else
            {
                $('.phone').text("");
            }
            if(pincode.length == 0)
            {
                $('.pincode').text("*This field is required");
            }
            else
            {
                $('.pincode').text("");
            }
            if(address.length == 0)
            {
                $('.address').text("*This field is required");
            }
            else
            {
                $('.address').text("");
            }

            if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
            {
                return false;
            }
            
        },

        createOrder: (data,actions) => 
        {
            // console.log("Create a Order");

            return actions.order.create({
                purchase_units:[{
                    amount: {
                        value: '<?= $totalPrice?>'
                    }
                }]
            });
        },

        style: {
          layout: 'vertical',
          shape: 'rect',
          color: 'blue',
        },

        onApprove: (data,actions) =>{
            return actions.order.capture().then(function(orderData){

                // console.log(orderData );
                const transaction = orderData.purchase_units[0].payments.captures[0];
                // alert('Transaction ' + transaction.status + ': ' + transaction.id + 'See console for all available details');
                
                var name = $('#name').val();     
                var email = $('#email').val();   
                var phone = $('#phone').val();   
                var pincode = $('#pincode').val();   
                var address = $('#address').val();

                var data = {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'pincode':pincode,
                    'address': address,
                    'payment_mode': "Paid By Paypal",
                    'payment_id': transaction.id ,
                    'placeOrderBtn' : true
                };
                
                $.ajax({
                    method: "POST",
                    url: "functions/placeorder.php",
                    data : data,
                    success: function(response){
                        if(response == 201)
                        {
                            alertify.success("Order has been Placed Successfully");
                            // actions.redirect('myorder.php');
                            window.location.href = 'myorder.php';
                        }
                        // else
                        // {
                        //     console.log(response);
                        // }
                    }

                })
            });
        }
    }).render('#paypal-button-container');
  </script>