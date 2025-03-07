<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cảm Ơn</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  
        .container {  
            max-width: 600px;  
            margin: auto;  
            background: white;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 0 10px rgba(0,0,0,0.1);  
        }  
        h1 {  
            color: #333;  
        }  
        p {  
            line-height: 1.6;  
        }  
        .button {  
            display: inline-block;  
            padding: 10px 20px;  
            margin-top: 20px;  
            background-color: #28a745;  
            color: white;  
            text-decoration: none;  
            border-radius: 5px;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>Cảm ơn bạn đã lựa chọn Can Tho Rental!</h1>  
        <p>Cảm ơn bạn đã đặt thuê xe. Chúng tôi rất trân trọng sự ủng hộ của bạn!</p>  
        <a href="/home" class="button">Quay lại trang chính</a>  
    </div>  
    <!-- @if(session('success'))  
   		<div class="alert alert-success" id="success-alert">{{ session('success') }}</div>  
    @endif  
    @if(session('error'))  
        <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>  
    @endif -->
</body>  
</html>