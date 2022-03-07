const xhr = new XMLHttpRequest();
const place_review_btn = document.querySelector('#save-fiets-btn');

place_review_btn.addEventListener('click', (e) => {
    const fiets_form = document.querySelector('#add-fiets-form');
    const fiets_form_data = new FormData(fiets_form);
    e.preventDefault();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText.trim() == "success")
            {
                window.location = "beheerFietsen.php";
            }
        }
    }
    xhr.open("POST", "../src/functions/addFiets.php");
    xhr.send(fiets_form_data);
})