
document.getElementById('btnThemVaoGioHang').addEventListener('click', function (e) {
    e.preventDefault(); // Ngăn chặn submit mặc định
    
    // Lấy giá trị từ orderForm
    const loinhan = document.querySelector('[name="loinhan"]').value;
    const ngayThue = document.querySelector('[name="ngay_thue"]').value;
    const ngayTra = document.querySelector('[name="ngay_tra"]').value;
    const totalPrice = document.querySelector('#totalPriceValue').value;
    const idTin = "{{ $detail_new->ID_TIN }}";
    const pttt = document.querySelector('[name="pptt"]').value;

    // Gán giá trị vào input ẩn trong paymentForm
    document.querySelector('#hiddenLoiNhan').value = loinhan;
    document.querySelector('#hiddenNgayThue').value = ngayThue;
    document.querySelector('#hiddenNgayTra').value = ngayTra;
    document.querySelector('#paymentTotalPriceValue').value = totalPrice;
    document.querySelector('[name="id_tin"]').value = idTin;
    document.querySelector('#hiddenPptt').value = pttt;

    // Submit form
    document.getElementById('paymentForm').submit();
});
