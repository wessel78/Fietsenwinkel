const xhr = new XMLHttpRequest();
const reviews_wrapper = document.querySelector('.review-content-wrapper');

getReviews();

function getReviews()
{
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            reviews_wrapper.innerHTML = "";
            let reviews = JSON.parse(this.responseText);
            reviews.forEach(review => {
                reviews_wrapper.innerHTML += `
                <div class="review-body">
                    <p>Naam: <strong>${review.user_name}</strong></p>
                    <p>Titel: <strong>${review.review_title}</strong></p>
                    <p>Bericht: <strong>${review.review_body}</strong></p>

                    <button onclick='removeBlogPost(${review.review_id})' class="btn btn-secondary">Verwijderen</button>
                </div>
            `
            });

        }
    }
    xhr.open("POST", "../src/functions/beheerGetReviews.php");
    xhr.send();
}


function removeBlogPost(review_id)
{
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText)
            getReviews();

        }
    }
    xhr.open("POST", "../src/functions/removeReview.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`review-id=${review_id}`);
}