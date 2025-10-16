<section>
    <h1>Contact Us</h1>
    <div class="contact-grid">
        <div class="contact-form glass">
            <form method="post" action="<?php echo BASE_URL; ?>/?page=contact">
                <label>Name</label>
                <input name="name" required>
                <label>Email</label>
                <input name="email" type="email" required>
                <label>Message</label>
                <textarea name="message" required></textarea>
                <button class="btn">Send</button>
            </form>
        </div>
        <div class="contact-info glass">
            <h3>Visit Us</h3>
            <p>Address: Dhaka, Bangladesh</p>
            <p>Phone: +8801XXXXXXXXX</p>
            <p>Email: admin@techlink.com</p>
            <p><a href="https://wa.me/8801XXXXXXXXX" target="_blank">Chat on WhatsApp</a></p>
            <h3>Map</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>