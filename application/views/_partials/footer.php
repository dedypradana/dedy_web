<footer id="footer" class="color">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon">
                <span>Get in Touch</span>
            </div>
            <div class="col-md-5">
                <div class="newsletter">
                    <h4>Newsletter</h4>
                    <p>Keep up on our always evolving product features and technology.</p>

                    <div class="alert alert-success hidden" id="newsletterSuccess">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>

                    <div class="alert alert-danger hidden" id="newsletterError"></div>

                    <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                        <div class="input-group">
                            <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="contact-details">
                    <h4>Contact Us</h4>
                    <ul class="contact">
                        <li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> Jl. Dinoyo Permai 174 A, Malang, Jawa Timur</p></li>
                        <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> +62 857 2000 4220</p></li>
                        <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:dedy@pradana.net">dedy@pradana.net</a></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <ul class="social-icons">
                        <li class="facebook"><a href="<?php echo @$sosmed['facebook']?>" target="_blank" title="Facebook">Facebook</a></li>
                        <li class="instagram"><a href="<?php echo @$sosmed['instagram']?>" target="_blank" title="Instagram">Instagram</a></li>
                        <li class="linkedin"><a href="<?php echo @$sosmed['linkedin']?>" target="_blank" title="Linkedin">Linkedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p>© Copyright <?php echo date('Y'); ?> Dedy Pradana. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>