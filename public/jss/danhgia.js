document.addEventListener('DOMContentLoaded', function() {
  const ratingButtons = document.querySelectorAll('.confirm-button[id="show-rating-form"]'); 
  
  ratingButtons.forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const ratingForm = this.closest('.foot').querySelector('#rating-form'); 
      ratingForm.style.display = 'flex'; 
    });
  });

  
  const closeBtns = document.querySelectorAll('.close');
  closeBtns.forEach(closeBtn => {
    closeBtn.addEventListener('click', function(event) {
      event.preventDefault();
      const ratingForm = this.closest('.overlay'); 
      ratingForm.style.display = 'none'; 
    });
  });


  const backButtons = document.querySelectorAll('.btn-back');
  backButtons.forEach(backButton => {
    backButton.addEventListener('click', function(event) {
      event.preventDefault();
      const ratingForm = this.closest('.overlay'); 
      ratingForm.style.display = 'none'; 
    });
  });
});

// document.getElementById('show-rating').addEventListener('click', function() {
//   document.getElementById('rating-form').style.display = 'block';
// });


// -----------------------------------------------------------------------------------------------------------------------------------


document.addEventListener('DOMContentLoaded', function () {
  const showRatingFormBtn = document.getElementById('show-rating-form'); // Gọi nút bằng id
  const ratingForm = document.getElementById('rating-form');
  const closeBtn = document.querySelector('.close');
  const backButton = document.querySelector('.btn-back');

  if (ratingForm) {
    if (showRatingFormBtn) {
      showRatingFormBtn.addEventListener('click', function (event) {
        event.preventDefault();

        
        const idTin = this.getAttribute('data-id-tin');
        const idOrder = this.getAttribute('data-id-order');
        console.log("ID_TIN:", idTin, "ID_ORDER:", idOrder); 

       
        const idTinInput = ratingForm.querySelector('input[name="ID_TIN"]');
        const idOrderInput = ratingForm.querySelector('input[name="ID_ORDER"]');
        if (idTinInput) {
          idTinInput.value = idTin; 
        }
        if (idOrderInput) {
          idOrderInput.value = idOrder; 
        }

       
        ratingForm.style.display = 'flex';
      });
    } else {
      console.warn("Không tìm thấy nút với id 'show-rating-form'.");
    }

    // Đóng modal khi nhấn nút "Đóng"
    if (closeBtn) {
      closeBtn.addEventListener('click', function (event) {
        event.preventDefault();
        ratingForm.style.display = 'none';
      });
    }

    // Đóng modal khi nhấn nút "Trở lại"
    if (backButton) {
      backButton.addEventListener('click', function (event) {
        event.preventDefault();
        ratingForm.style.display = 'none';
      });
    }
  } else {
    console.warn("Không tìm thấy rating form.");
  }
});



// -------------------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {

  const cancelButton = document.getElementById("cancelButton"); 
  const cancelModal = document.getElementById("cancelModal"); 
  const closeModalButton = document.getElementById("closeModal");

  // Hiển thị modal khi nhấn nút Hủy
  cancelButton.addEventListener("click", function () {
    cancelModal.style.display = "flex"; // Hiển thị modal (dùng flex để căn giữa)
  });

  // Đóng modal khi nhấn nút Đóng
  closeModalButton.addEventListener("click", function () {
    cancelModal.style.display = "none"; // Ẩn modal
  });

  // Đóng modal khi nhấn bên ngoài modal
  window.addEventListener("click", function (event) {
    if (event.target === cancelModal) {
      cancelModal.style.display = "none"; // Ẩn modal
    }
  });
});




