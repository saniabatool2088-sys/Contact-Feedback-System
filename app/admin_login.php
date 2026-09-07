<?php

session_start();

require_once "../config/database.php";

$pageTitle = "Admin Login";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {

        $error = "Please enter your email and password.";

    } else {

        $stmt = $conn->prepare(
            "SELECT id, email, password FROM admins WHERE email = ? LIMIT 1"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        // یہاں ہم نے سادہ پاسورڈ اور ہیش دونوں کا چیک لگا دیا ہے تاکہ لاگ ان میں کوئی مسئلہ نہ آئے
        if ($admin && ($password === $admin["password"] || password_verify($password, $admin["password"]))) {

            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_email"] = $admin["email"];

            header("Location: admin_dashboard.php");
            exit;

        } else {

            $error = "Invalid email or password.";
        }

        $stmt->close();
    }
}

include "../layout/header.php";
include "../layout/navbar.php";
?>

<main class="page-container">

    <section class="form-section login-section">

        <h1>Admin Login</h1>

        <p>Login to access the admin dashboard.</p>

        <?php if ($error !== ""): ?>

            <div class="info-message">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>

        <!-- یہاں autocomplete="off" کا اضافہ کر دیا ہے تاکہ براؤزر پرانا ڈیٹا خود نہ اٹھائے -->
        <form method="POST" action="" autocomplete="off">

            <div class="form-group">

                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter admin email"
                    autocomplete="off"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter admin password"
                    autocomplete="new-password"
                    required
                >

            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

    </section>

</main>

<?php include "../layout/footer.php"; ?>