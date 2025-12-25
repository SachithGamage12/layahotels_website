function setupDateInputs() {
    // Get today's date in YYYY-MM-DD format
    var today = new Date().toISOString().split('T')[0];
    
    // Set the minimum date for check-in to today's date
    document.getElementById('checkin-date').setAttribute('min', today);
    
    // Optionally, set the default value of check-in to today (highlight today's date)
    document.getElementById('checkin-date').setAttribute('value', today);
    
    // Set the minimum date for check-out to check-in date
    document.getElementById('checkout-date').setAttribute('min', today);
    
    // Optionally, set the default value of check-out to check-in date + 1 day
    var nextDay = new Date();
    nextDay.setDate(nextDay.getDate() + 1);
    document.getElementById('checkout-date').setAttribute('value', nextDay.toISOString().split('T')[0]);
}

// Call the function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', setupDateInputs);




function validateForm() {
    var firstName = document.getElementById('first-name').value.trim();
    var lastName = document.getElementById('last-name').value.trim();
    var mobileNumber = document.getElementById('mobile-number').value.trim();
    var checkinDate = document.getElementById('checkin-date').value;
    var checkoutDate = document.getElementById('checkout-date').value;
    var emailAddress = document.getElementById('email-address').value.trim();
    

    // Validate all fields
    if (firstName === '' || lastName === '' || checkinDate === '' || checkoutDate === '' || emailAddress === '' ) {
        alert('Error: Please fill in all fields.');
        return false; // Prevent form submission
    }

    // Validate mobile number format (Sri Lankan)
    var phoneNumberPattern = /^(\+94|0)\d{9}$/;
    if (!phoneNumberPattern.test(mobileNumber)) {
        alert('Error: Invalid Sri Lankan phone number. Please enter a valid phone number starting with +94 or 0.');
        return false; // Prevent form submission
    }

    // Validate email
    if (!validateEmail(emailAddress)) {
        return false; // Prevent form submission
    }

    // All validations passed
    
    return true; // Allow form submission
}

function validateEmail(email) {
    var emailInput = document.getElementById('email-address');
    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (pattern.test(email)) {
        if (email.endsWith('@gmail.com') || email.endsWith('.com') || email.endsWith('.net') || email.endsWith('.org')) {
            emailInput.setCustomValidity('');
            return true;
        } else {
            alert('Invalid email domain. Please use a domain like gmail.com, .com, .net, or .org.');
            emailInput.setCustomValidity('Please use a valid domain like gmail.com, .com, .net, or .org.');
            return false;
        }
    } else {
        alert('Invalid email format. Please enter a valid email address.');
        emailInput.setCustomValidity('Please enter a valid email address');
        return false;
    }
}

// Function to update hidden input with selected rooms HTML
function updateSelectedRoomsHTML() {
    const selectedRoomsContainer = document.getElementById('selected-rooms-container');
    const selectedRoomsHTML = selectedRoomsContainer.innerHTML;
    document.getElementById('selected-rooms-html').value = selectedRoomsHTML;
}

// Event listener for add room button
document.getElementById('add-room-button').addEventListener('click', function() {
    // Your existing code to add rooms to selected-rooms-container
    updateSelectedRoomsHTML(); // Update selected rooms HTML before submission
});

// Optional: Event listener for removing rooms (if needed)
document.getElementById('remove-room-button').addEventListener('click', function() {
    // Your existing code to remove rooms from selected-rooms-container
    updateSelectedRoomsHTML(); // Update selected rooms HTML before submission
});
