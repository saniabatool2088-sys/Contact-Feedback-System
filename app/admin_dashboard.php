<?php

session_start();

require_once "../config/database.php";

/* Protect Dashboard */
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit;
}

$pageTitle = "Admin Dashboard";

/* =========================
   CONTACT RECORDS
========================= */

$contactQuery = $conn->query(
    "SELECT id, name, email, phone, subject, message
     FROM contacts
     ORDER BY id DESC"
);

$contacts = [];

if ($contactQuery) {
    while ($row = $contactQuery->fetch_assoc()) {
        $contacts[] = $row;
    }
}


/* =========================
   FEEDBACK RECORDS
========================= */

$feedbackQuery = $conn->query(
    "SELECT id, name, email, rating, message
     FROM feedback
     ORDER BY id DESC"
);

$feedbacks = [];

if ($feedbackQuery) {
    while ($row = $feedbackQuery->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}

?>

<?php include "../layout/header.php"; ?>
<?php include "../layout/navbar.php"; ?>

<main class="page-container">

    <section class="form-section">

        <h1>Admin Dashboard</h1>

        <p>
            Welcome, Admin.
            Here you can view Contact Us messages and Feedback.
        </p>

        <a href="logout.php" class="btn">
            Logout
        </a>

    </section>


    <!-- =========================
         CONTACT MESSAGES
    ========================== -->

    <section class="form-section">

        <h2>Contact Us Messages</h2>

        <?php if (empty($contacts)): ?>

            <p>No contact messages found.</p>

        <?php else: ?>

            <div style="overflow-x:auto;">

                <table border="1" cellpadding="10" cellspacing="0" width="100%">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($contacts as $contact): ?>

                            <tr>

                                <td>
                                    <?= (int)$contact["id"] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($contact["name"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($contact["email"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($contact["phone"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($contact["subject"]) ?>
                                </td>

                                <td>
                                    <?= nl2br(
                                        htmlspecialchars($contact["message"])
                                    ) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>

    </section>


    <!-- =========================
         FEEDBACK
    ========================== -->

    <section class="form-section">

        <h2>Feedback</h2>

        <?php if (empty($feedbacks)): ?>

            <p>No feedback found.</p>

        <?php else: ?>

            <div style="overflow-x:auto;">

                <table border="1" cellpadding="10" cellspacing="0" width="100%">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Feedback</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($feedbacks as $feedback): ?>

                            <tr>

                                <td>
                                    <?= (int)$feedback["id"] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($feedback["name"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($feedback["email"]) ?>
                                </td>

                                <td>
                                    <?= (int)$feedback["rating"] ?>/5
                                </td>

                                <td>
                                    <?= nl2br(
                                        htmlspecialchars($feedback["message"])
                                    ) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>

    </section>

</main>

<?php include "../layout/footer.php"; ?>