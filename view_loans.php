<?php
require 'config.php';
require 'partials/header.php';

$stmt = $pdo->query(
    "SELECT * FROM loans WHERE returned_date IS NULL ORDER BY due_back ASC"
);
$loans = $stmt->fetchAll();
$today = date('Y-m-d');
?>
<h1>Current loans</h1>

<?php if (isset($_GET['logged'])): ?>
<p class="flash flash-success">Loan logged.</p>
<?php endif; ?>
<?php if (isset($_GET['returned'])): ?>
<p class="flash flash-success">Marked as returned.</p>
<?php endif; ?>

<?php if (!$loans): ?>
<p>Nothing is currently out.</p>
<?php else: ?>
<table>
    <tr>
        <th>Item</th>
        <th>Borrower</th>
        <th>Due back</th>
        <th></th>
    </tr>
    <?php foreach ($loans as $loan): ?>
    <?php
        // Testing with sample overdue records showed nothing on this page
        // visually distinguished an overdue item from one still on time —
        // easy to miss during a busy lunchtime. This class fixes that.
        $overdue = $loan['due_back'] < $today;
    ?>
    <tr class="<?= $overdue ? 'overdue' : '' ?>">
        <td><?= htmlspecialchars($loan['item_name']) ?></td>
        <td><?= htmlspecialchars($loan['borrower_name']) ?></td>
        <td>
            <?= htmlspecialchars($loan['due_back']) ?>
            <?php if ($overdue): ?><span class="badge">overdue</span><?php endif; ?>
        </td>
        <td><a href="return_loan.php?id=<?= (int) $loan['id'] ?>">Mark returned</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<?php require 'partials/footer.php'; ?>
