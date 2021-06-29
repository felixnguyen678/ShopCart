
<!--Header-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left socialNw">
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-youtube"></span></a>
                    <a href="#"><span class="icon-tumblr"></span></a>
                </div>
                <a href="/"> <span class="icon-home"></span> Home</a>
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>

                <?php
                session_start();
                if(isset($_SESSION['session_id'])){
                    echo ' <a href="#"><span class="icon-user"></span>My Orders History</a>
                           <a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>
                           <a href="/controllers/logout_controller.php"><span class="icon-lock"></span> Logout</a>
                           ';
                }
                else{
                    echo '<a href="/index.php?controller=pages&action=login"><span class="icon-lock"></span> Login</a>';
                }
                ?>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="/"><span></span>
                        <img src="/assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
                    </a>
                </h1>

            </div>
    </header>
</div>