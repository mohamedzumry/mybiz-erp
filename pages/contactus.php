<?php
$pageTitle = "Contact Us | Clove Restaurant";
include("../header.php");
include("../dbconn.php");
?>
<?php include "../navs/main-nav.php" ?>

<h1>Contact Us</h1>
<p>Contact Number: <a href="tel:1234567890">(123) 456-7890</a></p>
<button class="call-btn">Call Now</button>
<div class="contact-details">
    <div class="social-media-icons">
        <div class="social-icon">
            <a href="https://www.instagram.com"><img src="../images/instaicon.jpg" alt="Instagram"></a>
            <h3>Find Us on Instagram</h3>
            <button class="go-button"><a href="https://www.instagram.com">Click Here</a></button>
        </div>
        <div class="social-icon">
            <a href="https://www.facebook.com"><img src="../images/istockphoto-facebookicon.jpg" alt="Facebook"></a>
            <h3>Find Us on Facebook</h3>
            <button class="go-button"><a href="https://www.facebook.com">Click Here</a></button>
        </div>
        <div class="social-icon">
            <a href="https://www.whatsapp.com"><img src="../images/istockphoto-whatsappicon.jpg" alt="WhatsApp"></a>
            <h3>Find Us on Whatsapp

            </h3>
            <button class="go-button"><a href="images/istockphoto-whatsappicon.jpgss">Click Here</a></button>
        </div>
    </div>
</div>
</div>
<section id="about">
    <div class="Aboutcont">
        <h2>About Us</h2>
        <p>Welcome to The Outer Clove, where culinary excellence meets warm hospitality. Our restaurant chain, spread across many cities in Sri Lanka, is dedicated to providing a delightful dining experience.</p>
        <p>At The Outer Clove, we take pride in our diverse menu, featuring exquisite dishes prepared with the finest ingredients. Whether you're here for a casual dine-in, a quick takeout, or a convenient delivery, our commitment to quality and flavor remains unwavering.</p>
        <p>Explore our promotions, discover our facilities, and savor the unique blend of tastes that define The Outer Clove. Thank you for choosing us, and we look forward to serving you with passion and excellence.</p>
    </div>
</section>

<?php
include("../footer.php");
?>