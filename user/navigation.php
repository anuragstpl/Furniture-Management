<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Welcome !</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo BASE_URL ?>/dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="#"><?php echo $_SESSION['name'];?></a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL ?>/profile">Profile</a>
                </li>
                 <li>
                    <a href="<?php echo BASE_URL ?>/changePassword">Change Password</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
