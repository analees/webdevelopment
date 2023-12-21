//getUserInfo() is used to fetch user details based on a phone number
//submitOrder() send order information for processing
function getUserInfo() {
    const phoneNumber = document.getElementById('phone').value;

    fetch(`php/api.php?phone=${phoneNumber}`)
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);

            if (data && data.length > 0) {
                const user = data[0];
                console.log('User Information:', user);

                document.getElementById('name').value = user.full_name;
                document.getElementById('email').value = user.email;

                // Hide the user info form and show the taco order form
                document.getElementById('user-info-form').style.display = 'none';
                document.getElementById('taco-order-form').style.display = 'block';
            } else {
                // Handle case when user is not found
                console.log('User not found.');
                alert('User not found. Please provide valid information.');
            }
        })
        .catch(error => {
            console.error('Error fetching user information:', error);
            alert('An error occurred while fetching user information.');
        });
}

function submitOrder() {
    // Get all selected quantities
    const quantities = document.querySelectorAll('select[name="quantity"]');
    
    // Get the selected drink
    const drink = document.getElementById('drink-select').value;

    // Create an object to hold the order details
    const orderDetails = {
        tacos: [],
        drink: drink
    };

    // Add each taco order to the order details
    quantities.forEach((quantitySelect, index) => {
        const quantity = parseInt(quantitySelect.value);
        const tacoType = quantitySelect.parentElement.querySelector('h3').textContent;
        orderDetails.tacos.push({
            type: tacoType,
            quantity: quantity
        });
    });

    // Convert the order details object to a JSON string
    const orderDetailsJson = JSON.stringify(orderDetails);

    // Send the order details to the server
    fetch('php/order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: orderDetailsJson
    })
    .then(response => response.json())
    .then(data => {
        console.log('Order Response:', data);
        if (data.success) {
            alert('Your order has been placed successfully.');
        } else {
            alert('There was a problem placing your order.');
        }
    })
    .catch(error => {
        console.error('Error placing order:', error);
        alert('An error occurred while placing your order.');
    });
}
