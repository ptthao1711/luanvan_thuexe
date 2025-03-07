<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hợp Đồng Thuê Xe</title>
    <link rel="icon" href="../images/logo2.png">
    <style>
        /* Căn chỉnh khổ giấy A4 */
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            
            font-family: Arial, sans-serif;
            margin-left: 350px;
            margin-right: 350px;
            margin-bottom: 350px;
            padding: 0;
            line-height: 1.6;
            width: 210mm;
            height: 297mm;
            padding: 20mm;
            box-sizing: border-box;

            
    
        }
        h2, h3 {
            text-align: center;
            margin: 0;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            text-decoration: underline;
        }
        .content {
            margin-left: 20px;
            text-align: justify;
        }
        .sign-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        #pdfButton {
            margin: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>

</head>
<body>
<div id="pdfContent">
@if(isset($hopdong) && count($hopdong) > 0)
@foreach($hopdong as $hd)
    <h2>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
    <h3>Độc lập - Tự do - Hạnh phúc</h3>
    <h2>HỢP ĐỒNG THUÊ XE</h2>
    <p>Số: .../HĐTX</p>
    
    <p><strong>Hôm nay, {{$hd->timepost}} , chúng tôi gồm có:</strong></p>
    
    <p class="section-title">I. BÊN CHO THUÊ XE (Bên A)</p>
    <div class="content">
        <p>Tên công ty (hoặc tên cá nhân) : {{$hd->nguoichothue_hoten}}</p>
        <p>Địa chỉ: {{$hd->nguoichothue_diachi}}</p>
        <p>Điện thoại: {{$hd->nguoichothue_sdt}}</p>
        <p>Đại diện (nếu là công ty): ...</p>
        <p>Số CMND/CCCD/Hộ chiếu: {{$hd->nguoichothue_cccd}}</p>
        <p>Ngày cấp: ...; Nơi cấp: ...</p>
    </div>

    <p class="section-title">II. BÊN THUÊ XE (Bên B)</p>
    <div class="content">
        <p>Tên công ty (hoặc tên cá nhân): {{$hd->nguoithue_hoten}}</p>
        <p>Địa chỉ: {{$hd->nguoithue_diachi}} </p>
        <p>Điện thoại: {{$hd->nguoithue_sdt}}</p>
        <p>Đại diện (nếu là công ty): ...</p>
        <p>Số CMND/CCCD/Hộ chiếu: {{$hd->nguoithue_cccd}}</p>
        <p>Ngày cấp: ...; Nơi cấp: ...</p>
    </div>

    <p class="section-title">III. NỘI DUNG HỢP ĐỒNG</p>
    <div class="content">
        <p><strong>1. Đối tượng hợp đồng</strong></p>
        <p>Bên A đồng ý cho Bên B thuê xe với các thông tin sau:</p>
        <ul>
            <li>Loại xe: {{$hd->TEN_LOAI}}</li>
            <li>Biển số: {{$hd->BIENSO}}</li>
            <li>Tên Xe: {{$hd->TENXE}}</li>
            <li>Màu xe: {{$hd->MAUXE}}</li>
        </ul>

        <p><strong>2. Thời hạn thuê</strong></p>
        <p>Thời gian thuê từ ngày {{$hd->TGTHUE}} đến ngày {{$hd->TGTRA}} theo thời gian yêu cầu của bên B.</p>

        <p><strong>3. Giá thuê và phương thức thanh toán</strong></p>
        <p>Giá thuê xe: {{$hd->PRICE}} VNĐ/ngày (theo giá của bài đăng).</p>
        <p>Phương thức thanh toán: {{$hd->TEN_PPTT}}</p>
        <p>Hình thức thanh toán: Chuyển khoản/tiền mặt.</p>

        <p><strong>4. Trách nhiệm của Bên B</strong></p>
        <p>- Sử dụng xe đúng mục đích, bảo quản xe trong tình trạng tốt.</p>
        <p>- Không sử dụng xe để vận chuyển hàng hóa cấm hoặc thực hiện hành vi trái pháp luật.</p>
        <p>- Chịu trách nhiệm sửa chữa nếu xe bị hư hỏng do lỗi của Bên B trong quá trình sử dụng.</p>

        <p><strong>5. Trách nhiệm của Bên A</strong></p>
        <p>- Giao xe đúng loại và tình trạng đã thỏa thuận.</p>
        <p>- Cung cấp các giấy tờ pháp lý liên quan đến xe.</p>
        <p>- Bảo hiểm xe (nếu có) trong thời gian thuê.</p>

        <p><strong>6. Điều khoản chấm dứt hợp đồng</strong></p>
        <p>Hợp đồng có thể chấm dứt khi:</p>
        <ul>
            <li>Hết thời hạn thuê.</li>
            <li>Một trong hai bên vi phạm điều khoản hợp đồng.</li>
        </ul>

        <p><strong>7. Giải quyết tranh chấp</strong></p>
        <p>Mọi tranh chấp phát sinh từ hợp đồng sẽ được hai bên thương lượng giải quyết. Nếu không đạt được thỏa thuận, tranh chấp sẽ được đưa ra Tòa án có thẩm quyền.</p>
    </div>

    <p class="section-title">IV. ĐIỀU KHOẢN CHUNG</p>
    <div class="content">
        <p>Hợp đồng có hiệu lực từ ngày ký và được lập thành 2 bản, mỗi bên giữ 1 bản.</p>
        <p>Hai bên đã đọc và hiểu rõ các điều khoản trong hợp đồng, cam kết thực hiện đúng các điều khoản đã nêu.</p>
    </div>

    <div class="sign-section">
        <div>
            <p><strong>ĐẠI DIỆN BÊN A</strong></p>
            <p>(Ký tên, đóng dấu nếu có)</p>
        </div>
        <div>
            <p><strong>ĐẠI DIỆN BÊN B</strong></p>
            <p>(Ký tên, đóng dấu nếu có)</p>
        </div>
    </div>
    @endforeach
    @else
    <p>Không có dữ liệu hợp đồng.</p>
    @endif
</div>
<button id="pdfButton">Xuất hợp đồng</button>

<!-- script in file PDF -->
<script>
document.getElementById('pdfButton').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF('p', 'pt', 'a4');

    html2canvas(document.getElementById('pdfContent')).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        
        // A4 size in pt
        const imgWidth = 595.28; // Chiều rộng A4 (595.28pt)
        const imgHeight = (canvas.height * imgWidth) / canvas.width; // Tính chiều cao tương ứng với chiều rộng

        // Thêm margin hai bên
        const margin = 40; // Khoảng cách từ lề hai bên
        const widthWithMargins = imgWidth - 2 * margin; // Chiều rộng ảnh đã có lề
        const pageHeight = 841.89; // Chiều cao A4 (841.89pt)
        
        // Tính lại chiều cao của ảnh sau khi có margin
        const heightLeft = (canvas.height * widthWithMargins) / canvas.width;

        let position = 0;

        // Thêm ảnh vào PDF với margin
        pdf.addImage(imgData, 'PNG', margin, position, widthWithMargins, heightLeft);
        let heightRemaining = heightLeft - pageHeight;

        while (heightRemaining >= 0) {
            position = heightRemaining - heightLeft;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', margin, position, widthWithMargins, heightLeft);
            heightRemaining -= pageHeight;
        }
        
        // Lưu file PDF
        pdf.save('HopDongThueXe.pdf');
    });
});
</script>


</body>
</html>
