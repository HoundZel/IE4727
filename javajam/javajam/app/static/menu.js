// Function to calculate and update the subtotal for a given item row
function updateSubtotal(row) {
    // Get the selected radio button value (price)
    const selectedPrice = row.querySelector('input[type="radio"]:checked')?.dataset.price;
    // Get the entered quantity
    const quantity = row.querySelector('.quantity').value;

    // Calculate the subtotal
    const subtotal = selectedPrice * quantity;

    // Update the subtotal display
    row.querySelector('.subtotal').textContent = subtotal.toFixed(2);

    // Call calculateTotal to update the grand total
    calculateTotal();
}

// Function to calculate the total price of all items
function calculateTotal() {
    let total = 0;
    const subtotals = document.querySelectorAll('.subtotal');

    subtotals.forEach(subtotal => {
        total += parseFloat(subtotal.textContent);
    });

    // Update the grand total display
    document.getElementById('grandtotal').textContent = total.toFixed(2);
}

// Function to add event listeners to each row
function attachListeners() {
    // Get all rows that contain item information
    const rows = document.querySelectorAll('tr');

    // Loop through each row and attach listeners to radio buttons and quantity input
    rows.forEach(row => {
        // Attach event listener to all radio buttons within the row
        const priceRadios = row.querySelectorAll('.price');
        priceRadios.forEach(radio => {
            radio.addEventListener('change', () => updateSubtotal(row));
        });

        // Attach event listener to the quantity input within the row
        const quantityInput = row.querySelector('.quantity');
        if (quantityInput) {
            quantityInput.addEventListener('input', () => updateSubtotal(row));
        }
    });
}

// Call the function to attach listeners when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', attachListeners);