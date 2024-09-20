document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.editable').forEach(cell => {
        cell.addEventListener('blur', function () {
            let orderId = this.getAttribute('data-order-id');
            let fieldName = this.getAttribute('data-name');
            let newValue = this.textContent.trim();

            // Send an AJAX request to update the database
            fetch('PHPScripts/update_orders.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    order_id: orderId,
                    field_name: fieldName,
                    new_value: newValue
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Order updated successfully');
                    } else {
                        console.error('Failed to update order');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});