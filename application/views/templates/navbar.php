    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <h4 class="h5 ml-2"><?= $title; ?></h4>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <?= $this->session->userdata['userfullname']; ?> -->
                </a>
                <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                </div>
            </li>
            
            <li class="mr-3">
                <?php if ($this->session->userdata('userid')) :  ?>
                    <?= $this->session->userdata('userfullname') ?> 
                    | <span class="text-info"> <i class="<?= $this->session->userdata('icon') ?>"></i> <?= $this->session->userdata('useraccessname') ?></span>
                <?php endif; ?>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <span class="lnr lnr-highlight"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" id="navbarSelectTheme">
                    <span class="dropdown-item dropdown-header">View theme</span>
                    <div class="dropdown-divider"></div>                    
            </li>   -->          
        </ul>
    </nav>
    <!-- /.navbar -->