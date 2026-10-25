(function () {
    const profileKey = 'essayiq_admin_profile_v1';
    const script = document.currentScript;
    const logoutUrl = script?.dataset.logoutUrl || '/EssayIQ/index.php';

    function initials(name) {
        return name.trim().split(/\s+/).slice(0, 2)
            .map(part => part[0]?.toUpperCase() || '').join('') || 'A';
    }

    window.iegRefreshAdminNavbar = function () {
        let profile = {};
        try {
            profile = JSON.parse(sessionStorage.getItem(profileKey) || '{}') || {};
        } catch (error) {
            console.warn('Could not read admin profile:', error);
        }
        const name = typeof profile.name === 'string' && profile.name.trim()
            ? profile.name : 'System Admin';
        document.getElementById('navAdminName').textContent = name;
        const image = document.getElementById('navAdminPhoto');
        const text = document.getElementById('navAdminInitials');
        if (typeof profile.photo === 'string' &&
            /^data:image\/(jpeg|png|webp);base64,/.test(profile.photo)) {
            image.src = profile.photo;
            image.hidden = false;
            image.classList.add('is-visible');
            text.hidden = true;
            text.classList.add('is-hidden');
        } else {
            image.removeAttribute('src');
            image.hidden = true;
            image.classList.remove('is-visible');
            text.hidden = false;
            text.classList.remove('is-hidden');
            text.textContent = initials(name);
        }
    };

    window.iegRefreshAdminNavbar();
    document.getElementById('adminLogoutBtn').addEventListener('click', function () {
        if (confirm('Leave the Admin Dashboard?')) {
            window.location.href = logoutUrl;
        }
    });
})();
