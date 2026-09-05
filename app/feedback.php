<?php
$pageTitle = "Feedback";

include "../layout/header.php";
include "../layout/navbar.php";
?>

<main class="page-container">

    <section class="form-section">

        <h1>Quick Feedback</h1>

        <p>
            We appreciate your feedback.
            Help us improve our service.
        </p>

        <form id="feedbackForm" method="POST">

            <!-- Form Type -->
            <input type="hidden" name="type" value="feedback">

            <!-- Full Name -->
            <div class="form-group">
                <label for="feedbackName">Full Name</label>

                <input
                    type="text"
                    id="feedbackName"
                    name="name"
                    placeholder="Enter your full name"
                    required
                >
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="feedbackEmail">Email Address</label>

                <input
                    type="email"
                    id="feedbackEmail"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <!-- Rating -->
            <div class="form-group">
                <label for="rating">Rating</label>

                <select id="rating" name="rating" required>

                    <option value="">
                        Select Rating
                    </option>

                    <option value="5">
                        ★★★★★ Excellent
                    </option>

                    <option value="4">
                        ★★★★ Very Good
                    </option>

                    <option value="3">
                        ★★★ Good
                    </option>

                    <option value="2">
                        ★★ Needs Improvement
                    </option>

                    <option value="1">
                        ★ Poor
                    </option>

                </select>
            </div>

            <!-- Feedback -->
            <div class="form-group">
                <label for="feedbackMessage">
                    Your Feedback
                </label>

                <textarea
                    id="feedbackMessage"
                    name="message"
                    rows="6"
                    placeholder="Write your feedback..."
                    required
                ></textarea>
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn">
                Submit Feedback
            </button>

            <button type="reset" class="btn secondary-btn">
                Reset
            </button>

            <!-- AJAX Result -->
            <div id="feedbackResult"></div>

        </form>

    </section>

</main>

<?php include "../layout/footer.php"; ?>