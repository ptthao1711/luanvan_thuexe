<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;
use Session; 

class PaymentController extends Controller{
    public function createPayment(Request $request)
    {

    $totalAmount = $request->input('total_price');
    $idTK = Session::get('IDTK');
    $id_tin = $request->input('id_tin');
    $loinhan = $request->tinnhan;
    $tgthue = $request->ngaythue;
    $tgtra = $request->ngaytra;
    $pttt = $request->pttt;


    $orderId = DB::table('orders')->insertGetId([
        'IDTK' => $idTK,
        'ID_TIN' => $id_tin,
        'LOINHAN' => $loinhan,
        'TGTHUE' => $tgthue,
        'TGTRA' => $tgtra,
        'TOTAL' => $totalAmount,
        'ID_PTTT' => $pttt,
        'ttgiaodich' => 'chưa thanh toán',
        'timepost' => now(),  
    ]);
    
    $totalAmount = $request->input('total_price'); 
    //dd($totalAmount);
    $inputData = $request->all();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('payment.return');
    $vnp_TmnCode = "P1VQ7SG2";
    $vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; 
    
    $vnp_TxnRef = $orderId; 
    $vnp_OrderInfo = "Thanh toán hóa đơn";
    $vnp_OrderType = "Can Tho Rental";
    $vnp_Amount = $totalAmount * 100;
    $vnp_Locale = "VN";
    $vnp_BankCode = "NCB";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
  
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        
    );
    //dd($inputData);
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        return redirect()->away($vnp_Url);

}

public function paymentReturn(Request $request)
{
    $vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; 
    $inputData = $request->all();
    //$inputData = $request->except(['vnp_SecureHashType', 'vnp_SecureHash']); 
    //dd($inputData);

   
    $vnpSecureHash = $inputData['vnp_SecureHash']?? null;
    if (!$vnpSecureHash) {
        return redirect()->route('thanks')->with('error', 'Không có khóa SecureHash trong dữ liệu nhận được!');
    }
    
    unset($inputData['vnp_SecureHash']); 
    ksort($inputData); 

    $hashData = urldecode(http_build_query($inputData));
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    \Log::info('Payment Debug:', [
        'inputData' => $inputData,
        'hashData' => $hashData,
        'secureHash' => $secureHash,
        'vnpSecureHash' => $vnpSecureHash,
    ]);

    // 
    // if ($secureHash !== $vnpSecureHash) {
    //     return redirect()->route('thanks')->with('error', 'Dữ liệu không hợp lệ!');
    // }

   
    if ($inputData['vnp_ResponseCode'] === '00') {
       
      
        $totalAmount = $inputData['vnp_Amount'] / 100; 
       
        $paymentTransactionID = $inputData['vnp_TransactionNo']; 

   
        $result=DB::table('orders')->where('ID_ORDER', $inputData['vnp_TxnRef'])->update(['ttgiaodich' => 'thành công']);
    
        if ($result) {
            // Gửi email xác nhận
            $email = Session::get('EMAIL');
            Mail::raw(
                "Cảm ơn bạn đã thuê xe tại CTRent.
                Đơn thuê xe của bạn đã được xác nhận.
                Mã giao dịch: " . $paymentTransactionID . "
                Tổng số tiền: " . number_format($totalAmount, 0, ',', '.') . " VNĐ.",
                function ($message) use ($email) {
                    $message->to($email)->subject('Xác nhận thanh toán thành công');
                }
            );
            
    
            return redirect()->route('thanks')->with('success', 'Thanh toán thành công và đơn hàng đã được lưu!');
        } else {
            return redirect()->route('thanks')->with('error', 'Thanh toán thành công và chờ cập nhật trạng thái!');
        }
    } else {
        return redirect()->route('thanks')->with('error', 'Thanh toán không thành công!');
    }

}



     
//----------------------------------------------------------------------------------------------------------------------------------

public function Payment(Request $request)
    {


    $idTK = Session::get('IDTK');
    $totalAmount = $request->input('total_price'); 
    $giaodich = DB::table('giaodich')
    ->where('IDTK',$idTK)
    ->update([
        'NOSAN' => 0,
        
    ]);
    $result=DB::table('lichsuthanhtoan')
        ->insert(['time' => now(),
        'IDTK' =>$idTK,
        'TIEN' => $totalAmount,
        'trangthai'=> 'trừ',
    
    ]);
    
    
    //dd($totalAmount);
    $inputData = $request->all();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('return');
    $vnp_TmnCode = "P1VQ7SG2";//Mã website tại VNPAY 
    $vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; //Chuỗi bí mật
    
    $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
    $vnp_OrderInfo = "Thanh toán hóa đơn";
    $vnp_OrderType = "Can Tho Rental";
    $vnp_Amount = $totalAmount * 100;
    $vnp_Locale = "VN";
    $vnp_BankCode = "NCB";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
  
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        
    );
    //dd($inputData);
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        return redirect()->away($vnp_Url);

}

public function Return(Request $request)
{
    $vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; // Chuỗi bí mật
    $inputData = $request->all();
    //$inputData = $request->except(['vnp_SecureHashType', 'vnp_SecureHash']); // Bỏ qua các trường không cần thiết
    //dd($inputData);

    // Lấy SecureHash từ VNPay
    $vnpSecureHash = $inputData['vnp_SecureHash']?? null;
    if (!$vnpSecureHash) {
        return redirect()->route('thanks')->with('error', 'Không có khóa SecureHash trong dữ liệu nhận được!');
    }
    
    unset($inputData['vnp_SecureHash']); // Loại bỏ để tính lại chữ ký
    ksort($inputData); // Sắp xếp tham số theo thứ tự từ điển

    $hashData = urldecode(http_build_query($inputData));
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    \Log::info('Payment Debug:', [
        'inputData' => $inputData,
        'hashData' => $hashData,
        'secureHash' => $secureHash,
        'vnpSecureHash' => $vnpSecureHash,
    ]);

    // //So sánh chữ ký
    // if ($secureHash !== $vnpSecureHash) {
    //     return redirect()->route('thanks')->with('error', 'Dữ liệu không hợp lệ!');
    // }

    // Kiểm tra trạng thái thanh toán
    if ($inputData['vnp_ResponseCode'] === '00') {
       
         // Mã tin tức hoặc sản phẩm từ yêu cầu
        $totalAmount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán (VNPay trả về số tiền * 100)
        //$orderInfo = $inputData['vnp_OrderInfo']; // Thông tin đơn hàng
        $paymentTransactionID = $inputData['vnp_TransactionNo']; // Mã giao dịch VNPay

    
            $email = Session::get('EMAIL');
            Mail::raw(
                "Thanh toán thành công!
                Thanh toán nợ sàn thành công.
                Mã giao dịch: " . $paymentTransactionID . "
                Tổng số tiền: " . number_format($totalAmount, 0, ',', '.') . " VNĐ.",
                function ($message) use ($email) {
                    $message->to($email)->subject('Xác nhận thanh toán thành công');
                }
            );
        
            return redirect()->route('thanks')->with('error', 'Thanh toán phí nợ sàn thành công!');
        }
        else {
            return redirect()->route('thanks')->with('error', 'Thanh toán không thành công!');
    } 
    }




    //----------------------------------------------------------------------------------------------------------------------------------

public function PaymentCreate(Request $request)
{


$idTK =  $request->input('IDTK');
$totalAmount = $request->input('total_price'); 
$tien = $request->input('sodu');

$SODU = $tien - $totalAmount;

$giaodich = DB::table('giaodich')
->where('IDTK',$idTK)
->update([
    'SODU' => $SODU,
    
]);
$result=DB::table('lichsuthanhtoan')
    ->insert(['time' => now(),
    'IDTK' =>$idTK,
    'TIEN' => $totalAmount,
    'trangthai'=> 'cộng',

]);

$update = DB::table('thongtintaikhoan')
->where('IDTK',$idTK)
->update(['trangthai'=>2]);

$MAIL = $request->input('EMAIL');
session(['email' => $MAIL]); // Lưu EMAIL vào Session


//dd($totalAmount);
$inputData = $request->all();
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = route('return.payment');
$vnp_TmnCode = "P1VQ7SG2";//Mã website tại VNPAY 
$vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; //Chuỗi bí mật

$vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
$vnp_OrderInfo = "Thanh toán hóa đơn";
$vnp_OrderType = "Can Tho Rental";
$vnp_Amount = $totalAmount * 100;
$vnp_Locale = "VN";
$vnp_BankCode = "NCB";
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];



//Add Params of 2.0.1 Version

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_Bill_Email"=>$request->input('EMAIL'),
    
    
);
//dd($inputData);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
    return redirect()->away($vnp_Url);

}

public function ReturnPayment(Request $request)
{
$vnp_HashSecret = "0RO1CD3UZXHFIMU78ACBMFZ4EJZFB4XF"; // Chuỗi bí mật
$inputData = $request->all();
//$inputData = $request->except(['vnp_SecureHashType', 'vnp_SecureHash']); // Bỏ qua các trường không cần thiết
//dd($inputData);

// Lấy SecureHash từ VNPay
$vnpSecureHash = $inputData['vnp_SecureHash']?? null;
if (!$vnpSecureHash) {
    return redirect()->route('thanks')->with('error', 'Không có khóa SecureHash trong dữ liệu nhận được!');
}

unset($inputData['vnp_SecureHash']); // Loại bỏ để tính lại chữ ký
ksort($inputData); // Sắp xếp tham số theo thứ tự từ điển

$hashData = urldecode(http_build_query($inputData));
$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
\Log::info('Payment Debug:', [
    'inputData' => $inputData,
    'hashData' => $hashData,
    'secureHash' => $secureHash,
    'vnpSecureHash' => $vnpSecureHash,
]);

// //So sánh chữ ký
// if ($secureHash !== $vnpSecureHash) {
//     return redirect()->route('thanks')->with('error', 'Dữ liệu không hợp lệ!');
// }

// Kiểm tra trạng thái thanh toán
if ($inputData['vnp_ResponseCode'] === '00') {
   
    
   

    $email = session('email'); 

    $totalAmount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán (VNPay trả về số tiền * 100)
    //$orderInfo = $inputData['vnp_OrderInfo']; // Thông tin đơn hàng
    $paymentTransactionID = $inputData['vnp_TransactionNo']; // Mã giao dịch VNPay
    
    

        Mail::raw(
            "Yêu cầu thanh toán thành công!
            Yêu cầu rút tiền thành công.
            Mã giao dịch: " . $paymentTransactionID . "
            Đã rút thành công số tiền : " . number_format($totalAmount, 0, ',', '.') . " VNĐ.",
            function ($message) use ($email) {
                $message->to($email)->subject('Xác nhận thanh toán thành công');
            }
        );
    
        return redirect()->route('thanks')->with('error', 'Thanh toán yêu cầu rút tiền thành công!');
    }
    else {
        return redirect()->route('thanks')->with('error', 'Thanh toán yêu cầu rút tiền không thành công!');
} 
}

}



