import data from './data.js';
import { validateDate, formatDate } from './utils.js';

/**
 * Клас для управління бронюваннями.
 */
class BookingManager {
    constructor() {
        this.bookings = data.bookings; // Локальний кеш бронювань
    }

    /**
     * Створює нове бронювання.
     * @param {number} userId - ID користувача.
     * @param {number} routeId - ID маршруту.
     * @param {string} date - Дата бронювання.
     */
    createBooking(userId, routeId, date) {
        try {
            // Валідація дати
            if (!validateDate(date)) {
                throw new Error('Невірний формат дати! Використовуйте YYYY-MM-DD.');
            }

            // Імітація створення бронювання
            const newBooking = {
                id: this.bookings.length + 1,
                userId,
                routeId,
                date
            };
            this.bookings.push(newBooking);
            this.displayBooking(newBooking);
        } catch (error) {
            console.error('Помилка при створенні бронювання:', error.message);
            alert('Не вдалося створити бронювання: ' + error.message);
        }
    }

    /**
     * Скасовує бронювання.
     * @param {number} bookingId - ID бронювання.
     */
    cancelBooking(bookingId) {
        try {
            this.bookings = this.bookings.filter(b => b.id !== bookingId);
            this.updateBookingList();
            alert('Бронювання скасовано!');
        } catch (error) {
            console.error('Помилка при скасуванні бронювання:', error.message);
        }
    }

    /**
     * Відображає одне бронювання в DOM.
     * @param {Object} booking - Дані бронювання.
     */
    displayBooking(booking) {
        const bookingList = document.getElementById('booking-list');
        const bookingItem = document.createElement('div');
        bookingItem.className = 'booking-item';
        bookingItem.innerHTML = `
            <h3>Бронювання #${booking.id}</h3>
            <p>Користувач: ${booking.userId}</p>
            <p>Маршрут: ${booking.routeId}</p>
            <p>Дата: ${formatDate(booking.date)}</p>
            <button onclick="bookingManager.cancelBooking(${booking.id})">Скасувати</button>
        `;
        bookingList.appendChild(bookingItem);
    }

    /**
     * Оновлює список бронювань у DOM.
     */
    updateBookingList() {
        const bookingList = document.getElementById('booking-list');
        bookingList.innerHTML = '';
        this.bookings.forEach(booking => this.displayBooking(booking));
    }

    /**
     * Фільтрує бронювання за датою.
     * @param {string} date - Дата для фільтрації.
     */
    filterByDate(date) {
        const filtered = this.bookings.filter(b => b.date === date);
        this.displayBookings(filtered);
    }
}

export default new BookingManager();
