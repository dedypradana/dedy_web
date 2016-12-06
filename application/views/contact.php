<div id="googlemaps" class="google-map"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->session->flashdata('flash_data'); ?>
            <h2 class="short"><strong>Contact</strong></h2>
            <form id="contactForm" action="<?php echo base_url('contact/contact_us');?>" method="POST">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Your name *</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label>Your email address *</label>
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Subject</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Message *</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h4 class="push-top">Get in <strong>touch</strong></h4>
            <p>I would be delighted to get in touch with you and your organization. Just contact me even for just say hi or want to discuss about your project or your idea. I hope it worth your time. </p>
            <hr />
            <h4>The <strong>Office</strong></h4>
            <ul class="list-unstyled">
                <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> Jl. Dinoyo Permai 174 A, Malang, Jawa Timur</li>
                <li><i class="fa fa-phone"></i> <strong>Phone:</strong> +62 857 2000 4220</li>
                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:dedy@pradana.net">dedy@pradana.net</a></li>
            </ul>
            <hr />
        </div>
    </div>
</div>
<script>
    function initMap() {
        var myLatLng = {lat: -7.938362, lng: 112.610043};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('googlemaps'), {
            center: myLatLng,
            scrollwheel: false,
            zoom: 16
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'Dedy Pradana'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClXMPBg0Q1N_aRI_oig8gxU8FRo8WyGmM&callback=initMap" async defer></script>