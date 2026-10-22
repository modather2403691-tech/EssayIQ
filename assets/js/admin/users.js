const userSearch = document.getElementById('userSearch');
const roleFilter = document.getElementById('roleFilter');
const statusFilter = document.getElementById('statusFilter');
const userTableBody = document.querySelector('#usersTable tbody');
const userRows = () => [...document.querySelectorAll('#usersTable tbody tr')];
const demoUsersKey = 'essayiq_demo_users_v1';
const legacyAdminsKey = 'essayiq_demo_added_admins_v1';
const userChangesKey = 'essayiq_demo_user_changes_v1';
const roles = ['Student', 'Instructor', 'Administrator'];

const userModal = document.getElementById('userModal');
const actionModal = document.getElementById('actionModal');
const addUserModal = document.getElementById('addUserModal');
const addUserForm = document.getElementById('addUserForm');
const addUserError = document.getElementById('addUserError');
const newRole = document.getElementById('newRole');
const roleSelectWrap = document.getElementById('roleSelectWrap');
let lastClickedButton = null;
let pendingAction = null;

function readStorage(key, fallback) {
    try {
        const value = JSON.parse(sessionStorage.getItem(key) || 'null');
        return value === null ? fallback : value;
    } catch (error) {
        console.warn('Could not read demo user data:', error);
        return fallback;
    }
}

function writeStorage(key, value) {
    try {
        sessionStorage.setItem(key, JSON.stringify(value));
        return true;
    } catch (error) {
        console.warn('Could not save demo user data:', error);
        return false;
    }
}

function openModal(modal, trigger) {
    lastClickedButton = trigger;
    modal.hidden = false;
    const closeButton = modal.querySelector('.ieg-modal-close');
    if (closeButton) closeButton.focus();
}

function closeModal(modal) {
    modal.hidden = true;
    pendingAction = null;
    if (lastClickedButton && document.contains(lastClickedButton)) lastClickedButton.focus();
}

function updateStatistics() {
    const rows = userRows();
    document.getElementById('totalUserCount').textContent = rows.length;
    document.getElementById('studentCount').textContent =
        rows.filter(row => row.dataset.role === 'Student').length;
    document.getElementById('instructorCount').textContent =
        rows.filter(row => row.dataset.role === 'Instructor').length;
    document.getElementById('activeCount').textContent =
        rows.filter(row => row.dataset.status === 'Active').length;
}

function filterUsers() {
    const query = userSearch.value.toLowerCase().trim();
    const role = roleFilter.value;
    const status = statusFilter.value;
    let visibleCount = 0;

    userRows().forEach(row => {
        const matches = (row.dataset.name + ' ' + row.dataset.email).toLowerCase().includes(query) &&
            (role === 'All' || row.dataset.role === role) &&
            (status === 'All' || row.dataset.status === status);
        row.hidden = !matches;
        if (matches) visibleCount += 1;
    });
    document.getElementById('noUsersMessage').style.display = visibleCount ? 'none' : 'block';
}

function addDemoAction(message) {
    document.getElementById('emptyActionLog')?.remove();
    const item = document.createElement('div');
    item.className = 'ieg-user-log-entry';
    const description = document.createElement('strong');
    description.textContent = message;
    const date = document.createElement('span');
    date.textContent = new Date().toLocaleString();
    item.append(description, date);
    document.getElementById('userActionLog').prepend(item);

    const events = readStorage('essayiq_demo_admin_actions_v1', []);
    events.unshift({
        id: 'DEMO-' + Date.now(),
        admin: 'System Admin (Demo)',
        action: message,
        target: message,
        date: new Date().toISOString(),
        severity: /Deactivated/.test(message) ? 'Warning' : 'Info',
        details: 'Browser-only demonstration event'
    });
    writeStorage('essayiq_demo_admin_actions_v1', events.slice(0, 50));
}

function saveRowChange(row) {
    const changes = readStorage(userChangesKey, {});
    changes[row.dataset.id] = {
        role: row.dataset.role,
        status: row.dataset.status
    };
    return writeStorage(userChangesKey, changes);
}

function activeAdministratorCount() {
    return userRows().filter(row =>
        row.dataset.role === 'Administrator' && row.dataset.status === 'Active'
    ).length;
}

function bindUserRow(row) {
    const viewButton = row.querySelector('.view-user-btn');
    const roleButton = row.querySelector('.change-role-btn');
    const statusButton = row.querySelector('.toggle-status-btn');

    viewButton.addEventListener('click', () => {
        document.getElementById('detailId').textContent = row.dataset.id;
        document.getElementById('detailName').textContent = row.dataset.name;
        document.getElementById('detailEmail').textContent = row.dataset.email;
        document.getElementById('detailRole').textContent = row.dataset.role;
        document.getElementById('detailStatus').textContent = row.dataset.status;
        openModal(userModal, viewButton);
    });

    roleButton.addEventListener('click', () => {
        pendingAction = { type: 'role', row };
        document.getElementById('actionModalTitle').textContent = 'Change User Role';
        document.getElementById('actionDescription').textContent =
            'Select a new role for ' + row.dataset.name + '. Confirm to apply the demo change.';
        roleSelectWrap.hidden = false;
        newRole.value = row.dataset.role;
        openModal(actionModal, roleButton);
    });

    statusButton.addEventListener('click', () => {
        const nextStatus = row.dataset.status === 'Active' ? 'Inactive' : 'Active';
        const verb = nextStatus === 'Active' ? 'Activate' : 'Deactivate';
        pendingAction = { type: 'status', row, nextStatus };
        document.getElementById('actionModalTitle').textContent = verb + ' Account';
        document.getElementById('actionDescription').textContent =
            'Are you sure you want to ' + verb.toLowerCase() + ' the account of ' + row.dataset.name + '?';
        roleSelectWrap.hidden = true;
        openModal(actionModal, statusButton);
    });
}

function addUserRow(user, bindActions = true) {
    const row = document.createElement('tr');
    Object.entries(user).forEach(([key, value]) => { row.dataset[key] = String(value); });

    const cell = (value, className) => {
        const td = document.createElement('td');
        td.textContent = value;
        if (className) td.className = className;
        row.appendChild(td);
        return td;
    };
    cell('#' + user.id);
    cell(user.name);
    cell(user.email);
    cell(user.role, 'user-role');
    const statusCell = cell('');
    const badge = document.createElement('span');
    badge.className = 'ieg-badge user-status ' +
        (user.status === 'Active' ? 'ieg-badge-success' : 'ieg-badge-danger');
    badge.textContent = user.status;
    statusCell.appendChild(badge);
    const actionCell = cell('');
    const wrapper = document.createElement('div');
    wrapper.className = 'ieg-user-actions';
    [['View Details', 'view-user-btn'], ['Change Role', 'change-role-btn'],
        [user.status === 'Active' ? 'Deactivate' : 'Activate', 'toggle-status-btn']]
        .forEach(([label, className]) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'ieg-btn ieg-btn-outline ' + className;
            button.textContent = label;
            wrapper.appendChild(button);
        });
        actionCell.appendChild(wrapper);
        userTableBody.appendChild(row);
        if (bindActions) bindUserRow(row);
}

function restoreStoredUsers() {
    const changes = readStorage(userChangesKey, {});
    const storedUsers = readStorage(demoUsersKey, []);
    const legacyAdmins = readStorage(legacyAdminsKey, []);
    const users = Array.isArray(storedUsers) ? storedUsers : [];
    const migratedAdmins = Array.isArray(legacyAdmins) ? legacyAdmins.map(admin => ({
        id: admin.id, name: admin.name, email: admin.email, role: 'Administrator', status: 'Active'
    })) : [];
    [...users, ...migratedAdmins].filter(user =>
        user && Number.isSafeInteger(Number(user.id)) && user.name && user.email &&
        roles.includes(user.role) && ['Active', 'Inactive'].includes(user.status)
    ).forEach(user => addUserRow(user, false));

    userRows().forEach(row => {
        const change = changes[row.dataset.id];
        if (!change || !roles.includes(change.role) || !['Active', 'Inactive'].includes(change.status)) return;
        row.dataset.role = change.role;
        row.dataset.status = change.status;
        row.querySelector('.user-role').textContent = change.role;
        const badge = row.querySelector('.user-status');
        badge.textContent = change.status;
        badge.classList.toggle('ieg-badge-success', change.status === 'Active');
        badge.classList.toggle('ieg-badge-danger', change.status === 'Inactive');
        row.querySelector('.toggle-status-btn').textContent =
            change.status === 'Active' ? 'Deactivate' : 'Activate';
    });
}

userSearch.addEventListener('input', filterUsers);
roleFilter.addEventListener('change', filterUsers);
statusFilter.addEventListener('change', filterUsers);

document.getElementById('addUserButton').addEventListener('click', function () {
    addUserForm.reset();
    addUserError.hidden = true;
    openModal(addUserModal, this);
    document.getElementById('userName').focus();
});
document.getElementById('closeAddUser').addEventListener('click', () => closeModal(addUserModal));
document.getElementById('cancelAddUser').addEventListener('click', () => closeModal(addUserModal));

addUserForm.addEventListener('submit', event => {
    event.preventDefault();
    const name = document.getElementById('userName').value.trim().replace(/\s+/g, ' ');
    const email = document.getElementById('userEmail').value.trim().toLowerCase();
    const role = document.getElementById('userRole').value;
    const status = document.getElementById('userStatus').value;
    if (!addUserForm.reportValidity() || !name || !roles.includes(role)) return;
    if (userRows().some(row => row.dataset.email.toLowerCase() === email)) {
        addUserError.textContent = 'This email is already registered in the demo table.';
        addUserError.hidden = false;
        return;
    }
    const id = Math.max(0, ...userRows().map(row => Number(row.dataset.id) || 0)) + 1;
    const user = { id, name, email, role, status };
    const storedUsers = readStorage(demoUsersKey, []);
    if (!writeStorage(demoUsersKey, [...(Array.isArray(storedUsers) ? storedUsers : []), user])) {
        addUserError.textContent = 'Browser storage is unavailable; the demo user was not saved.';
        addUserError.hidden = false;
        return;
    }
    addUserRow(user);
    updateStatistics();
    filterUsers();
    addDemoAction('Created demo user: ' + name + ' (' + email + ')');
    closeModal(addUserModal);
});

document.getElementById('confirmAction').addEventListener('click', () => {
    if (!pendingAction) return;
    const { type, row, nextStatus } = pendingAction;
    if (type === 'role') {
        const oldRole = row.dataset.role;
        const selectedRole = newRole.value;
        if (!roles.includes(selectedRole) || selectedRole === oldRole) {
            closeModal(actionModal);
            return;
        }
        if (oldRole === 'Administrator' && row.dataset.status === 'Active' &&
            selectedRole !== 'Administrator' && activeAdministratorCount() <= 1) {
            document.getElementById('actionDescription').textContent =
                'The last active Administrator cannot be changed to another role.';
            return;
        }
        row.dataset.role = selectedRole;
        row.querySelector('.user-role').textContent = selectedRole;
        if (!saveRowChange(row)) {
            row.dataset.role = oldRole;
            row.querySelector('.user-role').textContent = oldRole;
            document.getElementById('actionDescription').textContent =
                'Browser storage is unavailable; the role was not changed.';
            return;
        }
        addDemoAction('Changed ' + row.dataset.name + ' role: ' + oldRole + ' -> ' + selectedRole);
    } else if (type === 'status') {
        if (row.dataset.role === 'Administrator' && row.dataset.status === 'Active' &&
            nextStatus === 'Inactive' && activeAdministratorCount() <= 1) {
            document.getElementById('actionDescription').textContent =
                'The last active Administrator cannot be deactivated.';
            return;
        }
        const oldStatus = row.dataset.status;
        row.dataset.status = nextStatus;
        const badge = row.querySelector('.user-status');
        badge.textContent = nextStatus;
        badge.classList.toggle('ieg-badge-success', nextStatus === 'Active');
        badge.classList.toggle('ieg-badge-danger', nextStatus === 'Inactive');
        row.querySelector('.toggle-status-btn').textContent =
            nextStatus === 'Active' ? 'Deactivate' : 'Activate';
        if (!saveRowChange(row)) {
            row.dataset.status = oldStatus;
            badge.textContent = oldStatus;
            badge.classList.toggle('ieg-badge-success', oldStatus === 'Active');
            badge.classList.toggle('ieg-badge-danger', oldStatus === 'Inactive');
            row.querySelector('.toggle-status-btn').textContent =
                oldStatus === 'Active' ? 'Deactivate' : 'Activate';
            document.getElementById('actionDescription').textContent =
                'Browser storage is unavailable; the account status was not changed.';
            return;
        }
        addDemoAction((nextStatus === 'Active' ? 'Activated ' : 'Deactivated ') + row.dataset.name);
    }
    updateStatistics();
    filterUsers();
    closeModal(actionModal);
});

document.getElementById('closeUserModal').addEventListener('click', () => closeModal(userModal));
document.getElementById('modalDone').addEventListener('click', () => closeModal(userModal));
document.getElementById('closeActionModal').addEventListener('click', () => closeModal(actionModal));
document.getElementById('cancelAction').addEventListener('click', () => closeModal(actionModal));

[userModal, actionModal, addUserModal].forEach(modal => {
    modal.addEventListener('click', event => {
        if (event.target === modal) closeModal(modal);
    });
    modal.addEventListener('keydown', event => {
        if (event.key !== 'Tab') return;
        const focusable = [...modal.querySelectorAll(
            'button:not([disabled]), input:not([disabled]), select:not([disabled])'
        )].filter(element => element.getClientRects().length > 0);
        if (!focusable.length) return;
        const first = focusable[0];
        const last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    });
});

document.addEventListener('keydown', event => {
    if (event.key !== 'Escape') return;
    if (!actionModal.hidden) closeModal(actionModal);
    else if (!addUserModal.hidden) closeModal(addUserModal);
    else if (!userModal.hidden) closeModal(userModal);
});

restoreStoredUsers();
userRows().forEach(bindUserRow);
updateStatistics();
filterUsers();
