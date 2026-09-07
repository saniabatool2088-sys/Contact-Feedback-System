<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// پاتھ کو درست کرنے کے لیے براہ راست فولڈر کا صحیح راستہ دیا گیا ہے
require_once __DIR__ . '/../config/database.php';

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

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();

            if ($admin && ($password === $admin["password"] || password_verify($password, $admin["password"]))) {
                $_SESSION["admin_id"] = $admin["id"];
                $_SESSION["admin_email"] = $admin["email"];

                header("Location: admin_dashboard.php");
                exit;
            } else {
                $error = "Invalid email or password.";
            }

            $stmt->close();
        } else {
            $error = "Database query preparation failed.";
        }
    }
}

// ہیڈر اور نیو بار کو شامل کرنے کا درست طریقہ
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
?>

<main class="page-container">
    <section class="form-section login-section">
        <h1>Admin Login</h1>
        <p>Login to access the admin dashboard.</p>

        <?php if ($error !== ""): ?>
            <div class="info-message" style="color: red; margin-bottom: 15px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

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

<?php include __DIR__ . '/../layout/footer.php'; ?>