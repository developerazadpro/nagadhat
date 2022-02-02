<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Navigation</li>


            <!--  sidebar -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>User</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu module-link">
                        <li><a href="{{ 'users' }}"><i class="fa fa-circle-o"></i>List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>User Group</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu module-link">
                        <li><a href="{{ 'user-groups' }}"><i class="fa fa-circle-o"></i>List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Ordered Product</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu module-link">
                        <li><a href="{{ 'pending-order' }}"><i class="fa fa-circle-o"></i>List</a></li>
                </ul>
            </li>

            <!-- /.  sidebar -->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

