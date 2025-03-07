document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.stars span');
    const ratingValue = document.getElementById('rating-value');
    const ratingText = document.getElementById('rating-text');
    const mucDoInput = document.getElementById('mucdo'); // Input ẩn để lưu MUCDO

    stars.forEach(star => {
        star.addEventListener('click', function() {
            // Lấy giá trị đánh giá từ ngôi sao đã click
            const rating = this.getAttribute('data-value');
            
            // Reset tất cả các ngôi sao về màu mặc định (đen)
            stars.forEach(s => {
                s.classList.remove('active');
            });
            
            // Đổi màu các ngôi sao đến mức được click (màu vàng)
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('active');
            }

            // Hiển thị giá trị đánh giá (nếu cần)
            ratingValue.innerHTML = `${rating} sao`;

            // Cập nhật input ẩn với giá trị MUCDO
            mucDoInput.value = rating;

            // Cập nhật văn bản mô tả dựa trên số sao
            switch (rating) {
                case '1':
                    ratingText.textContent = 'Tệ';
                    break;
                case '2':
                    ratingText.textContent = 'Không hài lòng';
                    break;
                case '3':
                    ratingText.textContent = 'Bình thường';
                    break;
                case '4':
                    ratingText.textContent = 'Hài lòng';
                    break;
                case '5':
                    ratingText.textContent = 'Tuyệt vời';
                    break;
                default:
                    ratingText.textContent = '';
            }
        });
    });
});
