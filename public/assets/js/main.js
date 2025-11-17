document.addEventListener('DOMContentLoaded', () => {
    
    // =======================================================
    // 1. LOGIKA FLOATING WHATSAPP BUTTON (CS TOGGLE)
    // Digunakan di seluruh halaman (index.html, about.html, dll.)
    // =======================================================
    
    const whatsappToggleBtn = document.getElementById('whatsapp-toggle-btn');
    const csButtonsGroup = document.getElementById('cs-buttons-group');
    const whatsappIcon = document.getElementById('whatsapp-icon');

    if (whatsappToggleBtn && csButtonsGroup && whatsappIcon) {
        whatsappToggleBtn.addEventListener('click', () => {
            // Toggle visibility dari grup tombol CS
            csButtonsGroup.classList.toggle('hidden');

            // Mengubah ikon panah (ke atas menjadi ke bawah, atau sebaliknya)
            if (csButtonsGroup.classList.contains('hidden')) {
                whatsappIcon.classList.remove('fa-chevron-down');
                whatsappIcon.classList.add('fa-chevron-up');
            } else {
                whatsappIcon.classList.remove('fa-chevron-up');
                whatsappIcon.classList.add('fa-chevron-down');
            }
        });
    }

    // Toggle menu mobile
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    });



    // =======================================================
    // 2. LOGIKA FORM REQUEST KE GOOGLE SHEETS
    // =======================================================

    document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Definisikan Element dan URL (URL Anda sudah benar)
    const requestForm = document.getElementById('submit-request-form');
    const formStatus = document.getElementById('form-status');
    const submitButton = document.getElementById('submit-request');
    
    // PASTI BACA: GANTI URL DI BAWAH DENGAN WEB APP URL GOOGLE APPS SCRIPT ANDA
    const SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzgxrVZo6FfjxV2msqtjij64wfcQEyjzbxZoqRgeX6vUZLPzw1XdXULyz2KvcQ1W2Tf/exec'; 

    // 2. Logika Form Submission hanya dieksekusi jika form ditemukan
    if (requestForm) {
        requestForm.addEventListener('submit', async function(event) {
            event.preventDefault(); 
            
            // Tampilkan status loading
            formStatus.classList.remove('hidden', 'text-shafa-red', 'text-green-600');
            formStatus.classList.add('text-shafa-primary');
            formStatus.textContent = 'Sedang mengirim data...';
            submitButton.disabled = true;

            const formData = new FormData(requestForm);
            const data = {};
            
            // Ambil data dan tambahkan kolom 'Tanggal'
            formData.forEach((value, key) => (data[key] = value));
            data['Tanggal'] = new Date().toLocaleString(); 

            try {
                // KIRIM DATA KE GOOGLE APPS SCRIPT
                const response = await fetch(SCRIPT_URL, {
                    method: 'POST',
                    mode: 'no-cors', // Penting untuk Apps Script
                    cache: 'no-cache',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });

                // Asumsikan sukses karena menggunakan no-cors
                formStatus.classList.remove('text-shafa-primary');
                formStatus.classList.add('text-green-600');
                formStatus.textContent = '✅ Permintaan Berhasil Dikirim! Tim kami akan segera menghubungi Anda.';
                requestForm.reset(); 

            } catch (error) {
                // Tampilkan error jika ada masalah jaringan
                formStatus.classList.remove('text-shafa-primary');
                formStatus.classList.add('text-shafa-red');
                formStatus.textContent = '❌ Gagal mengirim permintaan. Silakan coba lagi atau hubungi CS langsung.';
                console.error('Error submitting form:', error);
            } finally {
                submitButton.disabled = false;
            }
        });
    }
});


    // =======================================================
    // 3. LOGIKA AKTIF NAVIGASI (Opsional: untuk memberikan highlight pada menu yang sedang dikunjungi)
    // =======================================================

    const navLinks = document.querySelectorAll('header nav ul a');
    const currentPath = window.location.pathname.split('/').pop() || 'index.html'; // Ambil nama file saat ini

    navLinks.forEach(link => {
        // Hapus kelas aktif/border default
        link.classList.remove('border-b-2', 'border-shafa-secondary');
        
        // Cek jika link href cocok dengan halaman saat ini
        const linkPath = link.getAttribute('href').split('/').pop() || 'index.html';
        if (linkPath === currentPath) {
            link.classList.add('border-b-2', 'border-shafa-secondary');
            link.classList.remove('hover:border-b-2'); // Agar border aktif tidak hilang saat hover
        }
    });

    // Catatan: Logika ini efektif jika menggunakan link relatif (pages/about.html, index.html)
});