<!-- PHP INCLUDES -->

<?php

session_start(); // Start the session if it hasn't been started already

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Make sure to stop further execution after the redirect
}

include "connect.php";
include "Includes/templates/header.php";
include "Includes/templates/navbar.php";
include_once "Includes/functions/functions.php";


logUserActivity($_SESSION['user_id'], 'Opened Home Page');
?>

<!-- HOME SECTION -->

<section class="home-section" id="home-section">
    <div class="home-section-content">
        <div id="home-section-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#home-section-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#home-section-carousel" data-slide-to="1"></li>
                <li data-target="#home-section-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <!-- FIRST SLIDE -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <h3>It's Not Just a Haircut, It's an Experience.</h3>
                        <p>
                            Where Style Meets Precision. Unleash Your True Elegance with Every Trim
                            <br>
                            Tholitez Barbershop
                        </p>
                    </div>
                </div>
                <!-- SECOND SLIDE -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="Design/images/barbershop_image_2.jpg" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <h3>It's Beyond a Trim, It's an Odyssey in Grooming Excellence.</h3>
                        <p>
                            Crafting Confidence, One Cut at a Time. Your Signature Look Awaits in the Artistry of
                            Grooming.
                            <br>
                            Tholitez Barbershop
                        </p>
                    </div>
                </div>
                <!-- THIRD SLIDE -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="Design/images/barbershop_image_3.jpg" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <h3>It's Beyond a Trim, It's a Transformational Grooming Experience.</h3>
                        <p>
                            Elevate Your Grooming Experience, Redefining Style with Every Snip and Shave.
                            <br>
                            Tholitez Barbershop
                        </p>
                    </div>
                </div>
            </div>
            <!-- PREVIOUS & NEXT -->
            <a class="carousel-control-prev" href="#home-section-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#home-section-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- ABOUT SECTION -->


<!-- SERVICES SECTION -->
<section id="about" class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_content" style="text-align: center;">
                    <h3>Introducing</h3>
                    <h2>Tholitez <br>Since 2023</h2>
                    <img src="Design/images/about-logo.png" alt="logo">
                    <p style="color: #777">
                        Step into the world of Tholitez, where grooming is an art form. Our barbershop is dedicated to
                        delivering precision cuts, timeless styles, and an unparalleled grooming experience. With
                        skilled barbers and a welcoming ambiance, Tholitez ensures every visit is a blend of
                        sophistication and personalized care.
                    </p>
                </div>
            </div>
            <div class="col-md-6  d-none d-md-block">
                <div class="about_img" style="overflow:hidden">
                    <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1">
                    <img class="about_img_2" src="Design/images/about-2.jpg" alt="about-2">
                    <img class="about_img_3" src="Design/images/about-3.jpg" alt="about-3">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services_section" id="services">
    <div class="container">
        <div class="section_heading">
            <h2>Our Services</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-scissors-1"></i>
                    <h3>Haircut Styles</h3>
                    <p>A hairstyle is the arrangement and styling of hair, reflecting individual preferences, trends,
                        and cultural influences.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-razor-2"></i>
                    <h3>Beard Trimming</h3>
                    <p>Beard trimming is art of shaping and grooming facial hair for a desired look </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-brush"></i>
                    <h3>Smooth Shave</h3>
                    <p>A smooth shave is the process of closely removing facial hair with a razor or electric shaver for
                        smooth, hair-free skin.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padd_col_res">
                <div class="service_box">
                    <i class="bs bs-hairbrush-1"></i>
                    <h3>Face Masking</h3>
                    <p>Face masking involves applying a skincare product to improve skin health or address specific
                        concerns.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOOKING SECTION -->

<section class="book_section" id="booking">
    <div class="book_bg"></div>
    <div class="map_pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <form action="appointment.php" method="post" id="appointment_form"
                    class="form-horizontal appointment_form">
                    <div class="book_content">
                        <h2 style="color: white;">Make an appointment</h2>
                        <p style="color: #999;">
                            Book Your Spot, Define Your Style Where Every Appointment is a <br> Grooming Affair at
                            Tholitez Barbershop!
                        </p>
                    </div>

                    <!-- SUBMIT BUTTON -->



                    <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['user_id'])) {



                        // User is logged in, show "Make Appointment" button
                        echo '<button id="app_submit" class="default_btn" type="submit">Make Appointment</button>';
                    } else {
                        // User is not logged in, show "Login" button
                        echo '<a href="login.php" class="default_btn">Login</a>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY SECTION -->

<section class="gallery-section" id="gallery">
    <div class="section_heading">
        <h2>Barbers Gallery</h2>
        <div class="heading-line"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 gallery-column">
                <center>
                    <h5>by Eric Ronqillo</h5>
                </center>
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-1.jpg');"> </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <center>
                    <h5>by Joshua Pacuan</h5>
                </center>

                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-2.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <center>
                    <h5>by Tom Cruz</h5>
                </center>
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-3.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <center>
                    <h5>by Ruzelle Gabriel</h5>
                </center>
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-4.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-5.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-6.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-7.jpg');"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 gallery-column">
                <div style="height: 230px">
                    <div class="gallery-img" style="background-image: url('Design/images/portfolio-8.jpg');"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEAM SECTION -->

<section id="team" class="team_section">
    <div class="container">
        <div class="section_heading ">
            <h2>Our Barbers</h2>
            <div class="heading-line"></div>
        </div>
        <ul class="team_members row">
            <li class="col-lg-3 col-md-6 padd_col_res">
                <div class="team_member">
                    <img src="Design/images/team-1.jpg" alt="Team Member">
                    <h5></h5>
                    <center>
                        <h5>Eric Ronqillo</h5>
                    </center>
                </div>
            </li>
            <li class="col-lg-3 col-md-6 padd_col_res">
                <div class="team_member">
                    <img src="Design/images/team-2.jpg" alt="Team Member">
                    <h5></h5>
                    <center>
                        <h5>Joshua Pacuan</h5>
                    </center>
                </div>
            </li>
            <li class="col-lg-3 col-md-6 padd_col_res">
                <div class="team_member">
                    <img src="Design/images/team-3.jpg" alt="Team Member">
                    <h5></h5>
                    <center>
                        <h5>Tom Cruz</h5>
                    </center>
                </div>
            </li>
            <li class="col-lg-3 col-md-6 padd_col_res">
                <div class="team_member">
                    <img src="Design/images/team-4.jpg" alt="Team Member">
                    <h5></h5>
                    <center>
                        <h5>Ruzelle Gabriel</h5>
                    </center>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- REVIEWS SECTION -->

<section id="reviews" class="testimonial_section">
    <div class="container">
        <div id="reviews-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#reviews-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#reviews-carousel" data-slide-to="1"></li>
                <li data-target="#reviews-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <!-- REVIEW 1 -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"
                        style="visibility: hidden;">
                    <div class="carousel-caption d-md-block">
                        <h3>Its Not Just a Haircut, Its an Experience.</h3>
                        <p>
                            Our barbershop is the territory created purely for males who appreciate
                            <br>
                            premium quality, time and flawless look.
                        </p>
                    </div>
                </div>
                <!-- REVIEW 2 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"
                        style="visibility: hidden;">
                    <div class="carousel-caption d-md-block">
                        <h3>Beyond trim, personalized grooming journey.</h3>
                        <p>
                            Discover excellence premium quality, timeless craftsmanship, and flawless looks await."
                            <br>
                            A haven for men embracing the art of discerning grooming.
                        </p>
                    </div>
                </div>
                <!-- REVIEW 3 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"
                        style="visibility: hidden;">
                    <div class="carousel-caption d-md-block">
                        <h3>Beyond a cut, it's experience.</h3>
                        <p>
                            Exclusively for discerning gentlemen who value precision, style, and artistry..
                            <br>
                            "Excellence defines our premium grooming.
                        </p>
                    </div>
                </div>
            </div>
            <!-- PREVIOUS & NEXT -->
            <a class="carousel-control-prev" href="#reviews-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#reviews-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- PRICING SECTION  -->

<section class="pricing_section" id="pricing">

    <!-- START GET CATEGORIES  PRICES FROM DATABASE -->

    <?php

    $stmt = $con->prepare("Select * from service_categories");
    $stmt->execute();
    $categories = $stmt->fetchAll();

    ?>

    <!-- END -->

    <div class="container">
        <div class="section_heading">
            <h2>Our Barber Pricing</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <?php

            foreach ($categories as $category) {
                $stmt = $con->prepare("Select * from services where category_id = ?");
                $stmt->execute(array($category['category_id']));
                $totalServices = $stmt->rowCount();
                $services = $stmt->fetchAll();

                if ($totalServices > 0) {
                    ?>

                    <div class="col-lg-4 col-md-6 sm-padding">
                        <div class="price_wrap">
                            <h3>
                                <?php echo $category['category_name'] ?>
                            </h3>
                            <ul class="price_list">
                                <?php

                                foreach ($services as $service) {
                                    ?>

                                    <li>
                                        <h4>
                                            <?php echo $service['service_name'] ?>
                                        </h4>
                                        <p>
                                            <?php echo $service['service_description'] ?>
                                        </p>
                                        <span class="price">₱
                                            <?php echo $service['service_price'] ?>
                                        </span>
                                    </li>

                                    <?php
                                }

                                ?>

                            </ul>
                        </div>
                    </div>

                    <?php
                }
            }

            ?>

        </div>
    </div>
</section>

<!-- CONTACT SECTION -->

<section class="contact-section" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding">
                <div class="contact-info">
                    <h2>
                        Get in touch with us &
                        <br>send us suggestion today!
                    </h2>
                    <p>
                        It's not just a hair cut, it is happiness.
                    </p>
                    <h3>
                        123 Biga
                        <br>
                        Silang, Cavite
                    </h3>
                    <h4>
                        <span style="font-weight: bold">Email:</span>
                        contact@barbershop.com
                        <br>
                        <span style="font-weight: bold">Phone:</span>
                        (+63) 912 324 5555
                    </h4>
                </div>
            </div>
            <div class="col-lg-6 sm-padding">
                <div class="contact-form">
                    <form action="send.php" method="post" id="contact_ajax_form" class="contactForm">
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" id="contact_send" class="default_btn">Send Message</button>
                            </div>
                        </div>
                        
                        <div id="contact_status_message"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- WIDGET SECTION / FOOTER -->

<section class="widget_section">
    <div class="container mx-auto">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <img src="Design/images/barbershop_logo.png" alt="Brand">
                    <p>
                        Our barbershop is created for men who appreciate premium quality, time, and a flawless look.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>Headquarters</h3>
                    <p>
                        123 Biga, Silang, Cavite
                    </p>
                    <p>
                        contact@barbershop.com
                        <br>
                        (+63) 912 324 5555
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>
                        Opening Hours
                    </h3>
                    <ul class="opening_time">
                        <li>Mon / Thurs 8:30am - 5:30pm</li>
                        <li>Tues / Fri 9:30am - 6:30pm</li>
                        <li>Wed / Sat 10:30am - 7:30pm</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer_widget">
                    <h3>
                        Visit us
                    </h3>
                    <ul class="opening_time">
                        <li>Crafting Confidence, One Cut at a Time – Welcome to Tholitez</li>
                        <li>Where Style Meets Precision</li>
                        <li> Every Cut, Every Time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FOOTER  -->

<?php include "Includes/templates/footer.php"; ?>