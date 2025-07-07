// Format Input
document.getElementById("no_hp").addEventListener("input", function (e) {
    this.value = this.value.replace(/[^0-9]/g, "");
});

// Validasi password
const passwordInput = document.getElementById("password");
const passwordError = document.createElement("div");
passwordError.style.color = "red";
passwordError.style.fontSize = "0.9em";
passwordError.style.marginTop = "4px";
passwordError.id = "password-error";
passwordInput.parentNode.insertBefore(passwordError, passwordInput.nextSibling);

passwordInput.addEventListener("input", function (e) {
    if (this.value.length < 8) {
        passwordError.textContent = "Password harus minimal 8 karakter.";
    } else {
        passwordError.textContent = "";
    }
});
