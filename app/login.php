<?php
session_start();

$pageTitle = "Login";
include "../layout/header.php";
include "../layout/navbar.php";
?>

<main class="page-container">

    <section class="form-section login-section">

        <h1>Login</h1>
        <p>Login to access the system.</p>

        <form method="POST" action="">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

        <?php if (isset($_POST["email"])): ?>

            <div class="info-message">
                Login system will be connected to the database
                in the backend setup.
            </div>

        <?php endif; ?>

    </section>

</main>

<?php include "../layout/footer.php"; ?>