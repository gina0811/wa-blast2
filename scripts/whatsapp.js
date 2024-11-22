// Import modul yang diperlukan
const qrcode = require('qrcode-terminal'); // Untuk generate QR Code
const { Client } = require('whatsapp-web.js'); // Import library whatsapp-web.js

// Membuat instance client WhatsApp
const client = new Client();

// Event untuk menangani QR code saat pertama kali login
client.on('qr', (qr) => {
    qrcode.generate(qr, { small: true });
    console.log('Scan QR Code dengan WhatsApp Anda');
});

// Event untuk menangani WhatsApp yang sudah siap
client.on('ready', () => {
    console.log('WhatsApp siap digunakan!');
});

// Event untuk menangani pesan yang diterima
client.on('message', (message) => {
    console.log('Pesan diterima: ', message.body);
});

// Inisialisasi WhatsApp Client
client.initialize();

// Fungsi untuk mengirim pesan WhatsApp
function sendMessage(phoneNumber, text) {
    client.sendMessage(phoneNumber + '@c.us', text)
        .then(response => {
            console.log('Pesan terkirim:', response);
        })
        .catch(err => {
            console.log('Error mengirim pesan:', err);
        });
}

// Ekspor fungsi agar bisa digunakan di luar file
module.exports = { sendMessage };
