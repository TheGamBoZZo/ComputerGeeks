<?php 
// session_start();

include('functions/userFunctions.php');
include('includes/header.php');



?>
    <!-- <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="lead">Hello, welcome to our website!</p>
                <p>Today's date and time is: <strong><?php echo date('Y-m-d H:i:s'); ?></strong></p>
            </div>
        </div>
    </div> -->
<?php 
include('includes/header-hero.php');
include('includes/slider.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Trending Products</h1>
                <div class="underline mb-2"></div>
                <hr>
                <div class="owl-carousel">
                        <?php 
                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0 )
                            {
                                foreach($trendingProducts as $item)
                                {
                                    ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug'] ;?>">
                                            <div class="card shadow" >
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image'];?>" alt="Product Image" class="w-100 h-100">
                                                    <h4 class="text-center"><?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Services</h4>
                <div class="underline mb-2"></div>
                <hr>
                <div class="owl-carousel">
                        <?php 
                            // $services = getAllServices();
                            // if(mysqli_num_rows($services) > 0 )
                            // {
                            //     foreach($services as $item)
                            //     {
                                    ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<//?= $item['slug'] ;?>">
                                            <div class="card shadow" >
                                                <div class="card-body">
                                                    <img src="uploads/<//?= $item['image'];?>" alt="Product Image" class="w-100 h-100">
                                                    <h4 class="text-center"><//?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <?php
                                //}
                            //}
                        ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center" id="aboutUs">About Us</h3>
                <div class="underline mb-2"></div>
                <hr>
                    <p>
                    Welcome to Ahmed Hoosain's Tech Emporium, your one-stop shop for all things tech! Founded by Ahmed Hoosain, a passionate tech enthusiast with years of experience in the industry, our mission is to provide top-quality computers, computer parts, and accessories to meet all your technological needs.
                    </p>
                    <h2>Our Products</h2>
            <p>We offer a wide range of products, including:</p>
            <ul>
                <li><strong>Computers:</strong> From powerful gaming rigs to efficient business machines, we have the right computer for you.</li>
                <li><strong>Computer Parts:</strong> Upgrade and customize your PC with our selection of high-performance components.</li>
                <li><strong>Accessories:</strong> Enhance your tech experience with our range of headphones, keyboards, mice, and more.</li>
                <li><strong>Tech Gadgets:</strong> Stay ahead of the curve with the latest tech innovations and must-have gadgets.</li>
            </ul>
            
            <h2>Our Services</h2>
            <p>At Ahmed Hoosain's Tech Emporium, we don't just sell products—we provide solutions. Our expert technicians are ready to assist with:</p>
            <ul>
                <li><strong>Computer Repairs:</strong> Whether it's a hardware issue or a software glitch, we can fix it.</li>
                <li><strong>Phone Repairs:</strong> From screen replacements to battery issues, we handle all types of mobile repairs.</li>
                <li><strong>Device Maintenance:</strong> Keep your devices running smoothly with our maintenance services.</li>
            </ul>
            
            <h2>Why Choose Us?</h2>
            <p><strong>Expertise:</strong> Ahmed Hoosain and his team bring extensive knowledge and passion for technology to ensure you get the best products and services.</p>
            <p><strong>Quality:</strong> We only offer products from trusted brands and provide reliable repair services.</p>
            <p><strong>Customer Satisfaction:</strong> Your satisfaction is our top priority. We are committed to providing excellent customer service and support.</p>
            
            <p>Explore our website to discover our wide range of products and services. Whether you're looking to upgrade your setup, find the perfect accessory, or need a device repaired, Ahmed Hoosain's Tech Emporium is here to help.</p>
            
            <p>Thank you for choosing us for your tech needs!</p>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
        <div class="about-us">
            <div class="mt-2 mb-2"> <h1>About Us</h1> </div>
            <div class="underline mb-2"></div>
            <p>Welcome to Ahmed Hoosain's Tech Emporium, your one-stop shop for all things tech! Founded by Ahmed Hoosain, a passionate tech enthusiast with years of experience in the industry, our mission is to provide top-quality computers, computer parts, and accessories to meet all your technological needs.</p>
            
            <div class="mt-2 mb-2"><h1>Our Products</h1></div>
            <div class="underline mb-2"></div>
            <p>We offer a wide range of products, including:</p>
            <ul>
                <li><strong>Computers:</strong> From powerful gaming rigs to efficient business machines, we have the right computer for you.</li>
                <li><strong>Computer Parts:</strong> Upgrade and customize your PC with our selection of high-performance components.</li>
                <li><strong>Accessories:</strong> Enhance your tech experience with our range of headphones, keyboards, mice, and more.</li>
                <li><strong>Tech Gadgets:</strong> Stay ahead of the curve with the latest tech innovations and must-have gadgets.</li>
            </ul>
            
            <div class="mt-2 mb-2"><h1>Our Services</h1></div>
            <div class="underline mb-2"></div>
            <p>At Ahmed Hoosain's Tech Emporium, we don't just sell products—we provide solutions. Our expert technicians are ready to assist with:</p>
            <ul>
                <li><strong>Computer Repairs:</strong> Whether it's a hardware issue or a software glitch, we can fix it.</li>
                <li><strong>Phone Repairs:</strong> From screen replacements to battery issues, we handle all types of mobile repairs.</li>
                <li><strong>Device Maintenance:</strong> Keep your devices running smoothly with our maintenance services.</li>
            </ul>
            
            <div class="mt-2 mb-2"><h1>Why Choose Us?</h1></div>
            <div class="underline mb-2"></div>
            <p><strong>Expertise:</strong> Ahmed Hoosain and his team bring extensive knowledge and passion for technology to ensure you get the best products and services.</p>
            <p><strong>Quality:</strong> We only offer products from trusted brands and provide reliable repair services.</p>
            <p><strong>Customer Satisfaction:</strong> Your satisfaction is our top priority. We are committed to providing excellent customer service and support.</p>
            
            <p>Explore our website to discover our wide range of products and services. Whether you're looking to upgrade your setup, find the perfect accessory, or need a device repaired, Ahmed Hoosain's Tech Emporium is here to help.</p>
            
            <p>Thank you for choosing us for your tech needs!</p>
        </div>
    </div>



<div class="py-5 bg-dark mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">Computer Geeks</h4>
                <hr>
                <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i> Home</a> <br>
                <a href="catergories.php" class="text-white"> <i class="fa fa-angle-right" ></i> Our Collections</a> <br>
                <a href="services.php" class="text-white"> <i class="fa fa-angle-right" ></i> Services</a> <br>
                <a href="calendar.php" class="text-white"> <i class="fa fa-angle-right" ></i> Appointments</a> <br>


            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                    <hr>
                <p class="text-white">
                    51 Elmwood Avenue,
                    Rylands 7764,
                    Cape Town, Western Cape
                    South Africa
                </p>
                <a href="tel:+1(555)123-4567" class="text-white"> <i class="fa fa-phone"></i> +27 61 975 3281 </a> <br>
                <a href="mailto:computergeeks@gmail.com" class="text-white"> <i class="fa fa-envelope"></i> computergeeks@gmail.com</a>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3575.0297177772727!2d127.78123407520819!3d26.3579007837135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDIxJzI4LjQiTiAxMjfCsDQ3JzAxLjciRQ!5e0!3m2!1sen!2sza!4v1686151348772!5m2!1sen!2sza" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-primary">
    <div class="text-center">
        <p class="mb-0 text-white" ><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-white" target="_blank"> All Rights and Lefts reserved. Copyright @  TheGamBoZZo </a>  <?= date('Y') ?> </p>
    </div>

</div>


<?php include('includes/footer.php') ?>

<script>
    $(document).ready(function()
    {
        $('.owl-carousel').owlCarousel
        ({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
        })
    })

</script>