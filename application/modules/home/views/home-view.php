<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Jan Swasthya Kendra</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="<?php echo base_url(); ?>resource/images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="<?php echo base_url(); ?>resource/images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="<?php echo base_url(); ?>resource/js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
   </head>
   <body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="<?php echo base_url(); ?>resource/images/loaders/heart-loading2.gif" alt="">
      </div>
      <!-- END LOADER -->
      <header>
         <div class="header-top wow fadeIn">
            <div class="container">
               <a class="navbar-brand" href="<?php echo site_url(''); ?>"><img src="<?php echo base_url(); ?>resource/images/logo.png" alt="image"></a>
               <div class="right-header">
                  <div class="header-info">
                     <div class="info-inner">
                        <span class="icontop"><img src="<?php echo base_url(); ?>resource/images/phone-icon.png" alt="#"></span>
                        <span class="iconcont"><a href="tel:+918929100605">+91-89291-00605</a></span>
                        
                     </div>
                     <!-- <div class="info-inner">
                        <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="mailto:info@yoursite.com">info@Lifecare.com</a></span>  
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom wow fadeIn">
            <div class="container">
               <nav class="main-menu">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  </div>
                  
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a class="active" href="index.html">Home</a></li>
                        <!-- <li><a data-scroll href="#about">About us</a></li> -->
                        <li><a data-scroll href="#service">Services</a></li>
                        <li><a data-scroll href="#doctors">Doctors</a></li>
                        <!-- <li><a data-scroll href="#price">Price</a></li> -->
                        <!-- <li><a data-scroll href="#testimonials">Testimonials</a></li> -->
                  <li><a data-scroll href="#testimonials">Facilities</a></li>
                   <li><a  href="<?php echo site_url('auth');   ?>">Login</a></li>
                        <!-- <li><a data-scroll href="#getintouch">Contact</a></li> -->
                     </ul>
                  </div>
               </nav>
               <div class="serch-bar">
                  <div id="custom-search-input">
                     <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Search" />
                        <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('<?php echo base_url(); ?>resource/images/slider-bg.png');">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="text-contant">
                     <h2>
                        <span class="center"><span class="icon"><img src="<?php echo base_url(); ?>resource/images/icon-logo.png" alt="#" /></span></span>
                        <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome to Jan Swasthya Kendra", "We Care Your Health", "We are Expert!" ]'>
                        <span class="wrap"></span>
                        </a>
                     </h2>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end section -->
      <div id="time-table" class="time-table-section">
         <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time one" style="background:#2895f1;">
                     <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                     <h3>Hassle free set up</h3>
                     <p>Everything you need will reach you in time</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time middle" style="background:#0071d1;">
                     <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span> 
                     <h3>Open Your Digital Medical Clinic Today</h3>
                     <p>Get all training and certification required.
                        Get all required training and certification online</p>
                     <div class="time-table-section">
                        <!-- <ul>
                           <li><span class="left">Monday - Friday</span><span class="right">8.00 – 18.00</span></li>
                           <li><span class="left">Saturday</span><span class="right">8.00 – 16.00</span></li>
                           <li><span class="left">Sunday</span><span class="right">8.00 – 13.00</span></li>
                        </ul> -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time three" style="background:#0060b1;">
                     <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                     <h3>Guided by the experts</h3>
                     <p>Experienced doctors at your Consultation</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <span class="icon-logo"><img src="<?php echo base_url(); ?>resource/images/icon-logo.png" alt="#"></span>
               <h2>Our facilities</h2>
            </div>
            <!-- end title -->
            <div class="row">
               <div class="col-md-6">
                  <div class="message-box">
                     
                     <h2>Legal Certificate</h2>
                     <h4>Become a valid practitioner</h4><br>

                     <h2>Call Us</h2>
                     <h4>Need assistance talk to us anytime</h4><br>

                     <h2>Online Course</h2>
                     <h4>No need to attend college</h4><br>

                     <h2>Pharmacy</h2>
                     <h4>We provide you with the medicines and equipments</h4><br>
                     <!-- <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Learn More</a> -->
                  </div>
                  <!-- end messagebox -->
               </div>
               <!-- end col -->
               <div class="col-md-6">
                  <div class="post-media wow fadeIn">
                     <img src="<?php echo base_url(); ?>resource/images/img-1.jpeg" alt="" class="img-responsive">
                     <!-- <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a> -->
                  </div>
                  <!-- end media -->
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
            <hr class="hr1">
            <div class="row">
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="<?php echo base_url(); ?>resource/images/facility-1.jpeg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="<?php echo base_url(); ?>resource/images/facility-1.jpeg" alt="" class="img-responsive">
                     </div>
                     <h3>Digital Control Center</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="<?php echo base_url(); ?>resource/images/facility-2.jpeg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="<?php echo base_url(); ?>resource/images/facility-2.jpeg" alt="" class="img-responsive">
                     </div>
                     <h3>Hygienic Operating Room</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="<?php echo base_url(); ?>resource/images/facility-3.jpeg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="<?php echo base_url(); ?>resource/images/facility-3.jpeg" alt="" class="img-responsive">
                     </div>
                     <h3>Specialist Physicians</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="<?php echo base_url(); ?>resource/images/facility-4.jpeg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="<?php echo base_url(); ?>resource/images/facility-4.jpeg" alt="" class="img-responsive">
                     </div>
                     <h3>Digital Control Center</h3>
                  </div>
                  <!-- end service -->
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <div id="service" class="services wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                  <div class="inner-services">
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="<?php echo base_url(); ?>resource/images/service-icon1.png" alt="#" /></span>
                           <h4>Limited seats available</h4>
                           <p>You clinic is just a click away</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="<?php echo base_url(); ?>resource/images/service-icon2.png" alt="#" /></span>
                           <h4>Get professional assistance</h4>
                           <p>Talk to our professionals and understand the importance of telemedicine</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="<?php echo base_url(); ?>resource/images/service-icon3.png" alt="#" /></span>
                           <h4>Everything at your doorstep</h4>
                           <p>No need to worry about anything you will get everything you neeed at your doorstep.</p>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="appointment-form">
                     <h3><span>+</span> Book Appointment</h3>
                     <div class="form">
                        <form action="index.html">
                           <fieldset>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="text" id="name" placeholder="Your Name"  />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="text" id="father-name" placeholder="Father's Name"  />
                                    </div>
                                 </div>
                              </div>


                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="text" id="mother-name" placeholder="Mother's Name"  />
                                    </div>
                                 </div>
                              </div>


                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="email" placeholder="Email Address" id="email" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="phone" placeholder="Mobile Nunmber" id="mobile-number" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="phone" placeholder="Village" id="village" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="phone" placeholder="Tehsil" id="tehsil" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="phone" placeholder="District" id="district" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="text" placeholder="Address" id="address" />
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="phone" placeholder="Pincode" id="pincode" />
                                    </div>
                                 </div>
                              </div>

                                    <div class="form-group">
                                       <select class="form-control">
                                          <option>Professional Qualification</option>
                                          <option>Sunday</option>
                                          <option>Monday</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <!-- <select class="form-control" type="data">
                                          <option>Time</option>
                                          <option>AM</option>
                                          <option>PM</option>
                                       </select> -->
                                       <input type="date" placeholder="Passing Year" id="passing-year" />
                                    </div>
                                 

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="text" placeholder="Board" id="board" />
                                    </div>
                                 </div>
                              </div>
                     
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <div class="center"><button type="submit">Submit</button></div>
                                    </div>
                                 </div>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      
      <!-- doctor -->
      
      <div id="doctors" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;" data-scroll-id="doctors" tabindex="-1">
        <div class="container">
        
        <div class="heading">
               <span class="icon-logo"><img src="<?php echo base_url(); ?>resource/images/icon-logo.png" alt="#"></span>
               <h2>Our Doctors</h2>
            </div>

            <div class="row dev-list text-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn;">
                    <div class="widget clearfix">
                        <img src="<?php echo base_url(); ?>resource/images/ceo.jpeg" alt="" class="img-responsive img-rounded">
                        <div class="widget-title">
                            <h3>Vaibhav Saxena</h3>
                            <small>CEO</small>
                        </div>
                        <!-- end title -->
                     
                        <!-- <div class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div> -->
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeIn;">
                    <div class="widget clearfix">
                        <img src="<?php echo base_url(); ?>resource/images/doctor-1.png" alt="" class="img-responsive img-rounded">
                        <div class="widget-title">
                            <h3>Dr. Vaibhav Shree</h3>
                            <small>MBBS (Program Director)</small>
                        </div>
                        <!-- end title -->
                        <!-- <p>Hello guys, I am Soren from Sirbistana. I am senior art director and founder of Violetta.</p>

                        <div class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div> -->
                    </div><!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn">
                    <div class="widget clearfix">
                        <img src="<?php echo base_url(); ?>resource/images/doctor-2.png" alt="" class="img-responsive img-rounded">
                        <div class="widget-title">
                            <h3>Dr. Nitin Singh</h3>
                            <small>MBBS, MS (Program Cordinatior)</small>
                        </div>
                        <!-- end title -->
                        <!-- <p>Hello guys, I am Soren from Sirbistana. I am senior art director and founder of Violetta.</p>

                        <div class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div> -->
                    </div><!--widget -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div>
      
      
      
      <!-- end doctor section -->
      
      <div id="testimonials" class="section wb wow fadeIn">
         <div class="container">
            <div class="heading">
               <span class="icon-logo"><img src="<?php echo base_url(); ?>resource/images/icon-logo.png" alt="#"></span>
               <h2>Our Partners</h2>
            </div>
            <!-- end title -->
            <div class="row">
               <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <img src="<?php echo base_url(); ?>resource/images/partner-1.jpeg" alt="" class="img-responsive">
                <!-- end testimonial -->
               </div>

               <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <img src="<?php echo base_url(); ?>resource/images/partner-2.jpeg" alt="" class="img-responsive">
                <!-- end testimonial -->
               </div>

               <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <img src="<?php echo base_url(); ?>resource/images/partner-3.jpeg" alt="" class="img-responsive">
                <!-- end testimonial -->
               </div>

               <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <img src="<?php echo base_url(); ?>resource/images/partner-4.jpeg" alt="" class="img-responsive">
                <!-- end testimonial -->
               </div>
               <!-- end col -->
               <!-- end col -->
            </div>
            <!-- end row -->
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end section -->
      <div id="getintouch" class="section wb wow fadeIn" style="padding-bottom:0;">
         <div class="container">
            <div class="heading">
               <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
               <h2>Get in Touch</h2>
            </div>
         </div>
         <div class="contact-section">
            <div class="form-contant">
               <form id="ajax-contact" action="assets/mailer.php" method="post">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group in_name">
                           <input type="text" class="form-control" placeholder="Name" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="email" class="form-control" placeholder="E-mail" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="tel" class="form-control" id="phone" placeholder="Phone" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="text" class="form-control" id="subject" placeholder="Subject" required="required">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group in_message"> 
                           <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required"></textarea>
                        </div>
                        <div class="actions">
                           <input type="submit" value="Send Message" name="submit" id="submitButton" class="btn small" title="Submit Your Message!">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div id="googleMap" style="width:100%;height:450px;"></div>
         </div>
      </div>
      <footer id="footer" class="footer-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="logo padding">
                     <a href=""><img src="<?php echo base_url(); ?>resource/images/logo.png" alt=""></a>
                     <p>Locavore pork belly scen ester pine est chill wave microdosing pop uple itarian cliche artisan.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="footer-info padding">
                     <h3>CONTACT US</h3>
                     <p><i class="fa fa-map-marker" aria-hidden="true"></i> PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                     <p><i class="fa fa-paper-plane" aria-hidden="true"></i> info@gmail.com</p>
                     <p><i class="fa fa-phone" aria-hidden="true"></i> (+1) 800 123 456</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="subcriber-info">
                     <h3>SUBSCRIBE</h3>
                     <p>Get healthy news, tip and solutions to your problems from our experts.</p>
                     <div class="subcriber-box">
                        <form id="mc-form" class="mc-form">
                           <div class="newsletter-form">
                              <input type="email" autocomplete="off" id="mc-email" placeholder="Email address" class="form-control" name="EMAIL">
                              <button class="mc-submit" type="submit"><i class="fa fa-paper-plane"></i></button> 
                              <div class="clearfix"></div>
                              <!-- mailchimp-alerts Start -->
                              <div class="mailchimp-alerts">
                                 <div class="mailchimp-submitting"></div>
                                 <!-- mailchimp-submitting end -->
                                 <div class="mailchimp-success"></div>
                                 <!-- mailchimp-success end -->
                                 <div class="mailchimp-error"></div>
                                 <!-- mailchimp-error end -->
                              </div>
                              <!-- mailchimp-alerts end -->
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="copyright-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="footer-text">
                     <p>© 2021 Jan Swasthya Kendra. All Rights Reserved.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="social">
                     <ul class="social-links">
                        <li><a href=""><i class="fa fa-rss"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end copyrights -->
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- all js files -->
      <script src="<?php echo base_url(); ?>resource/js/all.js"></script>
      <!-- all plugins -->
      <script src="<?php echo base_url(); ?>resource/js/custom.js"></script>
      <!-- map -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>
   </body>
</html>
