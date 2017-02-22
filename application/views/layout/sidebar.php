<body>
<div class="wrapper">

      <!-- SIDEBAR
      ================================================== -->
      <div class="sidebar">

        <!-- Close button (mobile devices) -->
        <div class="sidebar__close">
          <img src="assets/img/close.svg" alt="Close sidebar">
        </div>

        <!-- Sidebar user -->
        <div class="sidebar__user">

          <!-- Sidebar user avatar -->

          <!-- <div class="sidebar-user__avatar">
            <img src="assets/img/user_1.jpg" alt="...">
          </div> -->

          <!-- Sidebar user info -->
          <?php if($this->session->userdata('logged_in')){ ?>
              <?php $session_data = $this->session->userdata('logged_in');?>
              <h4 style="color:#ffffff">Username : <?php echo $session_data['username'];?></h4>
          <?php } ?>
        </div>


        <!-- Sidebar nav -->
        <nav>
          <ul class="sidebar__nav">
            <li class="sidebar-nav__heading">Menu</li>
            <li class="sidebar-nav__dropdown">
                <li><a href="<?php echo site_url('silder/index');?>"></i>Create Silder</a></li>
            </li>

            <li class="sidebar-nav__dropdown">
                <li><a href="<?php echo site_url('promotion/categorypromotion');?>"></i>Category Promotion</a></li>
            </li>

            <li class="sidebar-nav__dropdown">
                <li><a href="<?php echo site_url('promotion/index');?>"></i>Create Promotion</a></li>
            </li>

          </ul>
        </nav>

      </div>
