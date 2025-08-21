let iconCart = document.querySelector('.iconCart');
let cart = document.querySelector('.cart');
let container = document.querySelector('.container');
let close = document.querySelector('.close');
let cartLink = document.querySelector('.cartLink');
let button = document.querySelector('.button1');

iconCart.addEventListener('click', ()=>{
    if(cart.style.right == '-100%'){
        cart.style.right ='0';
    }else{
        cart.style.right = '-100%';
    }
})
close.addEventListener('click', ()=>{
    cart.style.right = '-100%';
})
cartLink.addEventListener('click', function(event) {
    event.preventDefault();
});

// var cartLink = document.getElementById("cartLink");
//     cartLink.addEventListener("click", function(event) {
//         event.preventDefault();
//     });

// document.addEventListener('DOMContentLoaded', function() {
//     const cartItems = document.querySelectorAll('.item2');

//     cartItems.forEach(item => {
//         const harga = parseFloat(item.dataset.xharga);
//         const btnIncrement = item.querySelector('.btn-increment');
//         const btnDecrement = item.querySelector('.btn-decrement');
//         const quantityElement = item.querySelector('.quantity .value');
//         const priceElement = item.querySelector('.price .price-value');
//         const totalPriceElement = document.getElementById('total-price');

//         function updateTotalPrice() {
//             let totalHarga = 0;
//             document.querySelectorAll('.item2').forEach(item => {
//                 const itemQuantity = parseInt(item.querySelector('.quantity .value').textContent, 10);
//                 const itemHarga = parseFloat(item.dataset.xharga);
//                 totalHarga += itemQuantity * itemHarga;
//             });
//             totalPriceElement.textContent = 'Rp ' + totalHarga.toLocaleString('id-ID', {minimumFractionDigits: 0});
//         }

//         btnIncrement.addEventListener('click', function() {
//             let quantity = parseInt(quantityElement.textContent, 10);
//             quantity += 1;
//             quantityElement.textContent = quantity;
//             const total = quantity * harga;
//             priceElement.textContent = total.toLocaleString('id-ID', {minimumFractionDigits: 0});
//             updateTotalPrice();
//         });

//         btnDecrement.addEventListener('click', function() {
//             let quantity = parseInt(quantityElement.textContent, 10);
//             if (quantity > 1) {
//                 quantity -= 1;
//                 quantityElement.textContent = quantity;
//                 const total = quantity * harga;
//                 priceElement.textContent = total.toLocaleString('id-ID', {minimumFractionDigits: 0});
//                 updateTotalPrice();
//             }
//         });
//     });
// });
