<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        CEKAVH
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Query menu -->
                <?php
                // if no user logged in
                $queryMenu = '';
                if ($this->session->userdata() == false) {
                    $queryMenu = "SELECT * FROM menu WHERE NOT EXISTS (SELECT null FROM menu_access WHERE menu_access.menu_id = menu.id)";
                } else {
                    // $roleid = $this->session->userdata('roleid');
                    $roleid = 9;
                    $queryMenu = "SELECT * FROM menu JOIN menu_access ON menu.id = menu_access.menu_id WHERE menu_access.role_id = '$roleid'";
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
                                    <?= $m['menu']; ?>
                                </p>
                            </a>
                            <?php
                            $mid = $m['id'];
                            $role_id = 2;
                            if ($role_id != 2) {
                                $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_id AS role_access
                                             FROM submenu JOIN submenu_access
                                             ON submenu.id = submenu_access.submenu_id
                                             WHERE submenu.menu_id = '$mid'
                                             AND submenu_access.role_id != '$role_id'
                                             ORDER BY submenu_id ASC
                                            ";
                                $submenu = $this->db->query($querySubmenu)->result_array();
                            } else {
                                $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_id AS role_access
                                             FROM submenu JOIN submenu_access
                                             ON submenu.id = submenu_access.submenu_id
                                             WHERE submenu.menu_id = '$mid'
                                             AND submenu_access.role_id = '2'
                                             ORDER BY submenu_id ASC
                                            ";
                                $submenu = $this->db->query($querySubmenu)->result_array();
                            }
                            ?>
                            <?php foreach ($submenu as $sm) : ?>
                                <?php if (is_null($this->uri->segment(3))) {
                                    $submenulink = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                                } else {
                                    $submenulink = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
                                } ?>

                                <?php if ($sm['submenu_link'] == $submenulink) : ?>
                                    <ul class="nav nav-treeview menu-open">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['submenu_link']) ?>" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?= $sm['submenu_name'] ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                <?php else : ?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url($sm['submenu_link']) ?>" class="nav-link">
                                                <i class="far fa-fw fa-circle nav-icon"></i>
                                                <p><?= $sm['submenu_name'] ?></p>
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
                                    <?= $m['menu']; ?>
                                </p>
                            </a>
                            <?php
                            $mid = $m['id'];
                            $querySubmenu = "SELECT submenu.id AS id, submenu.name AS submenu_name, submenu.menu_id AS menu_id, submenu.link AS submenu_link, submenu_access.role_id AS role_access
                                                 FROM submenu JOIN submenu_access
                                                 ON submenu.id = submenu_access.submenu_id
                                                 WHERE submenu.menu_id = '$mid'
                                                 AND submenu_access.role_id = '2'
                                                 ORDER BY submenu_id ASC
                                                ";
                            $submenu = $this->db->query($querySubmenu)->result_array();
                            ?>
                            <?php foreach ($submenu as $sm) : ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url($sm['submenu_link']) ?>" class="nav-link">
                                            <i class="far fa-fw fa-circle nav-icon"></i>
                                            <p><?= $sm['submenu_name'] ?></p>
                                        </a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="separator">
                    <hr width="90%">
                </div>

                <?php $sessiondata = true; ?>
                <?php if ($sessiondata == true) : ?>
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

<!-- Modal -->
<div class="modal fade" id="modal-login">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <form method="POST" action="<?= base_url('auth') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">User Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>