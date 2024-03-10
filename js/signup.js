document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.signup form'),
        continueBtn = form.querySelector(".button input"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault(); // Prevent the default form submission
    }

    continueBtn.onclick = () => {
        // Create a new XMLHttpRequest object
        let xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open('POST', 'php/signup.php', true); // Change 'signup.php' to your server endpoint       

        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    let data = xhr.response;
                    if (data === "success") {
                        console.log("Registration successful");
                        location.href = "users.php";
                    } else {
                        console.error("Registration failed:", data);
                        errorText.style.display = "block";
                        errorText.textContent = data;
                    }
                } else {
                    console.error("Request failed:", xhr.status, xhr.statusText);
                    errorText.style.display = "block";
                    errorText.textContent = "An error occurred. Please try again later.";
                }
            }
        }

        xhr.onerror = () => {
            console.error("Request failed:", xhr.status, xhr.statusText);
            errorText.style.display = "block";
            errorText.textContent = "An error occurred. Please try again later.";
        }

        let formData = new FormData(form);
        xhr.send(formData);
    }
});
