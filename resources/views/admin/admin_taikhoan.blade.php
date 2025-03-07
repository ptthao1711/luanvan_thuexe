<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_User</title>
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

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/admin"><img src="../images/logo3.png" alt="Logo" srcset=""></a>
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
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Quản lý người dùng</h3>
                            
                        </div>
                    </div>
                </div>
                <!-- Contextual classes start -->
                <section class="section">
                <div class="row">
                        <div class="col-md-9" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thống kê số lượng người dùng</h4>
                                </div>
                                <div class="card-body">
                                    <div id="users" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row" id="table-contexual">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tài khoản người dùng</h4>
                                </div>
                                <div class="card-content">
                                    <!-- table contextual / colored -->
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>MSSV</th>
                                                    <th>Email</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if(asset($alluser) && count($alluser) >0)
                                                @foreach ($alluser as $user)
                                            
                                                <tr class="table-info">
                                                    <input type="hidden" name="IDTK" value="{{$user->IDTK}}">
                                                    <td class="text-bold-500">{{$user->HOTEN}}</td>
                                                    <td>{{$user->MSSV}}</td>
                                                    <td class="text-bold-500">{{$user->EMAIL}}</td>
                                                    <td>{{$user->NGAYSINH}}</td>
                                                    <td>{{$user->DIACHI}}</td>
                                                    <td>{{$user->SDT}}</td>                                                 
                                                    <td>
                                                    <form action="{{ route('thongkeuser', $user->IDTK) }}" method="POST" >
                                                        <input type="hidden" name="IDTK" value="{{$user->IDTK}}">
                                                        <a  onclick="window.location.href='/thongke_user/{{ $user->IDTK }}';"
                                                        >Xem <i
                                                                class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                data-feather="mail"></i>
                                                        </a> 
                                                        </form>                                                      
                                                    </td>             
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr class="table-warning">
                                                    <td class="text-bold-500">Không có</td>
                                                    <td>Không có</td>
                                                    <td class="text-bold-500">Không có</td>
                                                    <td>Remote</td>
                                                    <td>Austin,Texas</td>
                                                    <td><a href="#"><i
                                                                class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                data-feather="mail"></i></a></td>
                                                </tr>

                                                @endif
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contextual classes end -->

            </div>     
        </div>
    </div>
    <script src="../js/admin/perfect-scrollbar.min.js"></script>
    <script src="../js/admin/bootstrap.bundle.min.js"></script>
    
    <script src="../js/admin/apexcharts.js"></script>
    <script src="../js/admin/dashboard.js"></script>

    <script src="../js/admin/main1.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

      <!-- --------------------số lượng người dùng-------------------------- -->

<script>
    // Gọi API để lấy dữ liệu thống kê
    fetch('/thongke')
        .then(response => response.json())
        .then(data => {
            // Lấy dữ liệu số lượng tài khoản từ API
            const userCount = data.count_tk;

            // Hiển thị biểu đồ trong <div id="chart-users">
            Highcharts.chart('users', {
                chart: {
                    type: 'line' // Sử dụng biểu đồ đường
                },
                title: {
                    text: 'Thống kê số lượng người dùng tham gia hệ thống theo tháng'
                },
                xAxis: {
                    categories: userCount.month, // Các tháng từ API
                    title: {
                        text: 'Tháng'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Số lượng người dùng'
                    },
                    allowDecimals: false
                },
                series: [{
                    name: userCount.name, // "Số lượng người dùng tham gia hệ thống"
                    data: userCount.soluong // Số lượng người dùng theo tháng
                }],
                colors: ['#28A745'], // Màu biểu đồ (màu xanh lá)
                legend: {
                    enabled: true // Hiển thị chú thích
                }
            });
        })
        .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
</script>

</body>

</html>