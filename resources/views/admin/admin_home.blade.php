<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Trang Chủ</title>
    <link rel="icon" href="images/logo2.png">
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
                <h3>Thống kê chung</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Truy cập</h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalViews }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="material-icons">person</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Thành viên</h6>
                                                <h6 class="font-extrabold mb-0">{{$countuser}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">   
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="material-icons">feed</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tin đăng</h6>
                                                <h6 class="font-extrabold mb-0">{{$countNews}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="material-icons">receipt</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tổng đơn</h6>
                                                <h6 class="font-extrabold mb-0">{{ $countOrder}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Thống kê tin đăng</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-news" style="width: 100%; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

        </div>
    </div>
    <script src="../js/admin/perfect-scrollbar.min.js"></script>
    <script src="../js/admin/bootstrap.bundle.min1.js"></script>

    <script src="../js/admin/apexcharts.js"></script>
    <script src="../js/admin/dashboard.js"></script>

    <script src="../js/admin/main1.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
       
fetch('/thongke')
    .then(response => response.json())
    .then(data => {
        // Lấy dữ liệu thống kê số lượng tin đăng
        const countNews = data.count;

       
        Highcharts.chart('chart-news', {
            chart: {
                type: 'column' // Dùng biểu đồ cột
            },
            title: {
                text: 'Thống kê số lượng tin đăng theo tháng'
            },
            xAxis: {
                categories: countNews.month, // Tháng từ API
                title: {
                    text: 'Tháng'
                }
            },
            yAxis: {
                title: {
                    text: 'Số lượng bài đăng'
                },
                allowDecimals: false
            },
            series: [{
                name: countNews.name,
                data: countNews.soluong // Số lượng bài đăng từ API
            }],
            colors: ['#058DC7'], // Màu cột
            legend: {
                enabled: false // Tắt phần chú thích nếu không cần
            }
        });
    })
    .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));

    </script>

</body>

</html>