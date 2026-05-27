<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-center">
        CCCInfo <small class="text-muted">v1.2</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
               <?php
                $menu = [];
                if (is_null($this->session->userdata('useraccess'))) {
                    false;
                } else {
                    $role_access = $this->session->userdata('useraccess');
                    $queryMenu = "SELECT menu_access.menu_id AS id, menu.menu_name AS menu, menu.link AS link, menu.icon AS icon
                                  FROM menu_access JOIN menu
                                  ON menu.id = menu_access.menu_id
                                  WHERE menu_access.role_access = '$role_access'
                                  ORDER BY menu_access.menu_id ASC
                                ";
                    $menu = $this->db->query($queryMenu)->result_array();
                }
                ?>
                <?php
                foreach ($menu as $m) :
                    $menuUrl = $this->uri->segment(1);
                    if ($m['link'] == $menuUrl) :
                ?>
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?= base_url($m['link']); ?>" class="nav-link">
                                <i class="nav-icon <?= $m['icon']; ?>"></i>
                                <p>
                                    <?= $m['menu']; ?>
                                </p>
                            </a>
                            <?php
                            $mid = $m['id'];
                            $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_access AS role_access
                                         FROM submenu JOIN submenu_access
                                         ON submenu.id = submenu_access.submenu_id
                                         WHERE submenu.menu_id = '$mid'
                                         AND submenu_access.role_access = '$role_access'
                                         ORDER BY submenu_id ASC
                                        ";
                            $submenu = $this->db->query($querySubmenu)->result_array();
                            ?>

                            <?php foreach ($submenu as $sm) :
                                $submenuUrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                                if ($sm['submenu_link'] == $submenuUrl) :
                            ?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['submenu_link']);  ?>" class="nav-link active">
                                                <i class="far fa-circle nav-icon ml-4"></i>
                                                <p><?= $sm['submenu_name']; ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                <?php else : ?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['submenu_link']);  ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon ml-4"></i>
                                                <p><?= $sm['submenu_name']; ?></p>
                                            </a>
                                        </li>
                                    </ul>
                            <?php
                                endif;
                            endforeach; ?>
                        </li>
                    <?php else : ?>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url($m['link']); ?>" class="nav-link">
                                <i class="nav-icon <?= $m['icon']; ?>"></i>
                                <p>
                                    <?= $m['menu']; ?>
                                </p>
                            </a>
                            <?php
                            $mid = $m['id'];
                            $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_access AS role_access
                                         FROM submenu JOIN submenu_access
                                         ON submenu.id = submenu_access.submenu_id
                                         WHERE submenu.menu_id = '$mid'
                                         AND submenu_access.role_access = '$role_access'
                                         ORDER BY submenu_id ASC
                                        ";
                            $submenu = $this->db->query($querySubmenu)->result_array();
                            ?>

                            <?php foreach ($submenu as $sm) : ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url($sm['submenu_link']);  ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon ml-4"></i>
                                            <p><?= $sm['submenu_name']; ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        </li>
                <?php
                    endif;
                endforeach;
                ?>
                <?php if($this->session->userdata('areascope') == 'CCC' && $this->session->userdata('userid') != 'Maksum') : ?>
                    <li class="nav-item has-treeview">
                        <a href="http://192.168.188.254/logsheet" class="nav-link">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Logsheet
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
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