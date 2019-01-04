<nav class="navbar navbar-expand-lg navbar-light  bg-dark border-bottom ">
    <div class="container">
        <a class="navbar-brand" href="#"><?php echo lang('Home_Admin') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#app-nav" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="nav navbar-nav ">
                <a class="nav-link" href="#"><?php echo lang('ITEMS') ?></a>
                <a class="nav-link" href="#"><?php echo lang('MEMBERS') ?></a>
                <a class="nav-link" href="#"><?php echo lang('STATISTICS') ?></a>
                <a class="nav-link" href="#"><?php echo lang('LOGS') ?></a>
            </ul>

            <ul class="navbar-nav  ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kirolous
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Setting</a>
                        <a class="dropdown-item" href="members.php?do=Edit&UserID=<?php echo $_SESSION['ID'] ?>">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>