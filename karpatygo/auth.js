import data from './data.js';

/**
 * Клас для управління аутентифікацією.
 */
class AuthManager {
    constructor() {
        this.isAuthenticated = data.auth.isAuthenticated;
    }

    /**
     * Виконує вхід користувача.
     * @param {string} email - Email користувача.
     * @param {string} password - Пароль користувача.
     */
    login(email, password) {
        if (!validateEmail(email) || password !== 'password') { // Проста валідація
            alert('Невірний email або пароль!');
            return;
        }
        this.isAuthenticated = true;
        data.auth.isAuthenticated = true;
        alert('Вхід успішний!');
    }

    /**
     * Виконує вихід користувача.
     */
    logout() {
        this.isAuthenticated = false;
        data.auth.isAuthenticated = false;
        alert('Вихід виконано!');
    }
}

export default new AuthManager();
