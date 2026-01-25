<?php 
    #PHP INCLUDES
    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";
?>

<!-- Home Section -->
<section class = "home_section">
    <div class="section-header">
        <div class="section-title" style = "font-size:60px; color:white">
            Drive Your Dream Car Today
        </div>					 -->
	</div>
</section>

<!-- Our Services Section -->
<section class = "our-services" id = "services">
    <div class = "container">
        <div class="section-header">
            <div class="section-title">
                Services we offer to our clients
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-user"></i>
                        </span>
                        Expert Technicians
                    </h4>
                    <p>
                        Our team of technicians ensures every vehicle is maintained to the highest standards for safety and performance.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-certificate"></i>
                        </span>
                        Professional Service
                    </h4>
                    <p>
                        We provide efficient and reliable service to make every booking simple and hassle-free.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        Great Support
                    </h4>
                    <p>
                        Our support staff is ready to help you with questions or assistance anytime you need.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-rocket"></i>
                        </span>
                        Technical Skills
                    </h4>
                    <p>
                        We leverage the latest technology to manage bookings, track vehicles, and ensure smooth operations.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-gem"></i>
                        </span>
                        Highly Recomended
                    </h4>
                    <p>
                        Our clients consistently recommend our service for reliability, quality, and professionalism.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-comments"></i>
                        </span>
                        Positive Reviews
                    </h4>
                    <p>
                        Customers praise our attentive service, comfortable rides, and prompt assistance every time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Area Section -->
<section class = "about-area">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-6 left-area" style = "padding:0px">
                <img src="Design/images/about-img.jpg" alt="Car Rental Image">
            </div>
            <div class = "col-md-6 right-area" style = "padding:50px">
                <h1>
                    Connecting You <br>
                    with the Perfect Ride
                </h1>
                <p>
                    <span>
                        We listen to your needs and deliver exceptional service every time
                    </span>
                </p>
                <p>
                    Our platform offers a seamless car rental experience, ensuring comfort, reliability, and convenience for every journey.
                    With a wide range of vehicles and professional support, we make booking easy and travel enjoyable, whether it’s for business or leisure.
                </p>
                <a class="my-btn bttn" href="#">get details</a>
            </div>
        </div>
    </div>
</section>

<!-- Our Brands Section -->
<section class = "our-brands" id = "brands">
    <div class = "container">
        <div class="section-header">
            <div class="section-title">
                Premium Car & Limousine Rentals
            </div>
            <!-- <hr class="separator">
            <div class="section-tagline">
                We offer professional car rental & limousine services in our range of high-end vehicles
            </div> -->
        </div>
        <div class = "car-brands">
            <div class = "row">
            <?php

                $stmt = $con->prepare("Select * from car_brands");
                $stmt->execute();
                $car_brands = $stmt->fetchAll();

                foreach($car_brands as $car_brand)
                {
                    $car_brand_img = "admin/Uploads/images/".$car_brand['brand_image'];
                    ?>
                    <div class = "col-md-4">
                        <div class = "car-brand" style = "background-image: url(<?php echo $car_brand_img ?>);">
                            <div class = "brand_name">
                                <h3>
                                    <?php echo $car_brand['brand_name']; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }

            ?>
            </div>
        </div>
    </div>
</section>

<!-- CAR RESERVATION SECTION -->
<section class="reservation_section" style = "padding:50px 0px" id = "reserve">
	<div class="container">
		<div class = "row">
			<div class = "col-md-5"></div>
			<div class = "col-md-7">
				<form method="POST" action = "reserve.php" class = "car-reservation-form" id = "reservation_form" v-on:submit = "checkForm">
					<div class="text_header">
						<span>
							Find your car
						</span>
					</div>
					<div>
						<div class = "form-group">
							<label for="pickup_location">Pickup Location</label>
							<input type = "text" class = "form-control" name = "pickup_location" placeholder = "Bahir Dar" v-model = 'pickup_location'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_location === null">
								Pickup location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_location">Return Location</label>
							<input type = "text" class = "form-control" name = "return_location" placeholder = "Bahir Dar" v-model = 'return_location'>
							<div class="invalid-feedback" style = "display:block" v-if="return_location === null">
								Return location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="pickup_date">Pickup Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+1 day"))?>" name = "pickup_date" class = "form-control" v-model = 'pickup_date'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_date === null">
								Pickup date is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_date">Return Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+2 day"))?>" name = "return_date"  class = "form-control" v-model = 'return_date'>
							<div class="invalid-feedback" style = "display:block" v-if="return_date === null">
								Return date is required
							</div>
						</div>
						<!-- Submit Button -->
						<button type="submit" class="btn sbmt-bttn" name = "reserve_car">Book Instantly</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- CONTACT SECTION -->

<!-- <section class="contact-section" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding">
                <div class="contact-info">
                    <h2>
                        Drop us a note &  
                        <br>get a reply today!
                    </h2>
                    <p>
                        Getting dressed up and traveling with good friends makes for a shared, unforgettable experience.
                    </p>
                    <h3>
                        Bahir dar Ethiopia, kebele 04 
                        
                    </h3>
                    <ul>
                        <li>
                            <span style = "font-weight: bold">Email:</span> 
                            carvo@gamil.com
                        </li>
                        <li>
                            <span style = "font-weight: bold">Phone:</span> 
                            +251926541002
                        </li>
                    </ul>
                </div>
            </div>
            <form id="contact_ajax_form" class="contactForm" method="post" action="">
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
            <textarea id="contact_message" name="message" cols="30" rows="5"
                class="form-control message" placeholder="Message"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <button type="submit" id="contact_send" class="contact_send_btn">
                Send Message
            </button>
        </div>
    </div>
</section> -->

<!-- Footer Section -->
<section class="widget_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <a class="navbar-brand" href="">
                        Car<span style = "color:#fe5b3d">Vo</span>&nbsp;CarRental
                    </a>
                    <p>
                        Getting dressed up and traveling with good friends makes for a shared, unforgettable experience.
                    </p>
                    <ul class="widget_social">
                        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Google+"><i class="fab fa-google-plus-g fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <h3>Contact Info</h3>
                    <ul class = "contact_info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>Bahir dar Ethiopia, Kebele 04
                        </li>
                        <li>
                            <i class="far fa-envelope"></i>CarVo@gmail.com
                        </li>
                        <li>
                            <i class="fas fa-mobile-alt"></i>+251926541002
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <h3>Why Choose CarVo</h3>
                    <ul class="contact_info">
                        <li><i class="fas fa-check"></i> Affordable rental prices</li>
                        <li><i class="fas fa-check"></i> Clean & reliable vehicles</li>
                        <li><i class="fas fa-check"></i> Fast and easy booking</li>
                        <li><i class="fas fa-check"></i> 24/7 customer support</li>
                        <li>
                            <i class="fas fa-check"></i> Trusted local service</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOTTOM FOOTER -->
<?php include "Includes/templates/footer.php"; ?>



<script>

new Vue({
    el: "#reservation_form",
    data: {
        pickup_location: '',
        return_location: '',
        pickup_date: '',
		return_date: ''
    },
    methods:{
        checkForm: function(event){
            if( this.pickup_location && this.return_location && this.pickup_date && this.return_date)
            {
                return true;
            }
            
            if (!this.pickup_location)
            {
                this.pickup_location = null;
            }

            if (!this.return_location)
            {
                this.return_location = null;
            }

            if (!this.pickup_date)
            {
                this.pickup_date = null;
            }

			if (!this.return_date)
            {
                this.return_date = null;
            }
            
            event.preventDefault();
        },
    }
})


</script>