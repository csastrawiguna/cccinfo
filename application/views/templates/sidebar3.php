<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        CCCInfo
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                //$queryMenu = '';
                if (!$this->session->userdata('userid')) {
                    $queryMenu = "SELECT * FROM menu WHERE need_session = 0";
                    // $menu = $this->db->query($queryMenu)->result_array();
                } else {
                    $access = $this->session->userdata('useraccess');
                    $queryMenu = "SELECT menu.id AS id, menu.menu_name AS menu_name, menu.link AS link, menu.icon AS icon FROM menu JOIN menu_access ON menu.id = menu_access.menu_id WHERE menu_access.role_access = '$access' ORDER BY menu.id ASC";
                }
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <?php
                foreach ($menu as $m) :
                    $menuUrl = $this->uri->segment(1);
                    if ($m['link'] == $menuUrl) :
                ?>
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?= base_url($m['link']); ?>" class="nav-link active">
                                <i class="nav-icon <?= $m['icon']; ?>"></i>
                                <p>
                                    <?= $m['menu_name']; ?>
                                </p>
                            </a>
                            <?php
                            $menuid = $m['id'];
                            $querySubmenu = "SELECT * FROM submenu WHERE need_session = 0 AND menu_id = '$menuid'";
                            $submenu = $this->db->query($querySubmenu)->result_array();

                            ?>
                            <?php foreach ($submenu as $sm) : ?>
                                <?php if (is_null($this->uri->segment(3))) {
                                    $submenulink = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                                } else {
                                    $submenulink = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
                                } ?>

                                <?php if ($sm['link'] == $submenulink) : ?>
                                    <ul class="nav nav-treeview menu-open">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['link']) ?>" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?= $sm['name'] ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                <?php else : ?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['link']) ?>" class="nav-link">
                                                <i class="far fa-fw fa-circle nav-icon"></i>
                                                <p><?= $sm['name'] ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url($m['link']); ?>" class="nav-link">
                                <i class="nav-icon <?= $m['icon']; ?>"></i>
                                <p>
                                    <?= $m['menu_name']; ?>
                                </p>
                            </a>
                            <?php
                            $menuid = $m['id'];
                            // $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_id AS role_access
                            //              FROM submenu JOIN submenu_access
                            //              ON submenu.id = submenu_access.submenu_id
                            //              WHERE submenu.menu_id = '$menuid'
                            //              ORDER BY submenu_id ASC
                            //             ";
                            $querySubmenu = "SELECT * FROM submenu WHERE need_session = 0 AND menu_id = '$menuid'";
                            $submenu = $this->db->query($querySubmenu)->result_array();
                            ?>
                            <?php foreach ($submenu as $sm) : ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url($sm['link']) ?>" class="nav-link">
                                            <i class="far fa-fw fa-circle nav-icon"></i>
                                            <p><?= $sm['name'] ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="nav-item has-treeview">
                    <a href="http://192.168.188.101/logsheet" class="nav-link">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            Logsheet
                        </p>
                    </a>
                </li>
                <div class="separator">
                    <hr width="90%">
                </div>

                <?php if (!$this->session->userdata('userid')) : ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="">
                            <span class="fas fa-fw fa-sign-in-alt"></span>
                            <p data-toggle="modal" data-target="#modal-login">
                                Login
                            </p>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link" id="">
                            <span class="fas fa-fw fa-power-off"></span>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="modal fade" id="modal-login">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 300px;">
        <div class="modal-content">
            <form action="<?= base_url('auth') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-info">Login CCC Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="" class="form-control" id="loginUsername" name="loginUsername" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-info btn-block my-3" name="loginSubmit" id="loginSubmit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>