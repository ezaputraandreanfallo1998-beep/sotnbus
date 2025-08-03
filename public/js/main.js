// public/js/main.js
import Bus from './classes/Bus.js';
import Ticket from './classes/Ticket.js';

document.addEventListener('DOMContentLoaded', () => {
  // Inisialisasi objek Bus
  const popularBuses = [
    new Bus('Jakarta - Bandung', '08:00', 120000),
    new Bus('Bandung - Yogyakarta', '20:00', 250000)
  ];

  // Handle form dengan OOP
  const searchForm = document.getElementById('searchForm');
  searchForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const ticket = new Ticket(
      document.getElementById('origin').value,
      document.getElementById('destination').value,
      document.getElementById('date').value,
      document.getElementById('passengers').value
    );

    if (!ticket.validate()) {
      alert('Kota asal dan tujuan harus berbeda!');
      return;
    }

    // Proses tiket...
    console.log('Tiket valid:', ticket);
  });
});