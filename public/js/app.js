document.addEventListener('alpine:init', () => {
    Alpine.data('products', () => ({
        items: [
            { id_kue: 1, nama: 'Kue Nastar', gambar: 'nastar.jpg', harga: 90000},
            { id_kue: 2, nama: 'Keju', gambar: 'keju.jpg', harga: 95000},
        ],
    }));
});