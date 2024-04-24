<!-- Navbar -->
<?php include(__DIR__ . '/../navbar/navbar.php'); ?>

<!-- Page -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-md-3 border-right">
            <div class="header__logo">
                <a href="http://localhost/apple/customer/home" class="text-dark font-weight-bold text-xl" style="font-size: 1.8rem;">APPLE <span style="color: #e53637;">.</span> </a>
            </div>
            <div class="shop__sidebar__search mb-2">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><span class="icon_search"></span></button>
                </form>
            </div>
            <ul class="list-unstyled mt-5">
                <li>
                    <a class="text-dark active" href="http://localhost/apple/customer/user/profile"><i class="fa fa-address-card-o mr-2" aria-hidden="true"></i>User Information</a>
                </li>
                <li>
                    <a class="text-dark active" href="http://localhost/apple/customer/user/orderHistory"><i class="fa fa-cube mr-2" aria-hidden="true"></i> Order History</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-9 p-3">
            <h2 class="font-weight-bolder mb-3 text-uppercase"><?php echo $title ?>.</h2>
            <hr>
            <?php require_once "./App/views/pages/${pages}.php" ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include(__DIR__ . '/../footer/footer.php'); ?>