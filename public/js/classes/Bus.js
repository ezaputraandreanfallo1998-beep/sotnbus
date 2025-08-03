// public/js/classes/Bus.js
export default class Bus {
  constructor(route, departureTime, price) {
    this.route = route;
    this.departureTime = departureTime;
    this.price = price;
  }

  getFormattedPrice() {
    return `Rp ${this.price.toLocaleString('id-ID')}`;
  }
}