<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url({{ asset('image/back.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;

        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 90px 100px;

        }
        .hero-text {
            max-width: 500px;
        }
        .hero-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero-text p {
            color: #666;
            margin-bottom: 30px;
        }
        .btn-join {
            width: 130px;
            background: linear-gradient(90deg, #229dc2, #109daf);
            padding: 15px 30px;
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            font-size: 16px;
            text-decoration: none;
        }
        .hero-img img {
            max-width: 700px;
            border-radius: 15px;
        }

        .nav_link{
            transform: all 0.3s ease;
        }
        .nav_link:hover {
            transform: translateX(-10px) scale(1.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="{{ asset('image/logo.jpg') }}" alt="logo" style="width: 50px; height: auto;">
            <h1>Car Rentals</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
        </div>
    </nav>

    <section class="hero" style="margin-top: 90px">
        <div class="nav_link hero-text" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
            <h1 style="color: #2b7fc4; font-weight: bold;">Car Rentals</h1>
            <p style="color: #2d7983; font-size: 18px;">Your one-stop solution for renting cars at affordable prices!</p>
            <a href="{{ route('register') }}" class="btn-join">Register</a>
            <a href="{{ route('login') }}" class="btn-join">Login</a>
        </div>
        <div class="nav_link hero-img">
            <img src="{{ asset('image/cars.jpg') }}" alt="Car">
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
