<?php
require 'config.php';

// If save_loan.php redirected back here with errors, read them once
// and clear them so a page refresh doesn't keep showing a stale error.
$errors = $_SESSION['borrow_errors'] ?? [];
$old    = $_SESSION['borrow_old'] ?? [];
unset($_SESSION['borrow_errors'], $_SESSION['borrow_old']);

require 'partials/header.php';
?>
<h1>Log a loan</h1>

<?php if ($errors): ?>
<ul class="errors">
    <?php foreach ($errors as $error): ?>
    <li><?= htmlspecialchars($error) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="save_loan.php" method="post">
    <label for="item_name">Item</label>
    <input type="text" id="item_name" name="item_name"
           value="<?= htmlspecialchars($old['item_name'] ?? '') ?>" required>

    <label for="borrower_name">Borrower</label>
    <input type="text" id="borrower_name" name="borrower_name"
           value="<?= htmlspecialchars($old['borrower_name'] ?? '') ?>" required>

    <label for="due_back">Due back</label>
    <input type="date" id="due_back" name="due_back"
           value="<?= htmlspecialchars($old['due_back'] ?? '') ?>" required>

    <button type="submit">Log loan</button>
</form>

<?php require 'partials/footer.php'; ?>
