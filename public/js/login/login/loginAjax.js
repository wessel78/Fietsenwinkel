const xhr = new XMLHttpRequest();
const register_btn = document.querySelector('#login-btn');

register_btn.addEventListener('click', (e) => {
    const login_form = document.querySelector('#login-form');
    const login_form_data = new FormData(login_form);
    e.preventDefault();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText)
            let response = this.responseText.trim();
            if (response == "success") {
                window.location = "index.php";
            }
        }
    }
    xhr.open("POST", "../src/functions/login.php");
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(login_form_data);
})
