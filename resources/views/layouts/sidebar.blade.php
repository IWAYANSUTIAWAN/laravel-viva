<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">IT Asset</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">IT</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="/dashboard" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                {{-- <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
               
                </ul> --}}
              </li>
               <li class="nav-item dropdown">
                <a href="{{route('transaksi_index')  }}" class="nav-link "><i class="fas fa-map-marked"></i><span>Transaksi</span></a>
               
              </li>
             
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('Region_index')  }}">Region</a></li>
                  <li><a class="nav-link" href="{{route('kodelokasi_index')  }}">Kode Lokasi</a></li>
                  <li><a class="nav-link" href="{{ route('Lokasi_index') }}">Lokasi</a></li>
                  <li><a class="nav-link" href="{{ route('Kondisi_index') }}">Kondisi</a></li>
                 
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-thumbtack"></i><span>Lain Lain</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('isp_index') }}">ISP</a></li>
                  <li><a class="nav-link" href="{{ route('email_index') }}">Email</a></li>
                  <li><a class="nav-link" href="{{ route('laptop_index') }}">Laptop</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-network-wired"></i> <span>Remote</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('tv_index') }}">Teamviewer</a></li>
                  <li><a class="nav-link" href="{{ route('anydesk_index') }}">Anydesk</a></li>
                  
                </ul>
              </li>
              
              {{-- <li class="active"><a class="nav-link" href="{{ route('crud') }}"><i class="far fa-square"></i> <span>CRUD</span></a></li> --}}
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Hardware</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('cctv_index') }}">Kamera Cctv</a></li>
                  <li><a class="nav-link" href="{{ route('dvr_index') }}">Dvr</a></li>
                  <li><a class="nav-link" href="{{ route('cpu_index') }}">Cpu</a></li>
                  <li><a class="nav-link" href="{{ route('monitor_index') }}">Monitor</a></li>
                  <li><a class="nav-link" href="{{ route('mouse_index') }}">Mouse</a></li>
                  <li><a class="nav-link" href="{{ route('keyboard_index') }}">Keyboard</a></li>
                  <li><a class="nav-link" href="{{ route('scaner_index') }}">Scaner</a></li>
                  <li><a class="nav-link" href="{{ route('printer_index') }}">Printer</a></li>
                  <li><a class="nav-link" href="{{ route('modem_index') }}">Modem 4G</a></li>
                  <li><a class="nav-link" href="{{ route('webcame_index') }}">Webcame</a></li>
                  <li><a class="nav-link" href="{{ route('telpon_index') }}">Pesawat Telpon</a></li>
                  <li><a class="nav-link" href="{{ route('ups_index') }}">Ups</a></li>
                  <li><a class="nav-link" href="{{ route('switch_index') }}">Switch</a></li>
                  <li><a class="nav-link" href="{{ route('finger_index') }}">Finger</a></li>
                </ul>
              </li>
             
              
            </ul>

            
        </aside>
      </div>