<?php
/**
 * Gear Out
 *
 * Purpose: replace the PE department's paper sign-out sheet for lunchtime
 * sports equipment with a system that shows, at a glance, what's currently
 * borrowed and by whom.
 *
 * Users:
 *  - Student sports monitors, who log and return loans at the shed window.
 *  - PE staff, who check what's outstanding without walking to the shed.
 */
require 'config.php';
require 'partials/header.php';
?>
<h1>Gear Out</h1>
<p>Track sports equipment borrowed at lunchtime — who has it, and when it's due back.</p>

<div class="home-links">
    <a class="button" href="borrow.php">Log a loan</a>
    <a class="button button-secondary" href="view_loans.php">View current loans</a>
</div>

<?php require 'partials/footer.php'; ?>
