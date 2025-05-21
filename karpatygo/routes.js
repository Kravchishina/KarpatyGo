import data from './data.js';
import bookingManager from './booking.js';

/**
 * Клас для управління маршрутами.
 */
class RoutesManager {
    constructor() {
        this.routes = data.routes; // Локальний кеш маршрутів
    }

    /**
     * Завантажує маршрути (імітація).
     */
    loadRoutes() {
        this.displayRoutes(this.routes);
    }

    /**
     * Фільтрує маршрути за складністю.
     * @param {string} difficulty - Рівень складності ('easy', 'medium', 'hard').
     */
    filterByDifficulty(difficulty) {
        const filtered = this.routes.filter(route => route.difficulty === difficulty);
        this.displayRoutes(filtered);
    }

    /**
     * Сортує маршрути за відстанню.
     * @param {string} order - Порядок сортування ('asc', 'desc').
     */
    sortByDistance(order = 'asc') {
        const sorted = [...this.routes].sort((a, b) => {
            return order === 'asc' ? a.distance - b.distance : b.distance - a.distance;
        });
        this.displayRoutes(sorted);
    }

    /**
     * Відображає маршрути в DOM.
     * @param {Array} routes - Список маршрутів.
     */
    displayRoutes(routes) {
        const routeList = document.getElementById('route-list');
        routeList.innerHTML = '';
        routes.forEach(route => {
            const routeItem = document.createElement('div');
            routeItem.className = 'route-item';
            routeItem.innerHTML = `
                <h3>${route.name}</h3>
                <p>Відстань: ${route.distance} км</p>
                <p>Складність: ${route.difficulty}</p>
                <button onclick="bookingManager.createBooking(1, ${route.id}, '2025-06-01')">Забронювати</button>
            `;
            routeList.appendChild(routeItem);
        });
    }
}

export default new RoutesManager();
