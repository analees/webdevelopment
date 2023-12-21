// javascript for food truck order page

// Function to update the total price
function updateTotal() {
    // Get all quantity elements
    let quantityElements = document.getElementsByName("quantity");

    // Initialize total price
    let totalPrice = 0.00;

    // Loop through each quantity element
    quantityElements.forEach(function (quantityElement) {
        // Get the selected quantity value
        let quantity = parseInt(quantityElement.value);

        // Get the price associated with the item
        let priceElement = quantityElement.parentElement.querySelector('.price');
        let price = parseFloat(priceElement.innerText.replace("Price: $", ""));

        // Update the total price
        totalPrice += quantity * price;
    });

    // Get the selected drink value
    let selectedDrink = document.getElementById("drink-select").value;

    // Get the price associated with the selected drink
    let drinkPriceElement = document.getElementById(selectedDrink).querySelector('.price');
    let drinkPrice = parseFloat(drinkPriceElement.innerText.replace("$", ""));

    // Update the total price with the drink price
    totalPrice += drinkPrice;

    // Display the total price on the page
    document.getElementById("total-price").innerText = totalPrice.toFixed(2);
}

// Function to handle drink selection
function handleDrinkSelection() {
    // Get the selected drink value
    let selectedDrink = document.getElementById("drink-select").value;

    // Hide all drink containers
    document.querySelectorAll('.drink-container').forEach(function (drinkContainer) {
        drinkContainer.style.display = "none";
    });

    // Show the selected drink container
    document.getElementById(selectedDrink).style.display = "block";

    // Update the total price
    updateTotal();
}

// Function to submit the order
function submitOrder() {
    // Get the total price
    let totalPrice = parseFloat(document.getElementById("total-price").innerText);

    // Display an alert with the total price
    alert("Order submitted! Total: $" + totalPrice.toFixed(2));
}

// Attach event listeners
document.getElementsByName("quantity").forEach(function (quantityElement) {
    quantityElement.addEventListener("change", updateTotal);
});

document.getElementById("drink-select").addEventListener("change", handleDrinkSelection);
