<section class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-[-60px] z-20 relative">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Cari Tiket Bus</h2>
    <form action="{{ route('buses.search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <select name="origin" id="origin" required class="border rounded px-4 py-2">
            <option value="">Kota Asal</option>
            <option value="jakarta">Jakarta</option>
            <option value="bandung">Bandung</option>
            <option value="surabaya">Surabaya</option>
            <option value="yogyakarta">Yogyakarta</option>
            <option value="semarang">Semarang</option>
        </select>
        <select name="destination" id="destination" required class="border rounded px-4 py-2">
            <option value="">Kota Tujuan</option>
            <option value="jakarta">Jakarta</option>
            <option value="bandung">Bandung</option>
            <option value="surabaya">Surabaya</option>
            <option value="yogyakarta">Yogyakarta</option>
            <option value="semarang">Semarang</option>
        </select>
        <input type="date" name="date" required class="border rounded px-4 py-2">
        <!-- Ganti <select name="passengers"> dengan ini -->
<div class="flex items-center border rounded px-4 py-2 justify-between">
    <div class="flex items-center space-x-3">
        <input type="number" name="passengers" id="passengers" value="1" min="1" max="50" readonly class="w-10 text-center bg-transparent focus:outline-none">
        <button type="button" id="decrease-passenger" class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 text-xl font-bold text-gray-700 flex items-center justify-center">−</button>
        <button type="button" id="increase-passenger" class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 text-xl font-bold text-gray-700 flex items-center justify-center">+</button>
    </div>
</div>

        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari Tiket</button>
    </form>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('passengers');
        const incBtn = document.getElementById('increase-passenger');
        const decBtn = document.getElementById('decrease-passenger');

        incBtn.addEventListener('click', () => {
            let val = parseInt(input.value);
            if (val < 50) input.value = val + 1;
        });

        decBtn.addEventListener('click', () => {
            let val = parseInt(input.value);
            if (val > 1) input.value = val - 1;
        });
    });
</script>
