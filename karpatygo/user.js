import data from './data.js';

/**
 * Клас для управління профілем користувача.
 */
class UserManager {
    constructor() {
        this.user = data.users[0]; // Локальний кеш профілю
    }

    /**
     * Завантажує профіль (імітація).
     */
    loadProfile() {
        this.displayProfile();
    }

    /**
     * Оновлює профіль.
     * @param {Object} data - Дані для оновлення.
     */
    updateProfile(data) {
        this.user = { ...this.user, ...data };
        this.displayProfile();
        alert('Профіль оновлено!');
    }

    /**
     * Відображає профіль у DOM.
     */
    displayProfile() {
        const profileDiv = document.getElementById('profile');
        profileDiv.innerHTML = `
            <h2>Профіль користувача</h2>
            <p>Ім'я: ${this.user.username}</p>
            <p>Email: ${this.user.email}</p>
            <button onclick="userManager.updateProfile({ username: 'Нове ім\'я', email: 'newemail@karpatygo.com' })">Оновити</button>
        `;
    }
}

export default new UserManager();
