const uitlog_btn = document.querySelector('#uitloggen-btn');

if (uitlog_btn)
{
    uitlog_btn.addEventListener('click', (e) => {
        e.preventDefault();
        window.location = "../src/functions/uitloggen.php";
    })
}