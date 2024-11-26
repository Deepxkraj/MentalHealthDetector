<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>Homepage</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        
        .container-fluid.bg-dark {
            background-image: linear-gradient(135deg, #4a69bd, #1e3799);
        }

        /* Header Section */
        .header-image img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            right: 20px;
        }

        .header-content {
            text-align: center;
            padding: 40px 20px;
            color: #fff;
        }

        /* Navbar */
        .navbar {
            background-color: #1e3799;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #fff !important;
        }
        
        .navbar .btn-outline-light {
            border-color: #f1c40f;
            color: #f1c40f;
        }
        
        .navbar .btn-outline-light:hover {
            background-color: #f1c40f;
            color: #1e3799;
        }

        /* Welcome Message */
        .welcome-message {
            font-size: 24px;
            font-weight: 500;
            color: #1e3799;
            background-color: #d1d8e0;
            padding: 20px 0;
            text-align: center;
        }

        /* Carousel */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        /* Sections */
        .content-section {
            padding: 40px 20px;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 2em;
            color: #4a69bd;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Service Cards */
        .card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        /* Testimonials */
        .testimonial {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-style: italic;
            color: #555;
        }

        /* Tips Section */
        .tip-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #555;
            text-align: center;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #1e3799;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #4a69bd;
        }
            /* PPT-style 16:9 Carousel */
    .carousel-image {
        width: 100%;
        height: 56.25vw; /* Aspect ratio for 16:9 */
        max-height: 1080px;
        object-fit: cover;
    }

    /* Center Carousel Indicators */
    .carousel-indicators {
        bottom: 20px;
    }

    /* Larger Navigation Controls */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 2.5rem;
        height: 2.5rem;
    }
    
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="container-fluid p-5 bg-dark text-white text-center">
        <div class="header-image">
            <img src="logo1.jpg" alt="LOGO">
        </div>
        <div class="header-content">
            <h1><b>WELCOME TO PSIFY</b></h1>
            <p>Where your mental health matters...</p>
        </div>
    </div>

    <!-- Navigation bar with Logout button -->
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="test.html">TESTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">CHAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="widget.html">EXERCISES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">ABOUT US</a>
                </li>
            </ul>
            <div class="navbar-text ms-auto">
                <a href="logout.php" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Hello message below navbar -->
    <div class="welcome-message">
        Hello 
        <?php 
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT firstName, lastName FROM `users` WHERE email='$email'");
            if ($row = mysqli_fetch_array($query)) {
                echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']);
            }
        }
        ?>
    </div>

<!-- Carousel Section -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="1.png" alt="Welcome" class="d-block w-100 carousel-image">
        </div>
        <div class="carousel-item">
            <img src="2.jpg" alt="App" class="d-block w-100 carousel-image">
        </div>
        <div class="carousel-item">
            <img src="3.png" alt="Benefits" class="d-block w-100 carousel-image">
        </div>
        <div class="carousel-item">
            <img src="4.png" alt="Info" class="d-block w-100 carousel-image">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>





    <!-- Services Section -->
    <div class="content-section text-center">
        <h2 class="section-title">Our Mental Health Services</h2>
        <div class="service-description">
            <p>We offer tools and resources to help you better understand your mental health. Explore a variety of assessments including anxiety, depression, and stress tests, all designed to help you take the first step toward wellness.</p>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Depression Test</h5>
                    <p>Gain insights into possible symptoms of depression. Our test guides you through questions to identify signs and support your well-being.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Anxiety Test</h5>
                    <p>This test helps assess whether anxiety symptoms might be impacting your daily life and provides resources for managing them.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Stress Test</h5>
                    <p>Learn about your current stress levels, understand triggers, and explore ways to improve your mental resilience.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="content-section text-center">
        <h2 class="section-title">Testimonials</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial">
                    "Psify has helped me understand my mental health better. The tests were easy to follow and insightful."
                    <br><b>- Arun</b>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial">
                    "The platform provided me with the resources I needed to feel more in control of my anxiety."
                    <br><b>- Dharnish</b>
                </div>
            </div>
        </div>
    </div>

    <!-- Mental Health Tips Section -->
    <div class="content-section text-center">
        <h2 class="section-title">Mental Health Tips</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="tip-card">
                    <h6>Take Breaks</h6>
                    <p>Regular breaks from work or study can reduce stress and improve focus.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tip-card">
                    <h6>Stay Active</h6>
                    <p>Engage in physical activities that you enjoy to boost your mood and mental health.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tip-card">
                    <h6>Talk to Someone</h6>
                    <p>Connecting with friends or family can provide emotional support and improve well-being.</p>
                </div>
            </div>
        </div>
    </div>

    <br><hr><br>
</body>
</html>
