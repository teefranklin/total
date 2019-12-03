<!--sidebar start-->
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
              <i class="icon_house_alt"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-book"></i>
              <span>EDMS</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="study_home.php">Study</a></li>
              <li><a class="" href="pdf/practice.php">View Certificate</a></li>
              <li><a class="" href="practice.php">Assesment</a></li>
            </ul>
          </li>
          <li class="active">
            <a class="" href="marks.php">
              <i class="fa fa-check"></i>
              <span>Marks</span>
            </a>
          </li>
          <?php if($_SESSION['role']=='admin'): ?>
            <li>
              <a class="" href="users.php">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->