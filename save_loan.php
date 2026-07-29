<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: borrow.php');
    exit;
}

$item     = trim($_POST['item_name'] ?? '');
$borrower = trim($_POST['borrower_name'] ?? '');
$due      = $_POST['due_back'] ?? '';
$today    = date('Y-m-d');
$errors   = [];

// --- Validation added after testing (see NOTES.md) --------------------
// Testing showed the HTML 'required' attribute alone wasn't enough:
// submitting the form with JavaScript disabled, or editing the request
// directly, still produced empty database rows. Checking again here,
// server-side, closes that gap.
if ($item === '') {
    $errors[] = 'Please enter an item name.';
}
if ($borrower === '') {
    $errors[] = 'Please enter a borrower name.';
}
// Testing also found it was easy to fat-finger a due date in the past,
// which silently made a brand-new loan show up as "overdue" immediately.
if ($due === '' || $due < $today) {
    $errors[] = 'Due back date must be today or later.';
}

if ($errors) {
    $_SESSION['borrow_errors'] = $errors;
    $_SESSION['borrow_old']    = ['item_name' => $item, 'borrower_name' => $borrower, 'due_back' => $due];
    header('Location: borrow.php');
    exit;
}

$sql = "INSERT INTO loans (item_name, borrower_name, borrowed_date, due_back)
        VALUES (:item, :borrower, :borrowed, :due)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':item'     => $item,
    ':borrower' => $borrower,
    ':borrowed' => $today,
    ':due'      => $due,
]);

header('Location: view_loans.php?logged=1');
exit;
