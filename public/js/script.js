document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    document.getElementById('date').min = new Date().toISOString().split('T')[0];
    
    // Form elements
    const originSelect = document.getElementById('origin');
    const destinationSelect = document.getElementById('destination');
    const searchForm = document.getElementById('searchForm');
    
    // Prevent selecting same origin and destination
    originSelect.addEventListener('change', function() {
        if (this.value === destinationSelect.value) {
            destinationSelect.value = '';
        }
    });
    
    destinationSelect.addEventListener('change', function() {
        if (this.value === originSelect.value) {
            originSelect.value = '';
        }
    });
    
    // Form submission
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const origin = originSelect.value;
        const destination = destinationSelect.value;
        
        if (!origin || !destination) {
            alert('Silakan pilih kota asal dan tujuan yang berbeda');
            return;
        }
        
        // In a real application, this would redirect to search results
        alert('Anda akan diarahkan ke halaman pencarian tiket');
        // window.location.href = `search.html?origin=${origin}&destination=${destination}&date=${document.getElementById('date').value}&passengers=${document.getElementById('passengers').value}`;
    });
});