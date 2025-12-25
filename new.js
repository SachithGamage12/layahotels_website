// Function to validate phone number with country code
function validatePhoneNumber() {
    // Get the selected country code
    var countryCode = document.getElementById("country_code").value;
    
    // Get the phone number input value
    var phoneNumber = document.getElementById("phone_number").value;
    
    // Create a regular expression based on the selected country code
    var regex;
    switch(countryCode) {
        case "1": // USA, Canada, and other countries in North America
            regex = /^\d{10}$/;
            break;
        case "91": // India
            regex = /^\d{10}$/;
            break;
        case "44": // UK
            regex = /^\d{10,14}$/;
            break;
        case "86": // China
            regex = /^\d{11,13}$/;
            break;
        case "94": // Sri Lanka
            regex = /^\d{9}$/;
            break;
        case "33": // France
        case "49": // Germany
        case "39": // Italy
        case "7":  // Russia
            regex = /^\d{9,15}$/; // Common length range for these countries
            break;
        case "61": // Australia
            regex = /^\d{9}$/;
            break;
        // Add more cases for other country codes as needed
        default:
            // Default regex for other country codes
            regex = /^\d{5,15}$/; // A general range
            break;
    }
    
    // Test the phone number against the regular expression
    if (!regex.test(phoneNumber)) {
        alert("Please enter a valid phone number for the selected country code.");
        return false;
    }
    
    return true;
}

// Initialize flatpickr for date inputs
flatpickr("#checkin_date", {
    minDate: "today", // Set minimum selectable date to today
    dateFormat: "Y-m-d", // Date format YYYY-MM-DD
    onClose: function(selectedDates, dateStr, instance) {
        // Update the minimum selectable date for check-out when check-in changes
        flatpickr("#checkout_date").set("minDate", dateStr);
    }
});
flatpickr("#checkout_date", {
    minDate: "today", // Set minimum selectable date to today
    dateFormat: "Y-m-d" // Date format YYYY-MM-DD
});


function updateRoomAndKidsOptions() {
    var adultsSelect = document.getElementById("adults");
    var kidsSelect = document.getElementById("kids");
    var roomCategory = document.getElementById("room_category");

    var adultsCount = parseInt(adultsSelect.value, 10);

    if (adultsCount === 1) {
        roomCategory.value = "SGL";
        kidsSelect.disabled = true;
        kidsSelect.value = "0";
    } else if (adultsCount === 2) {
        roomCategory.value = "DBL";
        kidsSelect.disabled = false;
        setKidsOptions(1);
    } else if (adultsCount === 3) {
        roomCategory.value = "TPL";
        kidsSelect.disabled = false;
        setKidsOptions(1);
    }
}

function updateKidsOptions() {
    var roomCategory = document.getElementById("room_category").value;
    var kidsSelect = document.getElementById("kids");
    var adultsSelect = document.getElementById("adults");
    var adultsCount = parseInt(adultsSelect.value, 10);

    if (roomCategory === "SGL") {
        adultsSelect.value = "1";
        kidsSelect.disabled = true;
        kidsSelect.value = "0";
    } else if (roomCategory === "DBL") {
        if (adultsCount < 2) adultsSelect.value = "2";
        kidsSelect.disabled = false;
        setKidsOptions(1);
    } else if (roomCategory === "TPL") {
        if (adultsCount < 3) adultsSelect.value = "3";
        kidsSelect.disabled = false;
        setKidsOptions(1);
    }
}

function setKidsOptions(maxKids) {
    var kidsSelect = document.getElementById("kids");
    var currentKidsValue = parseInt(kidsSelect.value, 10);

    kidsSelect.innerHTML = '';

    for (var i = 0; i <= maxKids; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        kidsSelect.appendChild(option);
    }

    kidsSelect.value = Math.min(currentKidsValue, maxKids).toString();
}

window.onload = function() {
    updateRoomAndKidsOptions();
}




function validateEmail() {
    const emailField = document.querySelector('input[name="email"]');
    const email = emailField.value;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        emailField.focus();
        return false;
    }
    return true;
}