document.getElementById('showCalendar').addEventListener('click', function() {  
    const dateInput = document.getElementById('dateInput').value;  
    const calendarDiv = document.getElementById('calendar');  
    
    if (dateInput) {  
        const date = new Date(dateInput);  
        const options = { year: 'numeric', month: 'long', day: 'numeric' };  
        calendarDiv.textContent = date.toLocaleDateString('vi-VN', options);  
        calendarDiv.style.display = 'block';  
    } else {  
        calendarDiv.textContent = 'Vui lòng chọn ngày.';  
        calendarDiv.style.display = 'block';  
    }  
    
});
// --------------- xử lý drop down---------------------------------------------------------------------------
document.getElementById('toggleDropdown').addEventListener('click', function() {
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '' ? 'block' : 'none';
  });
  
