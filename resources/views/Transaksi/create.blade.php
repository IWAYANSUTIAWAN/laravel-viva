
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Transaksi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

  {{-- sweetalert css --}}
    <link rel="stylesheet" href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body class="layout-2">
  <div id="app">
    <div class="main-wrapper ">
    <div class="navbar-bg fixed-top"></div>
    <nav class="navbar navbar-expand-lg main-navbar fixed-top">
        <a href="#" class="navbar-brand sidebar-gone-hide"><i class="fas fa-luggage-cart"></i>Transaksi Alokasi</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            {{-- <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div> --}}
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}
          <li class="dropdown dropdown-list-toggle">
            {{-- <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div> --}}
            <li class="nav-item"><a href="#" class="nav-link notification-toggle nav-link-lg beep">No. Transaksi: TRX20200928</a></li>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"></div>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            {{-- <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div> --}}
            <ul class="sidebar-menu">
                {{-- <li class="menu-header">Dashboard</li> --}}
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_lokasi"><i class="fas fa-map-marker-alt"></i> <span>Lokasi</span></a></li>
                
                <li class="menu-header">Menu Aset</li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_cpu"><i class="fas fa-hdd"></i> <span>Cpu</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_monitor"><i class="fas fa-tv"></i> <span>Monitor</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_keyboard"><i class="fas fa-keyboard"></i> <span>Keyboard</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_mouse"><i class="fas fa-mouse-pointer"></i> <span>Mouse</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_printer"><i class="fas fa-print"></i> <span>Printer</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_scaner"><i class="fas fa-qrcode"></i> <span>Scaner</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_finger"><i class="fas fa-fingerprint"></i><span>Finger</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_dvr"><i class="far fa-hdd"></i> <span>Dvr</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_cctv"><i class="fas fa-video"></i> <span>Cctv</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_webcame"><i class="fas fa-camera-retro"></i></i> <span>Webcame</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_modem"><i class="fab fa-usb"></i> <span>Modem Gsm</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_telpon"><i class="fas fa-blender-phone"></i></i> <span>Tepon</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_isp"><i class="fas fa-network-wired"></i></i> <span>Isp</span></a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_ups"><i class="fas fa-network-wired"></i></i> <span>Ups</span></a></li>
            </ul>

            
        </aside>
    </div>

      <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <!-- Lokasi -->
    {{-- <div class="row">
          <div class="col-md-12">
              <div class="section-header">
                <div class="col-md-8">
                  <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text btn-secondary text-dark text-bold ">Lokasi : </div>
                </div>
                <input type="text" name="lokasi_name" id="lokasi_name"class="form-control" placeholder="" aria-label="" readonly>
                
              </div>
              
                </div>
                <input type="text" name="lokasi_id" id="lokasi_id"class="form-control" placeholder="" aria-label="" readonly>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active">
                    <a href="/dashboard" class="btn  btn-icon  btn-outline-info btn-sm">
                    <i class="fas fa-undo-alt"></i>
                  Kembali ke Dashboard</a>
                </div>              
              </div>
            </div>
          </div>          
    </div> --}}
          
  <div class="section-body">
    {{-- <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Merek / Vendor</label>
                    <div class="input-group mb-4">
                    <input type="text" name="Merek" id="Merek" class="form-control" placeholder="" aria-label="" readonly>
                    
                </div>
            </div>
            <div class="form-group">
                
                <div class="input-group mb-4">
                    <input type="hidden" name="Id" id="Id" class="form-control" placeholder="" aria-label="" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Tipe</label>
                <div class="input-group mb-4">
                    <input type="text" name="Tipe" id="Tipe" class="form-control" placeholder="" aria-label="" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Serial Number</label>
                <div class="input-group mb-4">
                    <input type="text" name="SN" id="Serialnumber" class="form-control" placeholder="" aria-label="" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="tombol-simpan" type="button">Tambah</button>
                            
                        </div>
                </div>
            </div>
        </div>
       
    </div> --}}
    <form action="{{ route('transaksi_store') }}" method="POST" class="form-chart">
        @csrf
         <!-- Lokasi -->
    <div class="row">
          <div class="col-md-12">
            <div class="section-header">
                <div class="col-md-8">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text btn-secondary text-dark text-bold ">Lokasi : </div>
                        </div>
                {{-- @foreach ($data as $no=> $datas) --}}
                    <input type="text" name="lokasi_name" id="lokasi_name"  class="form-control" placeholder="" aria-label="" readonly>
                    
                    <input type="text" name="lokasi_id" value="{{ old('lokasi_id') }}" id="lokasi_id"class="form-control" placeholder="" aria-label="" readonly>
                    {{-- @endforeach --}}
                    <input type="text" name="no_tx" id="no_tx" class="form-control" value="20203009" readonly>
                @if($errors->has('lokasi_id'))
                    <div class="error text-danger">{{ $errors->first('lokasi_id') }}</div>
                    @endif 
                </div>
              
                </div>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active">
                    <a href="/dashboard" class="btn  btn-icon  btn-outline-info btn-sm">
                    <i class="fas fa-undo-alt"></i>
                  Kembali ke Dashboard</a>
                </div>              
              </div>
            </div>
          </div>          
    </div>    
        <div class="form-row">
            <div class="form-group col-md-3">
            <label for="">Merek/Vendor</label>
                <input type="text" name="merek" id="Merek" class="form-control" placeholder="" aria-label="" readonly>
                @if($errors->has('merek'))
                    <div class="error text-danger">{{ $errors->first('merek') }}</div>
                @endif    
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Tipe</label>
                <input type="text" name="tipe" id="Tipe"class="form-control" readonly >
                 @if($errors->has('tipe'))
                    <div class="error text-danger">{{ $errors->first('tipe') }}</div>
                @endif 
            </div>
                <div class="form-group col-md-3">
                <label for="inputPassword4">Serial Number</label>
                <input type="text" name="sn" id="Serialnumber" class="form-control" readonly>
                 @if($errors->has('sn'))
                    <div class="error text-danger">{{ $errors->first('sn') }}</div>
                @endif 
                <input type="hidden" name="nama_aset" id="Nama_aset" class="form-control" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Aksi</label>
                    <button  class="form-control btn btn-success btn-icon icon-left btn-outline-info btn-sm tombol-simpan"  type="submit">Tambah</button>
                </div>
        </div>
    </form>
    <div class="card">
        <div class="card-body">
            {{-- Table transaksi--}}
            <div class="tampildata">
                <div class="table-responsive">
                        <table class="table table-striped table-sm" >
                            <thead >
                                <tr>
                                    <th style="width:5%;">No</th>
                                    <th style="width:10%;">Lokasi ID</th>
                                    <th style="width:15%;">Nama Aset</th>
                                    <th style="width:20%;">Merek / Vendor</th>
                                    <th style="width:20%;">Tipe</th>
                                    <th style="width:20%;">Serial Number</th>
                                    <th style="width:20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no=> $datas)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $datas->lokasi_id}}</td>
                                    <td>{{ $datas->nama_aset}}</td>
                                    <td>{{ $datas->merek }}</td>
                                    <td>{{ $datas->tipe }}</td>
                                    <td>{{ $datas->sn }}</td>
                                    <td>
                                        <a href="#" data-id="{{ $datas->id }}" class="badge badge-danger hapus">
                                    <form action="{{ route('transaksi_delete',$datas->id) }}" id="delete{{ $datas->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>  
                                    Hapus </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
                
        </div>
         <div class="card-footer">
            <div class="row ">
                <div class="col-md-12">
                    <button  class=" btn btn-success btn-icon icon-left btn-outline-info btn-sm tombol-simpan"  type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
{{-- Modal Lokasi --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_lokasi">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-2">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>ID</th>
                                <th>Lokasi</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokasi as $no=> $datas)
                            <tr>
                                <td>{{$no+1 }}</td>
                                <td>{{ $datas->location_id }}</td>
                                <td>{{ $datas->location_name }}</td>
                                <td>{{ $datas->alamat }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" id="pilih"
                                    data-id="{{ $datas->location_id }}"
                                    data-name="{{ $datas->location_name }}"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Cpu --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_cpu">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Cpu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cpu as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_cpu"
                                    data-id="{{ $datas->id }}"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Cpu"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Monitor --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_monitor">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Monitor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monitor as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->model }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_monitor"
                                    {{-- data-id="{{ $datas->id }}" --}}
                                    data-merek="{{ $datas->merek }}"
                                    data-model="{{ $datas->model }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Monitor"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Keyboard --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_keyboard">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Keyboard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Jenis</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keyboard as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->model }}</td>
                                <td>{{ $datas->jenis }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_keyboard"
                                    {{-- data-id="{{ $datas->id }}" --}}
                                    data-merek="{{ $datas->merek }}"
                                    data-model="{{ $datas->model }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Keyboard"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Mouse --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_mouse">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Mouse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mouse as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_mouse"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Mouse"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Printer --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_printer">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Printer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($printer as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_printer"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Printer"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Scaner --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_scaner">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Scaner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scaner as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_scaner"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Scaner"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Finger --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_finger">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Finger</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Activation Code</th>
                                <th>Verification Code</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finger as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->ac }}</td>
                                <td>{{ $datas->vc }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_finger"
                                    data-ac="{{ $datas->ac }}"
                                    data-vc="{{ $datas->vc }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Finger"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Dvr --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_dvr">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Dvr</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dvr as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_dvr"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Dvr"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Cctv --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_cctv">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Cctv</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cctv as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_cctv"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Cctv"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Webcame --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_webcame">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Webcame</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-3">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webcame as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_webcame"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Webcame"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Modem --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_modem">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Modem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modem as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_modem"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Modem"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Telpon --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_telpon">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Telpon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($telpon as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_telpon"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Telpon"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Isp --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_isp">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Isp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Provider</th>
                                <th>Nomor Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($isp as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->provider }}</td>
                                <td>{{ $datas->nomor_tlp }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_isp"
                                    data-provider="{{ $datas->provider }}"
                                    data-nomor_tlp="{{ $datas->nomor_tlp }}"
                                    data-nama_aset="Isp"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Ups --}}
<div class="modal fade " tabindex="-1" role="dialog" id="modal_ups">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Ups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%;">No</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Serial Number</th>
                                <th>Tegangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ups as $no=> $datas)
                            <tr>
                                <td style="width:5%;">{{$no+1 }}</td>
                                <td>{{ $datas->merek }}</td>
                                <td>{{ $datas->tipe }}</td>
                                <td style="width:25%;">{{ $datas->sn }}</td>
                                <td style="width:25%;">{{ $datas->tegangan }}</td>
                                <td style="width:10%;">
                                    <button class="btn btn-primary btn-sm" id="pilih_ups"
                                    data-merek="{{ $datas->merek }}"
                                    data-tipe="{{ $datas->tipe }}"
                                    data-sn="{{ $datas->sn }}"
                                    data-nama_aset="Ups"
                                    >
                                    <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/sticky-kit/dist/sticky-kit.min.js"></script>
<!-- JS Libraies -->
  <script src="{{ asset('assets/node_modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

<!-- Scrip saya -->
  <script>
        $(document).ready(function(){
            $(document).on('click','#pilih',function(){
                var location_id= $(this).data('id')
                var location_name= $(this).data('name')
                $('#lokasi_id').val(location_id);
                $('#lokasi_name').val(location_name);
                $('#modal_lokasi').modal('hide');
            })
        })
  </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_cpu',function(){
                var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Id').val(id);
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_cpu').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_monitor',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('model')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_monitor').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_keyboard',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var model= $(this).data('model')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(model);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_keyboard').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_mouse',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_mouse').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_printer',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_printer').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_scaner',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_scaner').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_finger',function(){
                // var id= $(this).data('id')
                var ac= $(this).data('ac')
                var vc= $(this).data('vc')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(ac);
                $('#Tipe').val(vc);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_finger').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_dvr',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_dvr').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_cctv',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_cctv').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_webcame',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_webcame').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_modem',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_modem').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_telpon',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_telpon').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_isp',function(){
                // var id= $(this).data('id')
                var provider= $(this).data('provider')
                var nomor_tlp= $(this).data('nomor_tlp')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(provider);
                $('#Tipe').val(nomor_tlp);
                $('#Nama_aset').val(nama_aset);
                $('#modal_isp').modal('hide');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','#pilih_ups',function(){
                // var id= $(this).data('id')
                var merek= $(this).data('merek')
                var tipe= $(this).data('tipe')
                var sn= $(this).data('sn')
                var nama_aset= $(this).data('nama_aset')
                $('#Merek').val(merek);
                $('#Tipe').val(tipe);
                $('#Serialnumber').val(sn);
                $('#Nama_aset').val(nama_aset);
                $('#modal_ups').modal('hide');
            })
        })
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $(".tombol-simpan").click(function(){
                var data = $('.form-chart').serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('transaksi_store') }}",
                    data: data,
                    success: function() {
                        $('.tampildata').load("{{ route('transaksi_create') }}");
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(".hapus").click(function(e) {
            id=e.target.dataset.id;
        Swal.fire({
            title: 'Yakin akan Dihapus?',
            text: "Data tidak bisa dikembalikan Setelah dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
            }).then((result) => {
            if (result.value) {
                $(`#delete${id}`).submit();
                }
            })
        });
    </script>
</body>
</html>
