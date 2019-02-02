<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">Laundry Crafty</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <b>
                        <?php echo $_SESSION["user"];?>
                    </b>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="../login/logout.php">Log Out <span class="glyphicon glyphicon-off"></span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>