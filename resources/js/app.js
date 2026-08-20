import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('theme', {
    isDark: false,
    init() {
        this.isDark = document.documentElement.classList.contains('dark');
        window.addEventListener('storage', (e) => {
            if (e.key === 'theme') {
                this.isDark = e.newValue === 'dark';
                document.documentElement.classList.toggle('dark', this.isDark);
            }
        });
    },
    toggle() {
        this.isDark = !this.isDark;
        document.documentElement.classList.toggle('dark', this.isDark);
        localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
    }
});

Alpine.start();
