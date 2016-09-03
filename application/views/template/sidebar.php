      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php if($this->session->userdata('username')){echo $this->session->userdata('username');} ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active"><a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
            <li><a href="<?php echo base_url('users');?>"><i class="fa fa-users"></i> <span>Management Users</span></a></li>
            <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-shopping-cart'></i>
                    <span>Data Transaksi</span>
                    <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>
                    <li><a href="<?php echo base_url().'transaksi/add';?>"><i class='fa fa-angle-double-right'></i>Transaksi Penjualan</a></li>
                    <li><a href="<?php echo base_url().'transaksi/add';?>"><i class='fa fa-angle-double-right'></i>Request Pembelian</a></li>
                    <li><a href="<?php echo base_url().'transaksi';?>"><i class='fa fa-angle-double-right'></i> Data Penjualan</a></li>
                    <li><a href="<?php echo base_url().'transaksi';?>"><i class='fa fa-angle-double-right'></i> Data Purchasing</a></li>
                </ul>
            </li>
            <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-table'></i>
                    <span>Data Master</span>
                    <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('produk');?>"><i class="fa fa-angle-double-right"></i> Data Produk</a></li>
                    <li><a href="<?php echo base_url('kategori');?>"><i class="fa fa-angle-double-right"></i> Data Kategori</a></li>
                    <li><a href="<?php echo base_url('satuan');?>"><i class="fa fa-angle-double-right"></i> Data Satuan</a></li>
                    <li><a href="<?php echo base_url('supplier');?>"><i class="fa fa-angle-double-right"></i> Data Supplier</a></li>
                    <li><a href="<?php echo base_url('kendaraan');?>"><i class="fa fa-angle-double-right"></i> Data Kendaraan</a></li>
                    <li><a href="<?php echo base_url('driver');?>"><i class="fa fa-angle-double-right"></i> Data Driver</a></li>
                    <li><a href="<?php echo base_url('jabatan');?>"><i class="fa fa-angle-double-right"></i> Data Jabatan</a></li>
                    <li><a href="<?php echo base_url('pelanggan');?>"><i class="fa fa-angle-double-right"></i> Data Pelanggan</a></li>
                    <li><a href="<?php echo base_url('karyawan');?>"><i class="fa fa-angle-double-right"></i> Data Karyawan</a></li>
                </ul>
            </li>
            <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-table'></i>
                    <span>Report</span>
                    <i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'report';?>"><i class='fa fa-angle-double-right'></i> Data Penjualan</a></li>
                    <li><a href="<?php echo base_url().'transaksi';?>"><i class='fa fa-angle-double-right'></i> Data Purchasing</a></li>
                </ul>
            </li>
            <!--
            <li class="header">TEMPLATE</li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>Layout</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('pages/chartjs');?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="<?php echo base_url('pages/flot');?>"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            -->            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
