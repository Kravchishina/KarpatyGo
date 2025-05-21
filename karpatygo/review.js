import data from './data.js';

/**
 * Клас для управління відгуками.
 */
class ReviewManager {
    constructor() {
        this.reviews = data.reviews; // Локальний кеш відгуків
    }

    /**
     * Створює новий відгук.
     * @param {number} userId - ID користувача.
     * @param {string} text - Текст відгуку.
     */
    createReview(userId, text) {
        if (text.length < 10) {
            alert('Відгук занадто короткий!');
            return;
        }

        const newReview = { id: this.reviews.length + 1, userId, text };
        this.reviews.push(newReview);
        this.displayReview(newReview);
    }

    /**
     * Відображає відгук у DOM.
     * @param {Object} review - Дані відгуку.
     */
    displayReview({ userId, text }) {
        const reviewList = document.getElementById('review-list');
        const reviewItem = document.createElement('div');
        reviewItem.className = 'review-item';
        reviewItem.innerHTML = `
            <p><strong>Користувач ${userId}:</strong> ${text}</p>
        `;
        reviewList.appendChild(reviewItem);
    }
}

export default new ReviewManager();
