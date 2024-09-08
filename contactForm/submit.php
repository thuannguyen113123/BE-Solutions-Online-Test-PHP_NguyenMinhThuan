<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $company = trim($_POST["company"]);

    // Xử lý server
    if (empty($name) || empty($phone) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    // Kiểm tra email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Phone
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Invalid phone number.");
    }

    header("Location: /thankYou/thankYou.php?name=" . urlencode($name) . "&phone=" . urlencode($phone) . "&email=" . urlencode($email) . "&company=" . urlencode($company));
    exit();
} else {
    die("Invalid request.");
}
?>