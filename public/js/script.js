document.addEventListener("DOMContentLoaded", function () {
    // Memilih semua elemen yang memiliki kelas 'fade-in'
    const fadeElements = document.querySelectorAll('.fade-in');

    // Mengonfigurasi Intersection Observer
    const observerOptions = {
        root: null, // menggunakan viewport browser
        rootMargin: '0px',
        threshold: 0.15 // Animasi berjalan saat 15% elemen terlihat di layar
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Menambahkan kelas 'visible' untuk memicu CSS transisi
                entry.target.classList.add('visible');
                // Berhenti memantau elemen setelah dianimasikan (hanya muncul sekali)
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Menerapkan observer pada setiap elemen
    fadeElements.forEach(element => {
        observer.observe(element);
    });
});