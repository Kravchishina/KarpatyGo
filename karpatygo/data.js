/**
 * Локальні дані для сервісу KarpatyGo.
 */
const data = {
    users: [
        { id: 1, username: 'Гірський Подорожник', email: 'user@karpatygo.com' }
    ],
    bookings: [
        { id: 1, userId: 1, routeId: 1, date: '2025-06-01' }
    ],
    routes: [
        { id: 1, name: 'Говерла', distance: 10, difficulty: 'hard' },
        { id: 2, name: 'Петрос', distance: 8, difficulty: 'medium' },
        { id: 3, name: 'Синевир', distance: 5, difficulty: 'easy' }
    ],
    chatMessages: [
        { id: 1, userId: 1, message: 'Привіт, планую похід!' }
    ],
    reviews: [
        { id: 1, userId: 1, text: 'Чудовий похід на Говерлу!' }
    ],
    auth: { isAuthenticated: false, token: 'dummy-token' }
};

export default data;
