// document.addEventListener("DOMContentLoaded", function() {
//     const selectElement = document.getElementById("status");
//     const rentButton = document.getElementById("btnThemVaoGioHang");
//     const paymentButton = document.getElementById("btnthanhtoan");

//     // Hàm cập nhật hiển thị nút
//     function updateButtonVisibility() {
//         if (selectElement.value === "2") { // Kiểm tra giá trị là "2" dưới dạng chuỗi
//             paymentButton.style.display = "block"; // Hiển thị nút "Thanh Toán"
//             rentButton.style.display = "none";     // Ẩn nút "Yêu cầu thuê"
//         } else {
//             paymentButton.style.display = "none";  // Ẩn nút "Thanh Toán"
//             rentButton.style.display = "block";    // Hiển thị nút "Yêu cầu thuê"
//         }
//     }

//     // Gọi hàm khi trang vừa tải xong để cập nhật trạng thái nút ban đầu
//     updateButtonVisibility();

//     // Thêm sự kiện lắng nghe sự thay đổi của select
//     selectElement.addEventListener("change", updateButtonVisibility);
// });


//-----------------Xử lý nút thanh toán------------------------------------------------
    document.addEventListener("DOMContentLoaded", function() {
        const selectElement = document.getElementById("status");
        const rentButton = document.getElementById("btnThemVaoGioHang");
        const paymentButton = document.getElementById("btnthanhtoan");

        // Hiển thị nút "Thanh Toán" khi chọn đúng phương thức
        selectElement.addEventListener("change", function() {
            if (selectElement.value === "2") {
                paymentButton.style.display = "block";
                rentButton.style.display = "none";
            } else {
                paymentButton.style.display = "none";
                rentButton.style.display = "block";
            }
        });

        // Xử lý sự kiện click vào nút "Thanh Toán"
        paymentButton.addEventListener("click", function() {
            // Gửi cả hai biểu mẫu đồng thời
            document.getElementById("orderForm").submit();
            document.getElementById("paymentForm").submit();
        });
    });
