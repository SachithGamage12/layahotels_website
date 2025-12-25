<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
        .form-group img {
            max-width: 100px;
            margin-top: 10px;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="layahotelsadminpanel.php" class="btn btn-secondary back-button">Back to Admin Panel</a>
        <h1>Admin Panel - Manage Job Posting</h1>
        <form id="job-form" class="mb-4">
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" class="form-control" placeholder="Job Title" required>
            </div>
            <div class="form-group">
                <label for="description">Job Description</label>
                <input type="text" id="description" class="form-control" placeholder="Job Description" required>
            </div>
            <div class="form-group">
                <label for="image-upload">Upload Image</label>
                <input type="file" id="image-upload" class="form-control-file" accept="image/*" required>
                <img id="image-preview" src="" alt="Image Preview" class="d-none">
            </div>
            <button type="submit" class="btn btn-primary">Add Job</button>
        </form>
        <div id="admin-jobs-container" class="row"></div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetchJobsForAdmin();
            document.getElementById("job-form").addEventListener("submit", addJob);
            document.getElementById("image-upload").addEventListener("change", updateImagePreview);
        });

        function fetchJobsForAdmin() {
            const jobs = JSON.parse(localStorage.getItem("jobs")) || [];
            renderJobs(jobs);
        }

        function addJob(e) {
            e.preventDefault();
            const title = document.getElementById("title").value;
            const description = document.getElementById("description").value;
            const imageUpload = document.getElementById("image-upload").files[0];
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const imageUrl = event.target.result;
                const jobs = JSON.parse(localStorage.getItem("jobs")) || [];
                const newJob = { id: Date.now().toString(), title, description, imageUrl };
                jobs.push(newJob);
                localStorage.setItem("jobs", JSON.stringify(jobs));
                renderJobs(jobs);
                document.getElementById("job-form").reset();
                document.getElementById("image-preview").src = "";
                document.getElementById("image-preview").classList.add("d-none");
            };
            
            reader.readAsDataURL(imageUpload);
        }

        function renderJobs(jobs) {
            const jobsContainer = document.getElementById("admin-jobs-container");
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
                            <button class="btn btn-danger" onclick="deleteJob('${job.id}')">Delete</button>
                        </div>
                    </div>
                `;
                jobsContainer.appendChild(jobCard);
            });
        }

        function deleteJob(id) {
            let jobs = JSON.parse(localStorage.getItem("jobs")) || [];
            jobs = jobs.filter(job => job.id !== id);
            localStorage.setItem("jobs", JSON.stringify(jobs));
            renderJobs(jobs);
        }

        function updateImagePreview() {
            const file = document.getElementById("image-upload").files[0];
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const imageUrl = event.target.result;
                const imagePreview = document.getElementById("image-preview");
                imagePreview.src = imageUrl;
                imagePreview.classList.remove("d-none");
            };
            
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
