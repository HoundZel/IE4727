// Select all quantity input fields
const subtotal1Display = document.getElementById('subtotal1');
const subtotal2Display = document.getElementById('subtotal2');
const subtotal3Display = document.getElementById('subtotal3');

//java inputs
const javaQuantity =  document.querySelectorAll('#java');

//cafe inputs
const cafeQuantity =  document.querySelectorAll('#cafe');
const cafePrice = document.querySelectorAll('#cafePrice');

//cappucino inputs
const cappucinoQuantity =  document.querySelectorAll('#cappucino');
const cappucinoPrice = document.querySelectorAll('#cappucinoPrice');

// Function to calculate subtotal
function calculateSubtotal() {
    let subtotal = 0;

    // Loop through each quantity input to calculate subtotal
    javaQuantity.forEach(input => {
        const price = parseFloat(input.getAttribute('data-price')); // Get the price from the data-price attribute
        const quantity = parseInt(input.value); // Get the current quantity
        subtotal += price * quantity; // Calculate the total price for each item
    });

    // Update the subtotal display
    subtotal1Display.textContent = subtotal.toFixed(2); // Display subtotal with two decimal places
}

// Attach event listeners to each quantity input
javaQuantity.forEach(input => {
    input.addEventListener('input', calculateSubtotal);
});

// Function to calculate subtotal
function calculateSubtotal() {
    let subtotal = 0;

    // Loop through each quantity input to calculate subtotal
    javaQuantity.forEach(input => {
        const price = parseFloat(input.getAttribute('data-price')); // Get the price from the data-price attribute
        const quantity = parseInt(input.value); // Get the current quantity
        subtotal += price * quantity; // Calculate the total price for each item
    });

    // Update the subtotal display
    subtotal1Display.textContent = subtotal.toFixed(2); // Display subtotal with two decimal places
}

// Attach event listeners to each quantity input
javaQuantity.forEach(input => {
    input.addEventListener('input', calculateSubtotal);
});
