<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url('{{ asset("images/gym-background.jpg") }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .hero h1 {
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <!-- Navbar with Login/Register -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gym</a>
            @if (Route::has('login'))
                <div class="d-flex">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-danger">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero text-center d-flex align-items-center justify-content-center">
        <div class="text-white">
            <h1>Unleash Your Inner Strength</h1>
            <p class="lead">Join our gym and start your fitness journey today.</p>
            <a href="{{ route('register') }}" class="btn btn-danger btn-lg">Get Started</a>
        </div>
    </div>

    <style>
        .hero {
            background: url('{{ asset("images/gym_bg.jpeg") }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            width: 100%;
            position: relative;
        }

        /* Optional: Add a dark overlay for better text visibility */
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust darkness */
        }

        /* Ensure text stays above the overlay */
        .hero > div {
            position: relative;
            z-index: 2;
        }
    </style>

   <!-- Features Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-5">Why Choose Us?</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <img src='{{ asset("images/gym_eq.jpg") }}' class="mb-3 rounded-circle feature-img" alt="Gym">
                    <h4>State-of-the-Art Equipment</h4>
                    <p>We provide the latest fitness machines and training equipment.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src='{{ asset("images/gym_trainer.jpeg") }}' class="mb-3 rounded-circle feature-img" alt="Trainer">
                    <h4>Expert Trainers</h4>
                    <p>Our certified trainers will guide you to achieve your fitness goals.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src='{{ asset("images/gym_time.jpg") }}' class="mb-3 rounded-circle feature-img" alt="Schedule">
                    <h4>Track Trainer Schedule</h4>
                    <p>Manage your schedule, trainer's schedule is shared with you.</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .feature-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 4px solid #ddd;
        }
    </style>

    <!-- Pricing Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Membership Plans</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Daily Pass</h4>
                            <p>Access all facilities for a day.</p>
                            <h3>Rp 20,000</h3>
                            <a href="{{ route('register') }}" class="btn btn-danger">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Monthly Membership</h4>
                            <p>Unlimited access for a month.</p>
                            <h3>Rp 150,000</h3>
                            <a href="{{ route('register') }}" class="btn btn-danger">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Get in Touch</h2>
            <p>Have questions? Reach out to us!</p>
            <p><strong>Email:</strong> support@gymname.com</p>
            <p><strong>Phone:</strong> +62 123 4567 890</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
