<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Thống Kê - Người Dùng</title>
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
                <h3>Thống kê chung</h3>
            </div>
            <div class="col-12 col-lg-3">
                        <div class="card" style="width: 150%;">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{asset($taikhoan->avt)}}" style=" margin-left: -50px;" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{$taikhoan->HOTEN}}</h5>
                                        <h6 class="text-muted mb-0">{{$taikhoan->EMAIL}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <div class="stats-icon blue">
                                                    <i class="material-icons">person</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tin đăng</h6>
                                                <h6 class="font-extrabold mb-0">{{$tin}}</h6>
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
                                                <h6 class="text-muted font-semibold">Tổng đơn</h6>
                                                <h6 class="font-extrabold mb-0">{{$counthoanthanh}}/{{$order}} Hoàn thành</h6>
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
                                                <h6 class="text-muted font-semibold">Doanh thu</h6>
                                                <h6 class="font-extrabold mb-0"> {{number_format($revenue)}}/VNĐ</h6>
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
                                                <div class="stats-icon purple">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Số dư</h6>
                                                <h6 class="font-extrabold mb-0">{{number_format($sodu->SODU)}}/VNĐ</h6>
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
                                                <div class="stats-icon purple">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Nợ sàn</h6>
                                                <h6 class="font-extrabold mb-0">{{number_format($sodu->NOSAN)}}/VNĐ</h6>
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
                                        <h4>Thống doanh thu</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="line" style="width: 100%; height: 400px;"></div>
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
    <script src="https://code.highcharts.com/modules/exporting.js"></script>


     <!-- --------------------lợi nhuận-------------------------- -->
    <script>
        const url = window.location.pathname;
        const IDTK = url.split('/').pop();
   
   fetch(`/user_thongke/${IDTK}`)
       .then(response => response.json())
       .then(data => {
          
           const profitData = data.ln;
           const ONLData = data.lnonl;
           const livedata = data.lnlive;

          
           Highcharts.chart('line', {
               chart: {
                   type: 'line' 
               },
               title: {
                   text: 'Thống kê doanh thu theo tháng'
               },
               xAxis: {
                   categories: profitData.categories, 
                   title: {
                       text: 'Tháng'
                   }
               },
               yAxis: {
                   title: {
                       text: 'Lợi nhuận (VNĐ)'
                   },
                   allowDecimals: true
               },
               series: [{
                   name: profitData.name, 
                   data: profitData.data 
               }, {
                    name: ONLData.name, 
                    data: ONLData.data, 
                    color: '#33FF57' 
                }
                , {
                    name: livedata.name, 
                    data: livedata.data, 
                    color: '#f6ff4b' 
                }
            ],
               colors: ['#FF5733'], 
               legend: {
                   enabled: true
               }
           });
       })
       .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
</script>


  
</body>

</html>