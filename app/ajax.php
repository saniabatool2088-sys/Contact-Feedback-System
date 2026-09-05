<?php

header("Content-Type: application/json");

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request."
    ]);
    exit;
}

$type = $_POST["type"] ?? "";

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $message === "") {
    echo json_encode([
        "success" => false,
        "message" => "Please fill in all required fields."
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "success" => false,
        "message" => "Please enter a valid email address."
    ]);
    exit;
}


/* ================================
   CONTACT FORM
================================ */

if ($type === "contact") {

    $phone = trim($_POST["phone"] ?? "");
    $subject = trim($_POST["subject"] ?? "");

    if ($subject === "") {
        echo json_encode([
            "success" => false,
            "message" => "Please enter a subject."
        ]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO contacts (name, email, phone, subject, message)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sssss",
        $name,
        $email,
        $phone,
        $subject,
        $message
    );

    if ($stmt->execute()) {
        echo json_encode([
            "success" => true,
            "message" => "Your message has been submitted successfully."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Unable to submit your message."
        ]);
    }

    $stmt->close();
    exit;
}


/* ================================
   FEEDBACK FORM
================================ */

if ($type === "feedback") {

    $rating = intval($_POST["rating"] ?? 0);

    if ($rating < 1 || $rating > 5) {
        echo json_encode([
            "success" => false,
            "message" => "Please select a valid rating."
        ]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO feedback (name, email, rating, message)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssis",
        $name,
        $email,
        $rating,
        $message
    );

    if ($stmt->execute()) {
        echo json_encode([
            "success" => true,
            "message" => "Thank you! Your feedback has been submitted successfully."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Unable to submit your feedback."
        ]);
    }

    $stmt->close();
    exit;
}


/* ================================
   INVALID TYPE
================================ */

echo json_encode([
    "success" => false,
    "message" => "Invalid form type."
]);

$conn->close();

?>