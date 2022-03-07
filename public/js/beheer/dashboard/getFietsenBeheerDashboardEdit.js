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
                
            });

        }
    }
    xhr.open("POST", "../src/functions/beheerGetFietsenEdit.php");
    xhr.send();
}