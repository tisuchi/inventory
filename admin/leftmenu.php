


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php if(checkAdmin() OR checkManager()) : ?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="users.php">All Users </a>
                                </li>
                                <li>
                                    <a href="add-user.php">Add New User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="#"><i class="fa fa-check-square fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="categories.php">All Category</a>
                                </li>
                                <li>
                                    <a href="add-category.php">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-barcode fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="products.php">All Product</a>
                                </li>
                                <li>
                                    <a href="add-product.php">Add Product</a>
                                </li>
                                </ul>
                            <!-- /.nav-second-level -->
                                 <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Customers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Customers.php">All Customers</a>
                                </li>
                                <li>
                                    <a href="buy-product.php">Buy Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            
                        </li>
            
                        
                        <?php if(checkAdmin()) : ?>
                        <li>
                            <a href="notifications.php"><i class="fa fa-bookmark-o fa-fw"></i> Notification</a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(checkAdmin()) : ?>
                        <li>
                            <a href="timelog.php"><i class="fa fa-reorder fa-fw"></i> User's Log Record</a>
                        </li>
                        <?php endif; ?>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>