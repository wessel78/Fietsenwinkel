const xhr = new XMLHttpRequest();
const register_btn = document.querySelector('#register-btn');

register_btn.addEventListener('click', (e) => {
    const register_form = document.querySelector('#register-form');
    const register_form_data = new FormData(register_form);
    e.preventDefault();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = this.responseText.trim();
            console.log(response)
            if (response == "success")
            {
                window.location = "inlog_pagina.php";
            }
        }
    }
    xhr.open("POST", "../src/functions/register.php");
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(register_form_data);
})
