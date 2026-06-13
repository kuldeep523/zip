document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('admin-sidebar');
    toggle?.addEventListener('click', () => sidebar?.classList.toggle('show'));

    const darkToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
    const saved = localStorage.getItem('admin-theme');
    if (saved) {
        html.setAttribute('data-bs-theme', saved);
    }
    darkToggle?.addEventListener('click', () => {
        const next = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-bs-theme', next);
        localStorage.setItem('admin-theme', next);
    });
});
