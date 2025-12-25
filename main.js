let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');
// Simulated login functionality
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Here, you would typically validate user credentials and redirect them to the main page upon successful login
    // For demonstration purposes, we'll simulate a successful login
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    
    // Check if the email and password match some predefined values
    if (email === "example@example.com" && password === "password") {
        // Hide the login form
        document.querySelector(".login-form-container").style.display = "none";
        
        // Show the main page
        document.getElementById("main-page").style.display = "block";

        // Extract username from email (for demonstration purposes)
        let username = email.split("@")[0];
        
        // Display the username on the main page
        document.getElementById("username").textContent = username;
    } else {
        alert("Invalid email or password. Please try again.");
    }
});

// Simulated login functionality
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Here, you would typically validate user credentials and redirect them to the main page upon successful login
    // For demonstration purposes, we'll simulate a successful login
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    
    // Check if the email and password match some predefined values
    if (email === "example@example.com" && password === "password") {
        // Redirect to the main page upon successful login (you can replace "index.html" with your actual main page URL)
        window.location.href = "index.html";
    } else {
        alert("Invalid email or password. Please try again.");
    }
});



window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});

videoBtn.forEach(btn =>{
    btn.addEventListener('click', () =>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay:{
        delay:2500,
        disableOnIneraction: false,
    },
    breakpoints: {
        640:{
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".brand-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay:{
        delay:2500,
        disableOnIneraction: false,
    },
    breakpoints: {
        450:{
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        991:{
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        },
    },
});

function validateForm() {
    var name = document.forms["contact"]["name"].value;
    var email = document.forms["contact"]["email"].value;
    var phone = document.forms["contact"]["phone"].value;
  
    if (name == "" || email == "" || phone == "") {
      alert("Please fill in all required fields.");
      return false;
    }
    return true;
  }
  

  document.addEventListener("DOMContentLoaded", function() {
    var guestTypeSelect = document.getElementById("guest-type");
    var civilianDetails = document.querySelector(".civilian-details");
    var armyDetails = document.querySelector(".army-details");

    guestTypeSelect.addEventListener("change", function() {
        if (this.value === "civilian") {
            civilianDetails.style.display = "block";
            armyDetails.style.display = "none";
        } else if (this.value === "army") {
            civilianDetails.style.display = "none";
            armyDetails.style.display = "block";
        }
    });
});


