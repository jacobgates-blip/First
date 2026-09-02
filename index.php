<?php
session_start();
// Declare variable
$page_title = "RUGBY GEAR | Home";
// Call files
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container text-center pt-5">
    <div class="row align-items-start">
        <div class="col">
            <h1>RUGBY GEAR</h1>
            <p class="lead">We can help keep track on rugby gears.</p>
        </div>
    </div>
</div>
<!-- Start of cards -->
<div class="container pt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-circle-info fa-3x mb-3"></i>
                    <h5 class="card-title">How it works</h5>
                    <p class="card-text">Rugby Gear for who? Is this the solution to missing gears?</p>
                    <a class="mt-auto" href="how_it_works.php"><button type="button" class="btn btn-danger btn-lg">Click me FIND MORE...</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-list-check fa-3x mb-3"></i>
                    <h5 class="card-title">Gear list</h5>
                    <p class="card-text">Have a look at what is currently free and waht is been borrowed.</p>
                    <a class="mt-auto" href="view_loans.php"><button type="button" class="btn btn-danger btn-lg">View Lisit...</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-user-shield fa-3x mb-3"></i>
                    <h5 class="card-title"><?php echo isset($_SESSION['id']) ? 'Control panel' : 'Monitor login'; ?></h5>
                    <p class="card-text">Log a loan, or mark equipment as returned.</p>
                    <a class="mt-auto" href="<?php echo isset($_SESSION['id']) ? 'control_panel.php' : 'login.php'; ?>">
                        <button type="button" class="btn btn-danger btn-lg"><?php echo isset($_SESSION['id']) ? 'Open' : 'Log in'; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Call footer
include('includes/footer.php');
?>