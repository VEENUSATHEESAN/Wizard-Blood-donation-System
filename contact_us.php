
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
    <h2>Contact Us</h2>
    <div class="contact-form-container">
        <form method="POST" action="contact_form.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="message">Message:</label>
            <textarea name="message" required></textarea><br>

            <button type="submit" name="submit">Send Message</button>
        </form>
    </div>

    <div class="contact-info">
        <h3>Contact Information</h3>
        <p><strong>Phone:</strong> +123 456 7890</p>
        <p><strong>Email:</strong> admin@blooddonation.org</p>
        <p><strong>Address:</strong> 123 Blood Donation Street, City, Country</p>
    </div>

    <div class="map-container">
        <h3>Our Location</h3>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434176074!2d144.95373521560207!3d-37.81720957975121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43fb6c17fb%3A0xc1b3b15a87f6d23!2sBlood%20Donation%20Center!5e0!3m2!1sen!2s!4v1663074075268!5m2!1sen!2s"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
</body>
</html>
