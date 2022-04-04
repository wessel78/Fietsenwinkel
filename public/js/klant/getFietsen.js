const xhr = new XMLHttpRequest();
const page_content_wrapper = document.querySelector('.fietsen-wrapper');
const filter_input = document.querySelectorAll('.filter-input');
getFietsen();

filter_input.forEach(input => {
    input.addEventListener('change', () => {
        getFietsen();
    })
})


function getFietsen() {
    const filter_form = document.querySelector('#filter-form');
    const filter_form_data = new FormData(filter_form);

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            page_content_wrapper.innerHTML = "";
            let fietsen = JSON.parse(this.responseText);

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
                            <a href="fietsdetail.php?id=${fiets.product_id}">Bekijk</a>
                        </div>
                    </div>
                </div>
            `
            });

        }
    }
    xhr.open("POST", "../src/functions/getFietsen.php");
    xhr.send(filter_form_data);
}