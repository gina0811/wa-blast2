document.addEventListener('DOMContentLoaded', function () {
    console.log('Website siap digunakan!');
});

// Contoh interaksi: tampilkan alert jika tombol ditekan
const buttons = document.querySelectorAll('.btn');
buttons.forEach(button => {
    button.addEventListener('click', function () {
        alert('Tombol ditekan!');
    });
});
