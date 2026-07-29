<?php
require 'config.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $pdo->prepare("UPDATE loans SET returned_date = :today WHERE id = :id");
    $stmt->execute([':today' => date('Y-m-d'), ':id' => $id]);
}

header('Location: view_loans.php?returned=1');
exit;
