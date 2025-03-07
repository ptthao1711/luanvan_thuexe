//----------Xử lý  hiển thông báo 3s--------------------------------------------------------------------------------
// Hàm ẩn thông báo sau 3 giây
setTimeout(function() {
    let successAlert = document.getElementById('success-alert');
    let Alertsuccess = document.getElementById('success-alert-success');
    let errorAlert = document.getElementById('error-alert');
    let priceAlert = document.getElementById('price-alert');
    
    if (successAlert) {
        successAlert.style.display = 'none';
    }
    if (Alertsuccess) {
        Alertsuccess.style.display = 'none';
    }
    
    if (errorAlert) {
        errorAlert.style.display = 'none';
    }

    if (priceAlert) {
        priceAlert.style.display = 'none';
    }
}, 4000); 