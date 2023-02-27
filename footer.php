<footer>
    <div class="footer-container">
        <div class="footer-info">
            <div class="left-info">
                <div class="footer-logo">
                    <a href="<?php echo WEB_URL; ?>">
                        <img src="<?php echo IMAGES_PATH; ?>logo.png" width="400" height="120"/>
                    </a>
                </div>
                <p class="footer-para">The Quick and Easy Contact Form goes directly to an attended mailbox. 
                Safety and fire strives to always be an asset to all our clients. 
                We would like to thank you for your enquiry and continuous support.</p>
            </div>
            <div class="right-info">
                <h2>We would love to hear from you!</h2>
                <div class="contact-info">
                    <form action="" name="ContactForm" id="ContactForm" method="post">
                        <input type="hidden" name="ContactFormFlag" id="ContactFormFlag" />
                        <div class="input-box">
                            <input type="text"  name="Name" id="Name" required="required" />
                            <span>Your Name</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="Email" id="Email" required="required" />
                            <span>Email Address</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="Phone" id="Phone" required="required" />
                            <span>Phone Number</span>
                        </div>
                        <div class="input-box">
                            <textarea  name="Message" id="Message"  required="required"></textarea>
                            <span>Type Message</span>
                        </div>
                        <div class="input-box">
                            <input  type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Copyrith Info -->
        <div class="copyright-info">
            <div class="copyright-text">Copyright &copy; 2023 Safety and Fire. All Rights Reserved.</div>
            <div class="compnay-details">
                <a href="https://precisecodes.com/" title="Precise Codes" target="_blank">Web Design by Precise Codes</a>
            </div>
        </div>
    </div>
</footer>
<div class="notification">You are already subscribed with us!</div>