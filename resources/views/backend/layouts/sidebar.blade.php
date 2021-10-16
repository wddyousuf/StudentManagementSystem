@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp


<!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (Auth::user()->role=='Admin')
          <li class="nav-item  has-treeview {{ ($prefix=='/user')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.view') }}" class="nav-link {{ ($route=='user.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('user.add') }}" class="nav-link {{ ($route=='user.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
              </ul>
          </li>
          @endif
          <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Profile Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('password.change') }}" class="nav-link {{ ($route=='password.change')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/logos')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Logo Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('logo.view') }}" class="nav-link {{ ($route=='logo.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Logo</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('logo.add') }}" class="nav-link {{ ($route=='logo.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Logo</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/slider')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Slider Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.view') }}" class="nav-link {{ ($route=='slider.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('slider.add') }}" class="nav-link {{ ($route=='slider.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Slider</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/mission')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Mission Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mission.view') }}" class="nav-link {{ ($route=='mission.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Mission</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/vision')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Vision Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('vision.view') }}" class="nav-link {{ ($route=='vision.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Vision</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/news_&_event')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                News & Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('news.view') }}" class="nav-link {{ ($route=='news.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View News & Event</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('news.add') }}" class="nav-link {{ ($route=='news.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add News & Event</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/services')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('services.view') }}" class="nav-link {{ ($route=='services.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Services</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('services.add') }}" class="nav-link {{ ($route=='services.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Services</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/contact')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Contact Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contact.view') }}" class="nav-link {{ ($route=='contact.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/about')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about.view') }}" class="nav-link {{ ($route=='about.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/contact')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Communicate
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contact.communicate') }}" class="nav-link {{ ($route=='contact.communicate')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item  has-treeview {{ ($prefix=='/student')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Student Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.view') }}" class="nav-link {{ ($route=='student.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Student</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('student.add') }}" class="nav-link {{ ($route=='student.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Student</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/course')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Course Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('course.add') }}" class="nav-link {{ ($route=='course.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Course</p>
                  </a>
                </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('course.view') }}" class="nav-link {{ ($route=='course.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Course</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/attendance')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Attendance Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('attendance.take') }}" class="nav-link {{ ($route=='attendance.take')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Take Attendance</p>
                  </a>
                </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('attendance.view') }}" class="nav-link {{ ($route=='attendance.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Attendance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/result')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Result Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('result.make') }}" class="nav-link {{ ($route=='result.make')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Result</p>
                  </a>
                </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('result.view') }}" class="nav-link {{ ($route=='result.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Result</p>
                </a>
              </li>
            </ul>
            {{--  <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('result.all') }}" class="nav-link {{ ($route=='result.all')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semester Result</p>
                  </a>
                </li>
              </ul>  --}}
          </li>
          <li class="nav-item has-treeview {{ ($prefix=='/notice')?'menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Notice Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('notice.add') }}" class="nav-link {{ ($route=='notice.add')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Notice</p>
                  </a>
                </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('notice.view') }}" class="nav-link {{ ($route=='notice.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notice</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
