<!-- START NAVBAR SECTION -->
<?php
    include "connect.php";
    include_once "Includes/functions/functions.php";
?>
<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar">
            <a href="./#home-section" class="navbar-brand">
                <img src="Design/images/barbershop_logo.png" alt="Barbershop Logo">
            </a>
            <div class="d-flex menu-wrap align-items-center main-menu-container">
                <div class="mainmenu" id="mainmenu">
                    <ul class="nav">
                        <li><a href="./#home-section" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Home');">HOME</a></li>
                        <li><a href="./#about" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed About');">ABOUT</a></li>
                        <li><a href="./#services" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Services');">SERVICES</a></li>
                        <li><a href="./#gallery" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Gallery');">GALLERY</a></li>
                        <li><a href="./#pricing" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Pricing');">PRICING</a></li>
                        <li><a href="./#contact-us" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Contact');">CONTACT</a></li>
                    </ul>
                </div>
                <div class="header-btn" style="margin-left: 10px">
                    <a href="appointment.php" class="menu-btn">Make Appointment</a>
                    <a href="logout.php" class="menu-btn">Logout</a>
                </div>
            </div>
            <a class="mob-menu-toggle">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </div>
</header>

<div class="header-height" style="height: 80px;"></div>

<!-- END NAVBAR SECTION -->

<!-- START MOBILE NAVBAR -->

<div id="menu_mobile" class="menu-mobile-menu-container">
    <ul class="mob-menu-top">
        <li class="menu-header">
            <a href="#">MENU</a>
        </li>
        <li style="display: inline-block;">
            <a class="mob-close-toggle" style="cursor: pointer;width: 75px;">
                <i class="fas fa-times" style="color: white;"></i>
            </a>
        </li>
    </ul>
    <div class="menu-tab-div">
        <ul id="mobile-menu" class="menu">
            <li>
                <a href="index.php#home-section" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Home Mobile');">
                    HOME
                </a>
            </li>
            <li>
                <a href="index.php#about" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed About Mobile');">
                    About Us
                </a>
            </li>
            <li>
                <a href="index.php#services" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Services Mobile');">
                    Services
                </a>
            </li>
            <li>
                <a href="appointment.php" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Tried Creating Appointment Mobile');">
                    Book Now
                </a>
            </li>
            <li>
                <a href="index.php#gallery" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Gallery Mobile');">
                    GALLERY
                </a>
            </li>
            <li>
                <a href="index.php#pricing" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Pricing Mobile');">
                    PRICING
                </a>
            </li>
            <li>
                <a href="index.php#contact-us" class="a-mob-menu" onclick="logUserActivity(<?php echo $_SESSION['user_id']; ?>, 'Viewed Contact Mobile');">
                    Contact US
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- END NAVBAR MOBILE -->
