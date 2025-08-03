// public/js/classes/Ticket.js
export default class Ticket {
  constructor(origin, destination, date, passengerCount) {
    this.origin = origin;
    this.destination = destination;
    this.date = date;
    this.passengerCount = passengerCount;
  }

  validate() {
    return this.origin && this.destination && this.origin !== this.destination;
  }
}