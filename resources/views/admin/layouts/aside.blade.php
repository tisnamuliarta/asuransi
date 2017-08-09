<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/img/'.auth()->guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('admin')->user()->name }}</p>
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
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Member</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('admin.add-member') }}"><i class="fa fa-circle-o"></i>Tambah Member</a></li>
                    <li ><a href="{{ route('displaymember') }}"><i class="fa fa-circle-o"></i>List Member</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('setoran.member') }}">
                    <i class="fa fa-th"></i> <span>Setoran</span>
                    @if($setoran > 0)
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">Belum Terkonfirmasi</small>
                        </span>
                    @endif
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Pin</span>
                    @if($orderPinCodes > 0)
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">Belum Terkonfirmasi</small>
                        </span>
                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('order-pin')  }}"><i class="fa fa-circle-o"></i> <span>Pesan Pin</span></a></li>
                    <li><a href="{{ route('list-order-pin')  }}"><i class="fa fa-circle-o"></i> <span>List Order Pin</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Laporan</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('laporan-member') }}"><i class="fa fa-circle-o"></i> <span>Laporan Data Member</span></a></li>
                    <li><a href="{{ route('laporan-order') }}"><i class="fa fa-circle-o"></i> <span>Laporan Data Order</span></a></li>
                    <li><a href="{{ route('laporan-setoran') }}"><i class="fa fa-circle-o"></i> <span>Laporan Data Setoran</span></a></li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>