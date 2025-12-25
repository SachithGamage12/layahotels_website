let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".room-slider", {
    spaceBetween: 20,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".gallery-slider", {
    spaceBetween: 10,
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 4,
        },
    },
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 10,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

let accordions = document.querySelectorAll('.faqs .row .content .box');

accordions.forEach(acco =>{
    acco.onclick = () =>{
        accordions.forEach(subAcco => {subAcco.classList.remove('active')});
        acco.classList.add('active');
    }
})

 // Get the check-in and check-out date input elements
 const checkinInput = document.getElementById('checkin_date');
 const checkoutInput = document.getElementById('checkout_date');

 // Set the minimum check-out date to the selected check-in date
 checkinInput.addEventListener('change', function() {
     const selectedDate = new Date(this.value);
     const minDate = selectedDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
     checkoutInput.min = minDate;
 });

 // Ensure check-out date is after check-in date
 checkoutInput.addEventListener('change', function() {
     const selectedCheckin = new Date(checkinInput.value);
     const selectedCheckout = new Date(this.value);

     // Disable check-out date if it's before or the same as check-in date
     if (selectedCheckout <= selectedCheckin) {
         this.value = '';
     }
 });

 
 

 

// Function to open the modal and display the clicked image
function openModal(imageSrc) {
    document.getElementById('imageModal').style.display = "flex";
    document.getElementById('modalImage').src = imageSrc;
}

// Function to close the modal
function closeModal() {
    document.getElementById('imageModal').style.display = "none";
}
