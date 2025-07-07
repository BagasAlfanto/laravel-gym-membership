document.addEventListener("DOMContentLoaded", function () {
    // --- Element references ---
    const form = document.querySelector("form");
    const noHpInput = document.getElementById("no_hp");
    const tanggalLahirInput = document.getElementById("tanggal_lahir");
    const passwordInput = document.getElementById("password");
    const confirmInput = document.getElementById("password_confirmation");
    const photoInput = document.getElementById("photoInput");
    const submitBtn = document.getElementById("submitBtn");
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const captureBtn = document.getElementById("captureBtn");
    const preview = document.getElementById("preview");
    const cameraContainer = document.getElementById("cameraContainer");
    const previewContainer = document.getElementById("previewContainer");
    const retakeBtn = document.getElementById("retakeBtn");
    const requiredInputs = document.querySelectorAll("form [required]");

    let stream = null;

    // --- Format No HP: Hanya Angka ---
    noHpInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    // --- Validasi Tanggal Lahir Tidak Melebihi Hari Ini ---
    tanggalLahirInput.addEventListener("input", function () {
        const inputDate = new Date(this.value);
        const today = new Date();
        this.setCustomValidity(inputDate > today ? "Masukan tanggal lahir dengan benar." : "");
    });

    // --- Validasi Password Minimal 8 Karakter ---
    const passwordError = document.createElement("div");
    passwordError.id = "password-error";
    passwordError.style.color = "red";
    passwordError.style.fontSize = "0.9em";
    passwordError.style.marginTop = "4px";
    passwordInput.parentNode.insertBefore(passwordError, passwordInput.nextSibling);

    function validatePasswordLength() {
        if (passwordInput.value.length < 8) {
            passwordError.textContent = "Password harus minimal 8 karakter.";
        } else {
            passwordError.textContent = "";
        }
    }

    passwordInput.addEventListener("input", validatePasswordLength);

    // --- Validasi Password dan Konfirmasi Sama ---
    function validatePasswordMatch() {
        const password = passwordInput.value;
        const confirm = confirmInput.value;

        if (confirm && password !== confirm) {
            passwordError.textContent = "Konfirmasi password tidak cocok.";
        } else if (confirm && password.length >= 8) {
            passwordError.textContent = "";
        }

        updateSubmitState();
    }

    confirmInput.addEventListener("input", validatePasswordMatch);
    passwordInput.addEventListener("input", validatePasswordMatch);

    // --- Cek Semua Input Harus Terisi dan Valid ---
    function updateSubmitState() {
        let allFilled = true;

        requiredInputs.forEach((input) => {
            if (!input.value) allFilled = false;
        });

        const passwordValid = passwordInput.value.length >= 8;
        const passwordMatch = passwordInput.value === confirmInput.value;
        const photoTaken = !!photoInput.value;

        if (allFilled && passwordValid && passwordMatch && photoTaken) {
            submitBtn.disabled = false;
            submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add("opacity-50", "cursor-not-allowed");
        }
    }

    requiredInputs.forEach((input) => {
        input.addEventListener("input", updateSubmitState);
    });

    // --- Validasi Sebelum Submit: Pastikan Foto Sudah Diambil ---
    form.addEventListener("submit", function (e) {
        if (!photoInput.value) {
            e.preventDefault();
            alert("Silakan ambil foto selfie terlebih dahulu.");
        }
    });

    // --- Fitur Kamera & Capture Selfie ---
    if (navigator.mediaDevices?.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((s) => {
                stream = s;
                video.srcObject = stream;
                video.play();
            })
            .catch((err) => {
                alert("Tidak dapat mengakses kamera: " + err);
            });
    } else {
        alert("Browser tidak mendukung akses kamera.");
    }

    captureBtn.addEventListener("click", function () {
        const aspectRatio = video.videoWidth / video.videoHeight;
        let targetWidth = 100;
        let targetHeight = 100;

        if (aspectRatio > 1) {
            targetHeight = Math.round(100 / aspectRatio);
        } else {
            targetWidth = Math.round(100 * aspectRatio);
        }

        canvas.width = targetWidth;
        canvas.height = targetHeight;
        canvas.getContext("2d").drawImage(video, 0, 0, targetWidth, targetHeight);

        const dataUrl = canvas.toDataURL("image/png");
        photoInput.value = dataUrl;
        preview.src = dataUrl;

        cameraContainer.classList.add("hidden");
        previewContainer.classList.remove("hidden");

        updateSubmitState();
    });

    retakeBtn.addEventListener("click", function () {
        previewContainer.classList.add("hidden");
        cameraContainer.classList.remove("hidden");
        photoInput.value = "";
        preview.src = "";
        updateSubmitState();
    });

    // Stop kamera saat keluar halaman
    window.addEventListener("beforeunload", function () {
        if (stream) {
            stream.getTracks().forEach((track) => track.stop());
        }
    });
});
