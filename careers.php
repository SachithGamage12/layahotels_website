<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancies</title>
    <link rel="icon" href="img/layahotels.jfif" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        .job-card {
            margin: 20px 0;
        }
        .apply-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            font-size: 1.2em;
            color: #007bff;
            text-decoration: none;
        }
        .vacancy-image {
            display: block;
            margin: 0 auto 20px;
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Vacancies</h1>
        <img src="img/vacancy_image.jpg" alt="Job Vacancies" class="vacancy-image">
        <div id="jobs-container" class="row"></div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetchJobs();
        });

        function fetchJobs() {
            const jobs = JSON.parse(localStorage.getItem("jobs")) || [];
            renderJobs(jobs);
        }

        function renderJobs(jobs) {
            const jobsContainer = document.getElementById("jobs-container");
            jobsContainer.innerHTML = "";
            jobs.forEach(job => {
                const jobCard = document.createElement("div");
                jobCard.classList.add("col-md-4");
                jobCard.innerHTML = `
                    <div class="card job-card">
                        <img src="${job.imageUrl}" class="card-img-top" alt="${job.title}">
                        <div class="card-body">
                            <h5 class="card-title">${job.title}</h5>
                            <p class="card-text">${job.description}</p>
                            <a href="mailto:layahotels.headoffice@gmail.com?subject=Application for ${encodeURIComponent(job.title)}&body=I am interested in applying for the position of ${encodeURIComponent(job.title)}. Please find my CV attached." class="apply-link">Apply Now</a>
                        </div>
                    </div>
                `;
                jobsContainer.appendChild(jobCard);
            });
        }
    </script>
</body>
</html>
