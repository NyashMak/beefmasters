@extends('shop_front.layouts.app')
@section('body')       
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">Contact us</h4>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->

		<!-- Contact Us Section Start Here -->
        <div class="contact-section padding-tb bg-ash">
            <div class="container">
                <div class="contac-top">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="icofont-google-map"></i>
                                </div>
                                <div class="contact-details">
                                    <p>54 Gie Road, Table View, Cape Town, South Africa.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="icofont-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <p>+27 74 261 1327</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="icofont-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <p>info@beefmasters.com, sales@beefmasters.com, support@beefmasters.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contac-bottom">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-12">
                            <div class="location-map">
                                <div id="map">
									
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.632271880974!2d18.51675331519664!3d-33.82180158066926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc5f33a4fdff6b%3A0x74ee1629945948d4!2s54%20Gie%20Rd%2C%20West%20Riding%2C%20Cape%20Town%2C%207441%2C%20South%20Africa!5e0!3m2!1sen!2szw!4v1662545858126!5m2!1sen!2szw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="contact-form">
                                <form action="#" method="POST" id="commentform" class="comment-form">
                                    <input type="text" name="name" class="" placeholder="Name*">
                                    <input type="email" name="email" class="" placeholder="Email*">
                                    <input type="text" name="subject" class="" placeholder="Subject*">
                                    <textarea name="text" id="role" cols="30" rows="10" placeholder="Message*"></textarea>
                                    <button type="submit" class="lab-btn">
                                        <span>Submit Now</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Section ENding Here -->
@endsection