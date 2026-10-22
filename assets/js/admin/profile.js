const IEG_PROFILE_KEY = 'essayiq_admin_profile_v1';
const IEG_DEFAULT_PROFILE = {
    name: 'System Admin',
    email: 'admin@example.com',
    department: 'Academic Administration',
    photo: ''
};

function iegReadProfile() {
    try {
        return { ...IEG_DEFAULT_PROFILE, ...JSON.parse(sessionStorage.getItem(IEG_PROFILE_KEY) || '{}') };
    } catch (error) {
        console.warn('Could not read admin profile:', error);
        return { ...IEG_DEFAULT_PROFILE };
    }
}

function iegSaveProfile(profile) {
    try {
        sessionStorage.setItem(IEG_PROFILE_KEY, JSON.stringify(profile));
        return true;
    } catch (error) {
        alert('Browser storage is full or unavailable. Try a smaller image.');
        return false;
    }
}

function iegInitials(name) {
    return name.trim().split(/\s+/).slice(0, 2)
        .map(part => part.charAt(0).toUpperCase()).join('') || 'A';
}

function iegRenderProfile(profile) {
    document.getElementById('profileName').textContent = profile.name;
    document.getElementById('profileDisplayName').textContent = profile.name;
    document.getElementById('profileEmail').textContent = profile.email;
    document.getElementById('profileDepartment').textContent = profile.department;
    const image = document.getElementById('profileAvatarImage');
    const initials = document.getElementById('profileAvatarInitials');
    if (profile.photo) {
        image.src = profile.photo;
        image.hidden = false;
        image.classList.add('is-visible');
        initials.hidden = true;
        initials.classList.add('is-hidden');
    } else {
        image.removeAttribute('src');
        image.hidden = true;
        image.classList.remove('is-visible');
        initials.hidden = false;
        initials.classList.remove('is-hidden');
        initials.textContent = iegInitials(profile.name);
    }
    document.getElementById('removePhotoBtn').hidden = !profile.photo;
    if (typeof window.iegRefreshAdminNavbar === 'function') window.iegRefreshAdminNavbar();
}

iegRenderProfile(iegReadProfile());
const photoInput = document.getElementById('profilePhotoInput');
document.getElementById('changePhotoBtn').addEventListener('click', () => photoInput.click());
document.getElementById('removePhotoBtn').addEventListener('click', function () {
    if (!confirm('Remove your profile picture?')) return;
    const updated = { ...iegReadProfile(), photo: '' };
    if (!iegSaveProfile(updated)) return;
    photoInput.value = '';
    iegRenderProfile(updated);
});
photoInput.addEventListener('change', async function () {
    const file = this.files && this.files[0];
    if (!file) return;
    if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type) ||
        file.size > 2 * 1024 * 1024) {
        alert('Please choose a JPG, PNG or WebP image under 2 MB.');
        this.value = '';
        return;
    }
    try {
        const dataUrl = await new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
        await new Promise((resolve, reject) => {
            const image = new Image();
            image.onload = resolve;
            image.onerror = reject;
            image.src = dataUrl;
        });
        const previous = iegReadProfile();
        const updated = { ...previous, photo: dataUrl };
        if (iegSaveProfile(updated)) iegRenderProfile(updated);
    } catch (error) {
        alert('Could not read this image. Please try another one.');
    }
    this.value = '';
});

const editProfileModal = document.getElementById('editProfileModal');
const editProfileBtn = document.getElementById('editProfileBtn');
const closeEditProfile = document.getElementById('closeEditProfile');
const editProfileForm = document.getElementById('editProfileForm');
let lastProfileFocus = null;

function closeProfileModal() {
    editProfileModal.hidden = true;
    if (lastProfileFocus) lastProfileFocus.focus();
}

editProfileBtn.addEventListener('click', function () {
    lastProfileFocus = editProfileBtn;
    document.getElementById('editName').value =
        document.getElementById('profileName').textContent.trim();
    document.getElementById('editEmail').value =
        document.getElementById('profileEmail').textContent.trim();
    document.getElementById('editDepartment').value =
        document.getElementById('profileDepartment').textContent.trim();
    editProfileModal.hidden = false;
    document.getElementById('editName').focus();
});

closeEditProfile.addEventListener('click', closeProfileModal);
editProfileModal.addEventListener('click', event => {
    if (event.target === editProfileModal) closeProfileModal();
});
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !editProfileModal.hidden) closeProfileModal();
});
editProfileForm.addEventListener('submit', event => {
    event.preventDefault();
    const name = document.getElementById('editName').value.trim();
    const email = document.getElementById('editEmail').value.trim();
    const department = document.getElementById('editDepartment').value.trim();
    if (!name || !email || !department) return;
    const updated = { ...iegReadProfile(), name, email, department };
    if (!iegSaveProfile(updated)) return;
    iegRenderProfile(updated);
    closeProfileModal();
});

document.getElementById('changePasswordBtn').addEventListener('click', function () {
    alert('Password management will be available after secure authentication is implemented in Phase 2.');
});
