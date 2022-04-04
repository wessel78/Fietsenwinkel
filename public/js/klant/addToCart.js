const xhr = new XMLHttpRequest();
const addToCartBtn = document.querySelector('#addToCart');

addToCartBtn.addEventListener('click', (e) => {
    e.preventDefault();
    xhr.open("POST", `../src/functions/addtocart.php?id=${addToCartBtn.getAttribute('data-id')}`);
    xhr.send();
})

