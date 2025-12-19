/**
 * TRACKDUIT GLOBAL JAVASCRIPT
 * Menangani Sidebar, Overlay, dan Konfirmasi Aksi
 */
document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.getElementById("overlay");

  // Jika user klik overlay (saat di mobile), tutup sidebar
  if (overlay) {
    overlay.addEventListener("click", toggleSidebar);
  }
});

/**
 * 1. FUNGSI SIDEBAR
 * Mengatur buka-tutup sidebar untuk Desktop & Mobile
 */
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const panel = document.getElementById("main-panel");
  const overlay = document.getElementById("overlay");

  // Pastikan elemen ada sebelum dieksekusi agar tidak error
  if (sidebar && panel) {
    sidebar.classList.toggle("active");
    panel.classList.toggle("active");

    // Khusus layar Mobile (<= 992px), tampilkan/sembunyikan overlay gelap
    if (window.innerWidth <= 992 && overlay) {
      overlay.classList.toggle("active");
    }
  }
}

/**
 * 2. FUNGSI KONFIRMASI HAPUS (UMUM)
 * Digunakan untuk menghapus data transaksi/kategori
 */
function konfirmasiHapus(url) {
  if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
    window.location.href = url;
  }
}

/**
 * 3. FUNGSI KONFIRMASI HAPUS (ADMIN - USER)
 * Digunakan di Admin Panel untuk hapus user
 */
function confirmDelete(id) {
  const pesan =
    "Apakah Anda yakin ingin menghapus user ini beserta seluruh datanya?";
  if (confirm(pesan)) {
    window.location.href = "pages/proses_admin.php?hapus_user=" + id;
  }
}
