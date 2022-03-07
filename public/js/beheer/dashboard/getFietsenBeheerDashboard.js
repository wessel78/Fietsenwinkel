const xhr = new XMLHttpRequest();
const page_content_wrapper = document.querySelector('.fiets-content-wrapper');

getFietsen();

function getFietsen() {
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            page_content_wrapper.innerHTML = "";
            let fietsen = JSON.parse(this.responseText);
            console.log(fietsen)
            fietsen.forEach(fiets => {
                page_content_wrapper.innerHTML += `
                <div class="beheer-fietsen-card">
                    <div class="beheer-fietsen-card-header">
                        <img src="img/fiets_img/${fiets.product_image}" alt="Geen afbeelding gevonden">
                    </div>
                    <div class="beheer-fietsen-card-title">
                        <p>${fiets.product_title}</p>
                    </div>
                    <div class="beheer-fietsen-card-footer">
                        <div class="footer-wrapper">
                            <p>$ ${fiets.product_price}</p>
                            <a href="beheerFietsenDetailEdit.php?fiets_id=${fiets.product_id}">Edit</a>
                        </div>
                    </div>
                </div>
            `
            });

        }
    }
    xhr.open("POST", "../src/functions/beheerGetFietsen.php");
    xhr.send();
}