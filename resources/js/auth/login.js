document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("no_hp");
    const passwordInput = document.getElementById("password");
    const loginButton = document.getElementById("loginBtn");

    // Tambah pesan error untuk password
    let passwordError = document.getElementById("password-error");
    if (!passwordError) {
        passwordError = document.createElement("div");
        passwordError.id = "password-error";
        passwordError.style.color = "red";
        passwordError.style.fontSize = "0.9em";
        passwordError.style.marginTop = "4px";
        passwordInput.parentNode.insertBefore(
            passwordError,
            passwordInput.nextSibling
        );
    }

    let passwordTouched = false; // status apakah user sudah menyentuh field password

    function validateForm() {
        const phoneValue = phoneInput.value.trim();
        const passwordValue = passwordInput.value;

        const isPhoneValid =
            /^[0-9]+$/.test(phoneValue) && phoneValue.length > 0;
        const isPasswordValid = passwordValue.length >= 8;

        // Tampilkan pesan error hanya jika user sudah mengetik
        if (passwordTouched && !isPasswordValid) {
            passwordError.textContent = "Password harus minimal 8 karakter.";
        } else {
            passwordError.textContent = "";
        }

        const isFormValid = isPhoneValid && isPasswordValid;

        // Atur tombol login
        loginButton.disabled = !isFormValid;
        if (isFormValid) {
            loginButton.classList.remove("opacity-50", "cursor-not-allowed");
        } else {
            loginButton.classList.add("opacity-50", "cursor-not-allowed");
        }
    }

    phoneInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
        validateForm();
    });

    passwordInput.addEventListener("input", function () {
        passwordTouched = true;
        validateForm();
    });

    // Inisialisasi awal
    validateForm();
});
