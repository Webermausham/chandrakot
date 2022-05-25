<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <div class="info">
                <a href="#" class="d-block">EduPro</a>
            </div>
        </div>

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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Start
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Student Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Result Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exe') }}" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                          LADGERS
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('add-std') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                              Add/View Results
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>







                <li class="nav-item">
                    <a href="{{ route('view-school') }}" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                            SCHOOL LISTS
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>









   <br>  <br> <br> <br> <br> <br>












            </ul>
        </nav>

    </div>

</aside>
