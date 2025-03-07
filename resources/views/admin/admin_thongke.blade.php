
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Thống Kê</title>
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
                <section class="section">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thống kê doanh thu</h4>
                                </div>
                                <div class="card-body">
                                <div id="container" style="width: 100%; height: 400px;"></div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>Lợi nhuận</h4>
                                </div>
                                <div class="card-body">
                                    <div id="line" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-9" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>Trạng thái đơn thuê</h4>
                                </div>
                                <div class="card-body">
                                    <div id="order" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-9" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thống kê lượt truy cập</h4>
                                </div>
                                <div class="card-body">
                                    <div id="views" style="width: 100%; height: 400px;"></div>
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

    <script>
        // Gọi API để lấy dữ liệu
        fetch('/thongke')
            .then(response => response.json())
            .then(data => {
                
                Highcharts.chart('container', {
                    chart: {
                        type: 'column' 
                    },
                    title: {
                        text: 'Thống kê doanh thu theo tháng'
                    },
                    xAxis: {
                        categories: data.data1.categories // Tháng
                    },
                    yAxis: {
                        title: {
                            text: 'Doanh thu (VNĐ)'
                        }
                    },
                    series: [
                        {
                            name: data.data1.name,
                            data: data.data1.data
                        },
                        {
                            name: data.data2.name,
                            data: data.data2.data
                        }
                    ]
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>

    <!-- --------------------lợi nhuận-------------------------- -->
    <script>
   
    fetch('/thongke')
        .then(response => response.json())
        .then(data => {
           
            const profitData = data.loinhuan;

           
            Highcharts.chart('line', {
                chart: {
                    type: 'line' 
                },
                title: {
                    text: 'Thống kê lợi nhuận từ phí sàn theo tháng'
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
                    name: profitData.name, // "Lợi nhuận từ phí sàn"
                    data: profitData.data // Lợi nhuận theo tháng
                }],
                colors: ['#FF5733'], // Màu đường biểu đồ
                legend: {
                    enabled: true // Hiển thị chú thích
                }
            });
        })
        .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
</script>


<!-- ------------------------đơn hoàn thành và đơn hủy---------------------- -->
<script>
  
    fetch('/thongke')
        .then(response => response.json())
        .then(data => {
          
            const orderHuy = data.order_huy;
            const orderHoanThanh = data.order_hoanthanh;

           
            Highcharts.chart('order', {
                chart: {
                    type: 'pie' 
                },
                title: {
                    text: 'Tỷ lệ đơn hàng bị hủy và hoàn thành'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Tỷ lệ',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Đơn hàng bị hủy',
                            y: orderHuy, 
                            color: '#FF5733' 
                        },
                        {
                            name: 'Đơn hàng hoàn thành',
                            y: orderHoanThanh, 
                            color: '#28A745'
                        }
                    ]
                }]
            });
        })
        .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
</script>

<!-- ------------------------truy cập---------------------- -->
<script>
    fetch('/thongke')
    .then(response => response.json())
    .then(data => {
        // Lấy dữ liệu từ API, đảm bảo rằng bạn đang lấy giá trị 'views'
        const viewHome = data.view_home[0].views;
        const viewMap = data.view_map[0].views;
        const viewChat = data.view_chat[0].views;
        const viewDetail = data.view_detail[0].views;
        const viewSearch = data.view_search[0].views;
        const viewSell = data.view_ordersell[0].views;
        const viewBuy = data.view_orderbuy[0].views;

        console.log(viewHome, viewMap, viewChat, viewDetail, viewSearch, viewSell, viewBuy); // Kiểm tra dữ liệu

        Highcharts.chart('views', {
            chart: {
                type: 'pie'  // Biểu đồ tròn
            },
            title: {
                text: 'Lượt truy cập của hệ thống'
            },
            tooltip: {
                pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'  // Hiển thị tên và phần trăm
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,  // Hiển thị nhãn
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',  // Hiển thị tên và phần trăm
                        style: {
                            color: '#000000',  // Màu sắc của chữ
                            fontWeight: 'bold',
                            fontSize: '14px'
                        }
                    }
                }
            },
            series: [{
                name: 'Lượt truy cập',
                colorByPoint: true,
                data: [{
                    name: 'Trang chủ',
                    y: viewHome,
                    color: '#28c6ff'
                }, {
                    name: 'Map',
                    y: viewMap,
                    color: '#2dff28'
                }, {
                    name: 'Chat',
                    y: viewChat,
                    color: '#ffff3f'
                }, {
                    name: 'Chi tiết tin',
                    y: viewDetail,
                    color: '#FF5733'
                }
                , {
                    name: 'Tìm kiếm',
                    y: viewSearch,
                    color: '#bc37c0'
                }, {
                    name: 'Đơn thuê',
                    y: viewSell,
                    color: '#0900afb3'
                }
                , {
                    name: 'Đơn bán',
                    y: viewBuy,
                    color: '#00aaafb3'
                }]
            }]
        });
    })
    .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
</script>


</body>

</html>