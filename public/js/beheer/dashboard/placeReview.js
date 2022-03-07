const xhr = new XMLHttpRequest();
const place_review_btn = document.querySelector('#place-review');

place_review_btn.addEventListener('click', (e) => {
    const review_form = document.querySelector('#review-form');
    const review_form_data = new FormData(review_form);
    e.preventDefault();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = this.responseText.trim();
            if (response == "success") {
                window.location = "reviewSuccess.php";
            }
        }
    }
    xhr.open("POST", "../src/functions/placeReview.php");
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(review_form_data);
})