<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact & Feedback System</title>

    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

<header class="hero">
    <nav class="navbar">
        <div class="logo">Contact & Feedback</div>

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="app/contact.php">Contact</a>
            <a href="app/feedback.php">Feedback</a>
            <a href="app/login.php">Login</a>
            <button
    id="themeToggle"
    type="button"
    aria-label="Toggle theme"
    onclick="document.body.classList.toggle('dark-mode'); this.textContent = document.body.classList.contains('dark-mode') ? '☀️' : '🌙';"
>
    🌙
</button>
        </div>
    </nav>

    <div class="hero-content">
        <h1>Help & Feedback</h1>

        <p>
            We value your feedback. Contact us or share your
            experience through our feedback form.
        </p>

        <div class="hero-buttons">
            <a href="app/contact.php" class="btn">Contact Us</a>
            <a href="app/feedback.php" class="btn secondary-btn">
                Give Feedback
            </a>
        </div>
    </div>
</header>

<main>

    <section class="features">
        <h2>How Can We Help?</h2>

        <div class="feature-container">

            <div class="feature-card">
                <h3>📩 Contact</h3>
                <p>
                    Send us your questions, suggestions or complaints
                    through the contact form.
                </p>
            </div>

            <div class="feature-card">
                <h3>⭐ Feedback</h3>
                <p>
                    Share your experience and help us improve our service.
                </p>
            </div>

            <div class="feature-card">
                <h3>🔒 Secure</h3>
                <p>
                    Your submitted information is handled securely
                    through PHP and database protection.
                </p>
            </div>

        </div>
    </section>

</main>

<footer>
    <p>© 2026 Contact & Feedback System</p>
</footer>

<script src="asset/js/script.js"></script>

</body>
</html>