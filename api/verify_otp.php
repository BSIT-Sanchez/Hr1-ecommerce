<?php
session_start();
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$entered_otp = trim($input['otp'] ?? '');

if (!isset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['otp_expires'], $_SESSION['pre_login_user'])) {
    echo json_encode(['status' => 'error', 'message' => 'OTP session not found.']);
    exit;
}

if (time() > $_SESSION['otp_expires']) {
    session_unset();
    echo json_encode(['status' => 'error', 'message' => 'OTP expired.']);
    exit;
}

if ($entered_otp != $_SESSION['otp']) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
    exit;
}

// OTP is valid
$user = $_SESSION['pre_login_user'];
$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['email'] = $user['email'];
$_SESSION['role'] = $user['role'];

// Clear OTP temp data
unset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['otp_expires'], $_SESSION['pre_login_user']);

$role = strtolower($user['role']);
$redirect = match ($role) {
    'admin'      => 'pages/admin/dashboard.php',
    'applicant'    => 'pages/applicant/dashboard.php',
    default      => '404Page.php',
};

echo json_encode([
    'status' => 'success',
    'message' => 'OTP verified. Login successful.',
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
    'role' => $user['role'],
    'redirect' => $redirect
]);
?>
