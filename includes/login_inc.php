<?php
session_start();
require('conn_1dt.php');

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email'] ?? '');
    $pwd   = $_POST['pwd'] ?? '';

    if ($email === '' || $pwd === '') {
        header('Location: ../login.php?error=empty_fields');
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM manager WHERE coach_email = :email");
    $stmt->execute([':email' => $email]);
    $manager = $stmt->fetch();

    // password_verify checks the submitted password against the hash
    // stored in the database — the plain password is never stored or compared directly.
    if ($manager && password_verify($pwd, $manager['password'])) {
        $_SESSION['id']        = $manager['id'];
        $_SESSION['firstname'] = $manager['coach_name'];
        header('Location: ../control_panel.php');
        exit;
    }

    header('Location: ../login.php?error=invalid_credentials');
    exit;
}

header('Location: ../login.php');
exit;
