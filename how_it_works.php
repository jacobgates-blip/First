<?php
session_start();
$page_title = "RUGBY GeAR | RUGBY GEAR";
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container pt-2">
    <div class="row">
        <h1 class="text-center">Gears Info</h1>
        <hr />
        <h3 class="pt-5">HOW IS RUGBY GEAR HELPING</h3>
        <p>
            There was a school that had a great rugby team known as Mafana College. This school has seems to lose
            there gears every year due to people talking them and forgetting to returned it. RUGBY GEAR has helped
            track the gears and who borrowed them, which made it much easier for the manager to track them.
        </p>
        <h3 class="pt-4">WHO IS IT FOR</h3>
        <p>
            The manager will be using this app to track people using gears. The manager will also be remeinding  
            them their due-dates and return_dates.
        </p>
        <h3 class="pt-4">What it does</h3>
        <ul>
            <li>Lets a signed-in manager log a loan — item, borrower, and due-back date</li>
            <li>Shows anyone, manager or coaches, a live public list of what's currently out</li>
            <li>Flags anything overdue</li>
            <li>Lets a manager mark gear as returned, or correct a mistaken entry</li>
        </ul>
    </div>
</div>

<?php
include('includes/footer.php');
?>