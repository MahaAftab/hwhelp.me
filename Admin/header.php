<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
 
          </li>
 
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <!-- The admin logged in will have his name displayed here -->
              <div class="dropdown-title">Sarah Smith</div>

              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile</a>
             
              <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"><span class="logo-name">Hwhelp</span></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="dropdown">
              <a href="index.php" class="nav-link active"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li><a class="nav-link" href="add_uni.php"><i class="fa fa-university small"></i><span>Add University</span></a></li>
            <li><a class="nav-link" href="add_course.php"><i data-feather="folder"></i><span>Add Courses</span></a></li>

           <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="package"></i><span>Add Material</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add_hw.php">
                  <i data-feather="book-open"></i>Add Homework</a></li>
                <li class=""><a class="nav-link" href="Add_lectures.php"><i data-feather="file-minus"></i></i>Add Lectures</a></li>
                <li><a class="nav-link" href="add_video.php"><i data-feather="video"></i>Add Videos</a></li>
                <li><a class="nav-link" href="add_quiz.php"><i data-feather="book"></i>Add Quiz</a></li>
                <li><a class="nav-link" href="add_past_paper.php"><i data-feather="clipboard"></i>Add Past Exam papers</a></li>

              </ul>
            </li>          
              </ul>
            </li>
            
          </ul>
        </aside>
      </div>
