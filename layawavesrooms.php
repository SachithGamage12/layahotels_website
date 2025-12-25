<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laya Waves | Kalkudah</title>
    <link rel="icon" href="layawavesimages/logo.jfif" type="image/x-icon"> <!-- Link to your icon file -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .room-card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .room-card:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
             
        }
        .room-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .room-card .carousel {
            flex: 1;
        }
        .room-details {
            flex: 2;
            padding: 20px;
            background: #f8f9fa;
        }
        .custom-btn-primary {
        background-color: #007bff; /* Primary color */
        color: white; /* Text color */
        padding: 6px 12px; /* Adjust padding for smaller height */
        font-size: 14px; /* Initial font size */
        transition: all 0.3s ease; /* Smooth transition on hover */
        margin-top: 8px; /* Adjust vertical spacing */
        margin-left: 15px;
        margin-right: 25px;
    }

    .custom-btn-primary:hover {
        background-color: #0056b3; /* Darker color on hover */
        font-size: 16px; /* Increase font size on hover */
    }
    .navbar{
        background-color: lightskyblue;
    }
        .room-details h5 {
            margin-bottom: 15px;
        }
        .room-details ul {
            list-style: none;
            padding: 0;
        }
        .room-details ul li {
            margin-bottom: 10px;
        }
        .room-details .btn {
            margin-top: 15px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .price {
            font-weight: bold;
        }
        @media (min-width: 768px) {
            .room-card {
                flex-direction: row;
            }
            .room-details {
                margin-left: 20px; /* Adjust margin as needed */
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="layawavesimages/logo.jfif" alt="Logo" width="30" height="30" class="d-inline-block align-top">
            Laya Waves
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse position-absolute top-0 end-0 " id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
    <a class="nav-link btn custom-btn-primary" href="layawaves.php">Home</a>
</li>


                
                <!-- Add more nav items here if needed -->
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="room-card" data-room-type="deluxe">
        <div id="carouselRoom1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="layawavesimages/deluxe.jpg" class="d-block w-100" alt="Room Image 1">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/deluxe2.jpg" class="d-block w-100" alt="Room Image 2">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/deluxe3.jpg" class="d-block w-100" alt="Room Image 3">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/deluxe4.jpg" class="d-block w-100" alt="Room Image 4">
                </div>
                <!-- Add more images if needed -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="room-details">
            <h5>Deluxe Double Rooms</h5>
            <p>How many pax can be here: 2 Pax</p>
            
            <div class="form-group">
                <label for="basisSelect1">Select Basis:</label>
                <select id="basisSelect1" class="form-control basis-select">
                    <option value="bb">BB</option>
                    <option value="hb">HB</option>
                    <option value="fb">FB</option>
                </select>
            </div>
            <p id="price1" class="price">Price: </p>
            <a button class="btn btn-primary" href="layawavesbook.php">Book Now</button></a>
        </div>
    </div>

    <!-- Repeat similar structure for other room cards with respective IDs -->
    <div class="room-card" data-room-type="family">
        <div id="carouselRoom2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                    <img src="layawavesimages/family.jpg" class="d-block w-100" alt="Room Image 1">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/family2.jpeg" class="d-block w-100" alt="Room Image 2">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/family3.jpg" class="d-block w-100" alt="Room Image 3">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/family4.jpg" class="d-block w-100" alt="Room Image 4">
                </div>
                <!-- Add more images if needed -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="room-details">
            <h5>Family Rooms</h5>
            <p>How many pax can be here: 4 Pax</p>
            
            <div class="form-group">
                <label for="basisSelect2">Select Basis:</label>
                <select id="basisSelect2" class="form-control basis-select">
                    <option value="bb">BB</option>
                    <option value="hb">HB</option>
                    <option value="fb">FB</option>
                </select>
            </div>
            <p id="price2" class="price">Price: </p>
            <a button class="btn btn-primary" href="layawavesbook.php">Book Now</button></a>
        </div>
    </div>

    <div class="room-card" data-room-type="suite">
        <div id="carouselRoom3" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="layawavesimages/suite.jpg" class="d-block w-100" alt="Room Image 1">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/suite2.jpg" class="d-block w-100" alt="Room Image 2">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/suite3.jpg" class="d-block w-100" alt="Room Image 3">
                </div>
                <div class="carousel-item">
                    <img src="layawavesimages/suite4.jpg" class="d-block w-100" alt="Room Image 4">
                </div>
                <!-- Add more images if needed -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="room-details">
            <h5>Suite Rooms</h5>
            <p>How many pax can be here: 6 Pax</p>
           
            <div class="form-group">
                <label for="basisSelect3">Select Basis:</label>
                <select id="basisSelect3" class="form-control basis-select">
                    <option value="bb">BB</option>
                    <option value="hb">HB</option>
                    <option value="fb">FB</option>
                </select>
            </div>
            <p id="price3" class="price">Price: </p>
            <a button class="btn btn-primary" href="layawavesbook.php">Book Now</button></a>
        </div>
    </div>
</div>

<script>
    // Sample pricing data (replace with actual prices)
    const pricingData = {
    deluxe_single: {
        bb: { weekday: 10400, weekend: 10400, holiday: 10400 },
        hb: { weekday: 12200, weekend: 12200, holiday: 12200 },
        fb: { weekday: 13700, weekend: 13700, holiday: 13700 },
    },
    deluxe_double: {
        bb: { weekday: 14800, weekend: 14800, holiday: 14800 },
        hb: { weekday: 17200, weekend: 17200, holiday: 17200 },
        fb: { weekday: 18700, weekend: 18700, holiday: 18700 },
    },
    deluxe_triple: {
        bb: { weekday: 19200, weekend: 19200, holiday: 19200 },
        hb: { weekday: 22200, weekend: 22200, holiday: 22200 },
        fb: { weekday: 23700, weekend: 23700, holiday: 23700 },
    }
};

// Define weekends and Sri Lankan holidays
const weekends = [0, 5, 6]; // Sunday, Friday, Saturday
const holidays = [
    "2024-01-14", "2024-02-04", "2024-04-13", "2024-05-01", "2024-06-29",
    "2024-08-19", "2024-09-16", "2024-09-17", "2024-10-16", "2024-10-17",
    "2024-10-30", "2024-10-31", "2024-11-14", "2024-12-24", "2024-12-25",
    "2025-01-13", "2025-01-14", "2025-02-03", "2025-02-04", "2025-02-11",
    "2025-11-12", "2025-02-25", "2025-02-26", "2025-03-12", "2025-03-13",
    "2025-03-31", "2025-04-14", "2025-04-17", "2025-04-30", "2025-05-01",
    "2025-05-12", "2025-05-13", "2025-06-09", "2025-06-10", "2025-07-09",
    "2025-07-10", "2025-08-07", "2025-09-04", "2025-10-06", "2025-10-20",
    "2025-11-04", "2025-11-05", "2025-12-03", "2025-12-04", "2025-12-24",
    "2025-12-25"
];

function isHoliday(date) {
    const dateString = date.toISOString().split('T')[0];
    return holidays.includes(dateString);
}

function getDayType(date) {
    const dayOfWeek = date.getDay();
    if (weekends.includes(dayOfWeek)) {
        return "weekend";
    } else if (isHoliday(date)) {
        return "holiday";
    } else {
        return "weekday";
    }
}

// Update prices using data fetched from PHP script
function updatePrices() {
    fetch('layawavesprices.php')
        .then(response => response.json())
        .then(pricingData => {
            document.querySelectorAll('.room-card').forEach((card, index) => {
                const roomType = card.getAttribute('data-room-type');
                const basisSelect = card.querySelector('.basis-select');
                const priceElement = card.querySelector('.price');

                const basis = basisSelect.value;

                // Find matching price in fetched data
                const matchingPrice = pricingData.find(item =>
                    item.room_type === roomType &&
                    item.basis_type === basis
                );

                if (matchingPrice) {
                    const dayType = getDayType(new Date());
                    const price = matchingPrice[dayType];
                    priceElement.textContent = `Price: LKR ${price}`;
                }
            });
        })
        .catch(error => console.error('Error fetching room prices:', error));
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.basis-select').forEach(select => {
        select.addEventListener('change', updatePrices);
    });
    updatePrices(); // Initial price update on page load
});



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
