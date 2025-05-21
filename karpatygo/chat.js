import data from './data.js';

/**
 * Клас для управління чатом.
 */
class ChatManager {
    constructor() {
        this.messages = data.chatMessages; // Локальний кеш повідомлень
    }

    /**
     * Завантажує історію чату (імітація).
     */
    loadChatHistory() {
        this.displayMessages();
    }

    /**
     * Додає нове повідомлення.
     * @param {number} userId - ID користувача.
     * @param {string} message - Текст повідомлення.
     */
    sendMessage(userId, message) {
        if (!message.trim()) {
            alert('Повідомлення не може бути порожнім!');
            return;
        }

        const newMessage = { id: this.messages.length + 1, userId, message };
        this.messages.push(newMessage);
        this.displayMessage(newMessage);
    }

    /**
     * Відображає одне повідомлення.
     * @param {Object} message - Дані повідомлення.
     */
    displayMessage({ userId, message }) {
        const chatBox = document.getElementById('chat-box');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'chat-message';
        messageDiv.innerHTML = `<strong>Користувач ${userId}:</strong> ${message}`;
        chatBox.appendChild(messageDiv);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    /**
     * Відображає всі повідомлення.
     */
    displayMessages() {
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML = '';
        this.messages.forEach(message => this.displayMessage(message));
    }
}

export default new ChatManager();
