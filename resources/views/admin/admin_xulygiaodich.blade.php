<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Giao Dịch</title>
    <link rel="icon" href="../images/logo2.png">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/admin/bootstrap.css">

    <link rel="stylesheet" href="../css/admin/bold.css">

    <link rel="stylesheet" href="../css/admin/perfect-scrollbar.css">
    <link rel="stylesheet" href="../css/admin/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/order.css" />

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/admin"><img style="height: auto; width: 50%;" src="../images/logo3.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }} ">
                            <a href="{{URL::to('/admin')}}" class='sidebar-link'>
                                <i class="material-icons">dashboard</i>
                                <span>Trang Chủ</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_news') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_news')}}" class='sidebar-link'>
                                <i class="material-icons">description</i>
                                <span>Quản lý tin</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_taikhoan') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_taikhoan')}}" class='sidebar-link'>
                                <i class="material-icons">account_circle</i>
                                <span>Quản lý tài khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_giaodich') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_giaodich')}}" class='sidebar-link'>
                                <i class="material-icons">paid</i>
                                <span>Giao dịch</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin_thongke') ? 'active' : '' }}">
                            <a href="{{URL::to('/admin_thongke')}}" class='sidebar-link'>
                                <i class="material-icons">equalizer</i>
                                <span>Thống kê</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            
                <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Xử lý giao dịch</h3>
                            
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Giao dịch chờ xử lí!
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Tên Tài Khoản</th>
                                        <th>Ngân Hàng</th>
                                        <th>Số Tài Khoản</th>
                                        <th>Họ Tên </th>
                                        <th>Số Tiền Rút</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>

                                @if(isset($tabletaichinh) && count($tabletaichinh) >0)
                                @foreach ($tabletaichinh as $table)
                                <tbody>
                                    <tr onclick="window.location.href='/thongke_user/{{ $table->IDTK }}';">
                                    
                                        <td>{{$table->HOTEN}}</td>
                                        <td>{{$table->BANK}}</td>
                                        <td>{{$table->STK}}</td>
                                        <td>{{$table->NAME}}</td>
                                        <td>{{$table->MONEY}}</td>
                                        <form action="{{ route('create.payment') }}" method="POST"  >
                                        @csrf
                                        <td>
                                        <input type="hidden" name="EMAIL" value="{{$table->EMAIL}}">
                                        <input type="hidden" name="IDTK" value="{{$table->IDTK}}">
                                        <input type="hidden" name="sodu" value="{{$table->SODU}}">
                                        <input type="hidden" name="total_price" value="{{$table->MONEY}}">
                                        <input type="hidden" name="MA" value="{{$table->MA}}">
                                            <button class="badge bg-success">Thanh toán</button>
                                        </td>
                                        </form>
                                       
                                        <form action="{{ route('delete.tk') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="MA" value="{{$table->MA}}">
                                        <td>
                                            <button class="badge bg-danger">Từ chối</button>
                                        </td>

                                        </form>
                                    </tr>
                                    
                                </tbody>
                                @endforeach
                                @else
                                <p>Không có giao dịch</p>
                                @endif
                                @if(session('success'))  
                                    <div class="success" id="success-alert">{{ session('success') }}</div>  
                                @endif  
                            </table>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    </body>
    <script src="../js/admin/perfect-scrollbar.min.js"></script>
    <script src="../js/admin/bootstrap.bundle.min.js"></script>
    
    <script src="../js/admin/apexcharts.js"></script>
    <script src="../js/admin/dashboard.js"></script>

    <script src="../js/admin/main1.js"></script>

   

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
