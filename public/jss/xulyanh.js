
function previewImage(input) {
    const preview = document.getElementById('anh-preview');
    const removeButton = document.getElementById('remove-anh');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result; // Đặt src cho ảnh với base64
            preview.style.display = 'block'; // Hiển thị ảnh
            removeButton.style.display = 'block'; // Hiển thị nút xóa ảnh
        };
        reader.readAsDataURL(input.files[0]); // Đọc file dưới dạng URL
    }
}

// Xử lý khi nhấn nút "Xóa ảnh"
function removeImage() {
    const preview = document.getElementById('anh-preview');
    const input = document.getElementById('image-up');
    const removeButton = document.getElementById('remove-anh');

    preview.src = ''; // Xóa ảnh hiển thị
    preview.style.display = 'none'; // Ẩn ảnh
    removeButton.style.display = 'none'; // Ẩn nút xóa ảnh
    input.value = ''; // Reset input file
}
