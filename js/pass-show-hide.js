document.addEventListener('DOMContentLoaded', () => {
    const pswrdField = document.querySelector(".form input[type='password']"),
     toggleIcon = document.querySelector(".form .bi ");

toggleIcon.onclick = () => {
    
    if (pswrdField.type === 'password') {
        pswrdField.type = "text";
        toggleIcon.classList.add("bi-eye-slash-fill");
        toggleIcon.classList.remove("bi-eye-fill");
    } else {
        pswrdField.type = "password";
        toggleIcon.classList.add("bi-eye-fill");
        toggleIcon.classList.remove("bi-eye-slash-fill");
    }
};
});
