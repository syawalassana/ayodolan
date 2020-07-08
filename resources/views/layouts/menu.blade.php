<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
         <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
            <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> --}}

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Ayo::set_active('/')}}">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Ayo::set_active('objek-wisata*')}}"><a href="/objek-wisata"><i class="fa fa-umbrella"></i> Objek Wisata</a></li>
            <li class="{{Ayo::set_active('wisatawan*')}}"><a href="/wisatawan"><i class="fa fa-users"></i>Data Wisatawan</a></li>
            <li class="{{Ayo::set_active('event*')}}"><a href="/event"><i class="fa fa-calendar"></i>Data Event Kota</a></li>
            <li class="{{Ayo::set_active('hotel*')}}"><a href="/hotel"><i class="fa fa-hotel"></i>Data Hotel</a></li>
            <li class="{{Ayo::set_active('mobil*')}}"><a href="/mobil"><i class="fa fa-car"></i>Data Mobil</a></li>
            <li class="{{Ayo::set_active('paket*')}}"><a href="/paket"><i class="fa fa-diamond"></i>Data Paket Wisata</a></li>
            <li class="{{Ayo::set_active('transaksi*')}}"><a href="/transaksi"><i class="fa fa-dollar"></i>Data Transaksi</a></li>
            <li class="{{Ayo::set_active('laporan*')}}"><a href="/laporan"><i class="fa fa-area-chart"></i>Laporan</a></li>
        </ul>
    </section>
        <!-- /.sidebar -->
</aside>


