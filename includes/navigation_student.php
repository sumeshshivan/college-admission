 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../<?php if($student->photo) echo 'photos/' . $student->photo; else echo 'static/dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $student->name ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php if($home_page) echo "active"; ?>">
          <a href="../admin/">
            <i class="fa fa-dashboard"></i> <span>Home</span>
         </a>
        </li>

        <li class="<?php if($batch_page) echo "active"; ?>">
          <a href="batch-list.php">
            <i class="fa fa-users"></i> <span>Batches</span>
         </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>