const beheer_fiets_btn = document.querySelector('#beheer-fiets-btn');
const beheer_review_btn = document.querySelector('#beheer-review-btn');

beheer_fiets_btn.addEventListener('click', () => {
    window.location = "beheerFietsen.php";
})

beheer_review_btn.addEventListener('click', () => {
    window.location = "beheerReview.php";
})