<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laya Waves | Kalkudah</title>
   <link rel="icon" href="layawavesimages/logo.jfif" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

		.container {
    width: 100%;
    max-width: 1250px; /* Adjust maximum width as needed */
    margin: 20px auto; /* Center the container with auto margins */
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start; /* Align items to start */
	background-image: url("layaleisureimages/srilanka-2792097_1280.jpg");
}

        .room-container {
            flex-basis: calc(50% - 10px); /* Adjusted for side-by-side layout */
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px; /* Added margin for spacing */
        }

        .room-container .room-item {
            margin-bottom: 10px;
        }

        .booking-container {
            flex-basis: calc(50% - 10px); /* Adjusted for side-by-side layout */
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px; /* Added margin for spacing */
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align items to start */
			
        }

        .booking-container .booking-form {
            padding: 10px;
            width: 100%; /* Ensure form takes full width */
        }

        .booking-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .booking-form input,
        .booking-form select {
            width: calc(100% - 10px); /* Adjusted width for inputs */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .booking-form input[type="date"] {
            padding: 8px;
        }

        .booking-form .name-container {
            display: flex;
            gap: 10px;
            width: 100%; /* Full width for name container */
            margin-bottom: 10px; /* Added margin for spacing */
        }

        .booking-form .name-container input {
            flex: 1;
        }

        .booking-form .mobile-container {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            margin-bottom: 8px; /* Added margin for spacing */
        }

        .booking-form .mobile-container input#mobile-number {
            width: calc(100% - 50px); /* Adjusted width for mobile number */
            padding: 8px;
			
			
        }

        .mobile-prefix {
            font-size: 14px;
            font-weight: bold;
            width: 50px; /* Fixed width for prefix */
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 2px;
            background-color: #f9f9f9;
            padding: 8px;
        }

        .add-remove-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .add-remove-buttons button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
		.booking-submit-button {
            padding: 12px 24px; /* Increase padding to match other buttons */
            background-color: #28a745; /* Green color for submit button */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Increase font size */
        }

        .add-remove-buttons button:hover {
            background-color: #0056b3;
        }

        .video-container {
            flex-basis: calc(50% - 10px); /* Adjusted for side-by-side layout */
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px; /* Added margin for spacing */
        }

        .video-container iframe {
            width: 100%;
            height: 100%; /* Adjust height as needed */
        }
		.book-now-title {
        text-align: center;
        margin-bottom: 30px;
        animation: fadeInUp 1s ease forwards;
    }

    .book-now-title h1 {
        font-size: 3rem;
        color: #007bff; /* Blue color */
        margin: 0;
    }
	@keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column; /* Stack items on smaller screens */
            }

            .room-container,
.booking-container,
.video-container {
    flex-basis: 100%; /* Full width on smaller screens */
}
        }
    </style>
</head>
<body>
<div class="book-now-title">
        <h1>Book Now</h1>
    </div>
    <div class="container">
        <!-- Room selection container -->
        <div class="room-container">
            <div id="room-container">
                <!-- Initial room item -->
                <div class="room-item" data-room-id="1">
                    <label>Room No1</label>
                    <select class="room-category" name="room-category[]">
                        <option value="deluxe double room">DELUXE DOUBLE ROOM </option>
                        <option value="family room">FAMILY ROOM </option>
                        <option value="suite room">SUITE ROOM </option>
                    </select>
                    <label>Select your Basis</label>
                    <select class="basis-select" name="basis-select[]">
                        <option value="bed-and-breakfast">Bed And Breakfast</option>
                        <option value="half-board">Half Board</option>
                        <option value="full-board">Full Board</option>
                    </select>
                    <label>Guest count</label>
                    <select class="guest-count" name="guest-count[]">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="add-remove-buttons">
                <button type="button" id="add-room-button">Add Room</button>
                <button type="button" id="remove-room-button" disabled>Remove Room</button>
            </div>
        </div>
        
        <!-- Booking form container -->
        <div class="booking-container">
		<form class="booking-form" action="layawavesmail.php" method="POST" onsubmit="return validateForm()">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" name="first-name" required>

    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" name="last-name" required>

        
        <label for="mobile-number">Mobile Number</label>
        <input type="text" id="mobile-number" name="mobile-number" required placeholder="+94">
        
        <label for="checkin-date">Check-in Date</label>
    <input type="date" id="checkin-date" name="checkin-date" required>

    <label for="checkout-date">Check-out Date</label>
    <input type="date" id="checkout-date" name="checkout-date" required>

    <label for="email-address">Email Address</label>
    <input type="email" id="email-address" name="email-address" required>

    
	<input type="hidden" id="selected-rooms-html" name="selected-rooms-html" value="">
        
        <!-- Container to dynamically display selected rooms -->
        <div id="selected-rooms-container"></div>
        <button type="submit" id="submit-button" class="booking-submit-button">Request</button>
    </form>
</div>



        <!-- Video container -->
        

		<script>
    document.addEventListener('DOMContentLoaded', function() {
        let roomCount = 1;
        const maxRooms = 8; // Maximum number of rooms

        // Function to disable guest count options based on room category
        function disableGuestCounts(roomItem) {
            const roomCategory = roomItem.querySelector('.room-category').value;
            const guestCountSelect = roomItem.querySelector('.guest-count');
            const options = guestCountSelect.options;

            // Reset guest count options
            guestCountSelect.innerHTML = '';

            // Populate guest count based on room category
            switch (roomCategory) {
                case 'deluxe double room':
                    addGuestCountOptions(guestCountSelect, 1, 2);
                    break;
                case 'family room':
                    addGuestCountOptions(guestCountSelect, 1, 4);
                    break;
                case 'suite room':
                    addGuestCountOptions(guestCountSelect, 1, 6);
                    break;
                default:
                    addGuestCountOptions(guestCountSelect, 1, 6);
                    break;
            }
        }

        // Function to add guest count options to select element
        function addGuestCountOptions(selectElement, start, end) {
            for (let i = start; i <= end; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                selectElement.appendChild(option);
            }
        }

        // Function to update selected rooms display
        // Function to update selected rooms display
function updateSelectedRoomsDisplay() {
    const selectedRoomsContainer = document.getElementById('selected-rooms-container');
    selectedRoomsContainer.innerHTML = ''; // Clear previous content

    const roomItems = document.querySelectorAll('.room-item');
    roomItems.forEach(function(roomItem, index) {
        const roomNumber = index + 1;
        const roomCategory = roomItem.querySelector('.room-category').value;
        const basisSelect = roomItem.querySelector('.basis-select').value;
        const guestCount = roomItem.querySelector('.guest-count').value;

        const roomHtml = `
            <div class="selected-room">
                <strong>Room No${roomNumber}</strong><br>
                Category: ${roomCategory}<br>
                Basis: ${basisSelect}<br>
                Guests: ${guestCount}<br><br>
            </div>
        `;

        selectedRoomsContainer.innerHTML += roomHtml;
    });

    // Update hidden input with selected rooms HTML
    document.getElementById('selected-rooms-html').value = selectedRoomsContainer.innerHTML;
}

        // Add room button event listener
        document.getElementById('add-room-button').addEventListener('click', function() {
            if (roomCount < maxRooms) {
                roomCount++;
                const roomContainer = document.getElementById('room-container');

                const newRoom = document.createElement('div');
                newRoom.className = 'room-item';
                newRoom.setAttribute('data-room-id', roomCount);

                newRoom.innerHTML = `
                    <label>Room No${roomCount}</label>
                    <select class="room-category">
                        <option value="deluxe double room">DELUXE DOUBLE ROOM </option>
                        <option value="family room">FAMILY ROOM </option>
                        <option value="suite room">SUITE ROOM </option>
                    </select>
                    <label>Select your Basis</label>
                    <select class="basis-select">
                        <option value="bed-and-breakfast">Bed And Breakfast</option>
                        <option value="half-board">Half Board</option>
                        <option value="full-board">Full Board</option>
                    </select>
                    <label>Guest count</label>
                    <select class="guest-count">
                        <option value="1">1</option>
                    </select>
                `;

                roomContainer.appendChild(newRoom);
                document.getElementById('remove-room-button').disabled = false;

                // Disable guest counts for the new room
                disableGuestCounts(newRoom);

                // Disable add room button if max rooms reached
                if (roomCount === maxRooms) {
                    document.getElementById('add-room-button').disabled = true;
                }

                // Update selected rooms display
                updateSelectedRoomsDisplay();
            }
        });

        // Remove room button event listener
        document.getElementById('remove-room-button').addEventListener('click', function() {
            if (roomCount > 1) {
                const roomContainer = document.getElementById('room-container');
                roomContainer.removeChild(roomContainer.lastElementChild);
                roomCount--;

                if (roomCount === 1) {
                    document.getElementById('remove-room-button').disabled = true;
                }

                // Enable add room button if max rooms not reached
                if (roomCount < maxRooms) {
                    document.getElementById('add-room-button').disabled = false;
                }

                // Update selected rooms display
                updateSelectedRoomsDisplay();
            }
        });

        // Initial disable guest counts for the first room
        disableGuestCounts(document.querySelector('.room-item'));

        // Event listener for room category change
        document.addEventListener('change', function(event) {
            const target = event.target;
            if (target.classList.contains('room-category') || target.classList.contains('basis-select')) {
                const roomItem = target.closest('.room-item');
                disableGuestCounts(roomItem);
                updateSelectedRoomsDisplay();
            } else if (target.classList.contains('guest-count')) {
                updateSelectedRoomsDisplay(); // Update when guest count changes
            }
        });

        // Initial update of selected rooms display
        updateSelectedRoomsDisplay();

        // Form submission handling
        document.getElementById('booking-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Update selected rooms HTML input before submission
            const selectedRoomsHTML = document.getElementById('selected-rooms-container').innerHTML;
            document.getElementById('selected-rooms-html').value = selectedRoomsHTML;

            // Submit the form
            this.submit();
        });
    });
</script>






<script src="layawaves.js"></script>
</body>
</html>
