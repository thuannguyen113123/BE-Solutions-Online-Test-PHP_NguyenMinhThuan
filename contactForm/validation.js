document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("contactForm")
    .addEventListener("submit", function (event) {
      const nameField = document.getElementById("inputYourName");
      const phoneField = document.getElementById("inputPhone");
      const emailField = document.getElementById("inputEmailAddress");
      const messageField = document.getElementById("inputMessage");
      const companyField = document.getElementById("inputCompany");

      const name = nameField.value.trim();
      const phone = phoneField.value.trim();
      const email = emailField.value.trim();
      const message = messageField.value.trim();
      const company = companyField.value.trim();

      let isValid = true;

      // Lặp qua các input để cập nhật lại border
      [nameField, phoneField, emailField, messageField, companyField].forEach(
        (field) => {
          field.style.border = ""; // Reset lại border nếu có
        }
      );

      // Kiểm tra các trường nào rỗng hoặc không hợp lệ, thêm viền đỏ
      if (!name) {
        nameField.style.border = "1px solid red";
        isValid = false;
      }

      if (!phone) {
        phoneField.style.border = "1px solid red";
        isValid = false;
      }

      if (!email) {
        emailField.style.border = "1px solid red";
        isValid = false;
      }

      if (!message) {
        messageField.style.border = "1px solid red";
        isValid = false;
      }

      if (!company) {
        companyField.style.border = "1px solid red";
        isValid = false;
      }

      // Kiểm tra email có hợp lệ
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        emailField.style.border = "1px solid red";
        isValid = false;
      }

      // Kiểm tra số điện thoại có hợp lệ
      const phonePattern = /^[0-9]{10}$/;
      if (!phonePattern.test(phone)) {
        phoneField.style.border = "1px solid red";
        isValid = false;
      }

      // Show modal thông báo lỗi nếu có trường không hợp lệ
      if (!isValid) {
        event.preventDefault(); // Ngăn submit nếu form không hợp lệ
        $("#errorModal").modal("show"); // Bootstrap modal popup
      }
    });
});
