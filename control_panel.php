<?php
session_start();
require('includes/auth_check.php');

// Declare page title variable
$page_title = "Control Panel | RUGBY GEAR";

// Call header and navigation files
include('includes/header.php');
include('includes/nav.php');
?>


<p class="text-end me-5 mt-2 fs-4">
    Signed in: <?= htmlspecialchars(($_SESSION['firstname'] ?? '') . ' ' . ($_SESSION['lastname'] ?? '')); ?>
</p>

<!-- Start of content one -->
<div class ="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <h2 class="pb-4">Welcome back, <?= htmlspecialchars($_SESSION['firstname'] ?? 'Manager'); ?></h2>
            <a href="borrow.php"><button class="btn btn-danger btn-lg m-2">Log a Loan</button></a>
            <a href="manage_loans.php"><button class="btn btn-primary btn-lg m-2">Manage Loans</button></a>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>


<?php
// Call footer
include('includes/footer.php');
?>
