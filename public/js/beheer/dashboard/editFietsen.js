const xhr = new XMLHttpRequest();
const place_review_btn = document.querySelector('#save-fiets-btn');

place_review_btn.addEventListener('click', (e) => {
    const fiets_form = document.querySelector('#edit-fiets-form');
    const fiets_form_data = new FormData(fiets_form);
    fiets_form_data.append('product_id', );
    e.preventDefault();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        }
    }
    xhr.open("POST", "../src/functions/editFiets.php");
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(fiets_form_data);
})