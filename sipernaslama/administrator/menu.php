        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../foto_user/<?php if (trim($users['foto']) == ''){ echo "blank.png"; }else{ echo $users['foto']; } ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo "$users[nama_lengkap]"; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU PENGGUNA</li>
            <li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Menu Utama</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu1.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-pencil"></i> <span>Modul Berita</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu2.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-play"></i> <span>Modul Video</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu3.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-blackboard"></i> <span>Modul Iklan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu4.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-object-align-left"></i> <span>Modul Web</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu5.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Modul Interaksi</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu6.php"; ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> <span>Modul Users</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php include "menu/menu7.php"; ?>
              </ul>
            </li>

            <li><a href="?module=user&act=edit&id=<?php echo "$_SESSION[sessid]"; ?>"><i class="fa fa-edit"></i> <span>Edit Profile</span></a></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>