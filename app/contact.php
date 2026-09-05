<?php
$pageTitle = "Contact Us";

include "../layout/header.php";
include "../layout/navbar.php";
?>

<main class="page-container">

    <section class="form-section">

        <h1>Contact Us</h1>

        <p>
            Have a question, suggestion, or complaint?
            Send us a message.
        </p>

        <form id="contactForm" method="POST">

            <!-- Form Type -->
            <input type="hidden" name="type" value="contact">

            <!-- Full Name -->
            <div class="form-group">
                <label for="name">Full Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your full name"
                    required
                >
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone Number</label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone number"
                >
            </div>

            <!-- Subject -->
            <div class="form-group">
                <label for="subject">Subject</label>

                <input
                    type="text"
                    id="subject"
                    name="subject"
                    placeholder="Enter subject"
                    required
                >
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="message">Message</label>

                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    placeholder="Write your message..."
                    required
                ></textarea>
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn">
                Send Message
            </button>

            <button type="reset" class="btn secondary-btn">
                Reset
            </button>

            <!-- AJAX Result -->
            <div id="contactMessage"></div>

        </form>

    </section>

</main>

<?php include "../layout/footer.php"; ?>