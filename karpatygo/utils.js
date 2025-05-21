/**
 * Перевіряє, чи є дата валідною і чи вона в майбутньому.
 * @param {string} date - Дата у форматі YYYY-MM-DD.
 * @returns {boolean} - Результат валідації.
 */
export function validateDate(date) {
    const regex = /^\d{4}-\d{2}-\d{2}$/;
    if (!regex.test(date)) return false;
    const parsedDate = new Date(date);
    return !isNaN(parsedDate.getTime()) && parsedDate >= new Date();
}

/**
 * Форматує дату для відображення.
 * @param {string} date - Дата у форматі YYYY-MM-DD.
 * @returns {string} - Форматована дата (наприклад, DD.MM.YYYY).
 */
export function formatDate(date) {
    const d = new Date(date);
    return `${d.getDate().toString().padStart(2, '0')}.${(d.getMonth() + 1).toString().padStart(2, '0')}.${d.getFullYear()}`;
}

/**
 * Перевіряє, чи є рядок валідним email.
 * @param {string} email - Електронна пошта.
 * @returns {boolean} - Результат валідації.
 */
export function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
