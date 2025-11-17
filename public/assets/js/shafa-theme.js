
/**
 * Shafa Theme Configuration
 * Script untuk menerapkan tema warna Shafa ke sistem admin
 */

document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk menerapkan tema Shafa ke elemen-elemen tertentu
    function applyShafaTheme() {
        // Terapkan tema ke navbar
        const navbar = document.querySelector('.navbar.navbar-primary');
        if (navbar) {
            navbar.classList.add('navbar-shafa');
        }

        // Terapkan tema ke sidebar
        const sidebar = document.querySelector('.left-sidebar');
        if (sidebar) {
            sidebar.classList.add('sidebar-shafa');
        }

        // Terapkan warna primary ke tombol-tombol utama
        const primaryButtons = document.querySelectorAll('.btn-primary');
        primaryButtons.forEach(button => {
            button.classList.add('btn-shafa-primary');
        });

        // Terapkan warna secondary ke tombol-tombol sekunder
        const secondaryButtons = document.querySelectorAll('.btn-secondary');
        secondaryButtons.forEach(button => {
            button.classList.add('btn-shafa-secondary');
        });

        // Terapkan tema ke card-card
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.classList.add('card-shafa');
        });

        // Terapkan tema ke tabel
        const tables = document.querySelectorAll('.table');
        tables.forEach(table => {
            table.classList.add('table-shafa');
        });
    }

    // Fungsi untuk mengganti tema
    function toggleTheme(themeName) {
        // Hapus semua tema sebelumnya
        document.body.classList.remove('theme-shafa', 'theme-default');

        // Tambahkan tema yang dipilih
        document.body.classList.add(`theme-${themeName}`);

        // Simpan tema yang dipilih ke localStorage
        localStorage.setItem('selectedTheme', themeName);
    }

    // Fungsi untuk memuat tema yang disimpan
    function loadSavedTheme() {
        const savedTheme = localStorage.getItem('selectedTheme');
        if (savedTheme) {
            toggleTheme(savedTheme);
        } else {
            // Gunakan tema Shafa sebagai default
            toggleTheme('shafa');
        }
    }

    // Jalankan fungsi saat halaman dimuat
    applyShafaTheme();
    loadSavedTheme();

    // Tambahkan event listener untuk tombol ganti tema jika ada
    const themeToggleButtons = document.querySelectorAll('[data-theme-toggle]');
    themeToggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const themeName = this.getAttribute('data-theme-toggle');
            toggleTheme(themeName);
        });
    });
});

// Fungsi untuk mengganti tema dari luar (misalnya dari dropdown menu)
function setShafaTheme() {
    document.body.classList.remove('theme-default', 'theme-dark', 'theme-blue');
    document.body.classList.add('theme-shafa');
    localStorage.setItem('selectedTheme', 'shafa');

    // Update warna-warna CSS custom property
    document.documentElement.style.setProperty('--shafa-primary', '#7A0000');
    document.documentElement.style.setProperty('--shafa-secondary', '#FF9A00');
    document.documentElement.style.setProperty('--shafa-dark-text', '#0F1011');
    document.documentElement.style.setProperty('--shafa-bg-hero', '#8A1515');
}

// Fungsi untuk mengganti warna header navbar
function updateNavbarColors() {
    const navbar = document.querySelector('.main-header .navbar');
    if (navbar) {
        navbar.style.backgroundColor = 'var(--shafa-primary)';
        navbar.style.borderColor = 'transparent';
    }
}

// Panggil fungsi saat window load untuk memastikan semua elemen telah dimuat
window.addEventListener('load', function () {
    updateNavbarColors();
});
