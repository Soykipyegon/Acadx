<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ACADX</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- FontAwesome for icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                background-color: #f9fafb;
                color: #333;
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                flex-grow: 1;
                padding: 2rem;
                width: 100%;
            }

            .welcome-card {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1.5rem;
                margin-bottom: 3cm; /* Move the welcome card down by 3cm */
                text-align: center;
            }

            .welcome-card img {
                width: 70px;
                height: 70px;
                margin-bottom: 1rem;
            }

            .welcome-card h1 {
                font-size: 1.5rem;
                margin: 0;
            }

            .auth-buttons {
                display: flex;
                flex-direction: row;
                gap: 1rem;
                margin-top: 0.00001rem;
                justify-content: center; /* Center the buttons */
                flex-wrap: wrap;
                width: 100%;
            }

            .auth-buttons a {
                display: inline-block;
                padding: 0.75rem 2rem;
                background-color: #4CAF50;
                color: white;
                font-size: 1rem;
                border-radius: 4px;
                text-decoration: none;
                text-align: center;
                width: 100%;
                max-width: 250px;
            }

            .auth-buttons a:hover {
                background-color: #45a049;
            }

            .spacer {
                height: 2cm; /* Add space after the buttons */
            }

            .cards {
                display: flex;
                justify-content: space-between;
                gap: 1rem;
                flex-wrap: wrap;
                width: 100%;
            }

            .cards .card {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                flex-direction: column;
                text-align: center;
                padding: 1rem;
                width: 32%;
                box-sizing: border-box;
            }

            .feature-icon {
                font-size: 3rem;
                margin-bottom: 0.1rem;
                color: #4CAF50;
            }

            footer {
                text-align: center;
                padding: 1rem;
                background-color: #f3f4f6;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            footer span {
                font-size: 0.9rem;
                margin: 0 1.5rem;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .cards .card {
                    width: 100%;
                    margin-bottom: 1rem;
                }

                .auth-buttons a {
                    width: 100%;
                    max-width: none;
                }
            }

            @media (max-width: 480px) {
                body {
                    padding: 1rem;
                }

                .cards {
                    flex-direction: column;
                    align-items: stretch;
                }

                .auth-buttons {
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <img src="https://www.learnsoftbeliotechsolutions.co.ke/img/logo.png" alt="Logo">
                <h1>Welcome to our University ERP System.Experience the power of efficient management.</h1>
            </div>

            <!-- Authentication Buttons -->
            <div class="auth-buttons">
                @if (Route::has('login'))
                    @guest
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endguest
                @endif
            </div>

            <!-- Spacer -->
            <div class="spacer"></div>

            <!-- Feature Cards -->
            <!-- Feature Cards -->
<div class="cards">
    <div class="card" style="background-color: #f4a261;">
        <div class="feature-icon">
            <i class="fa fa-users"></i>
        </div>
        <h2>Employee Management</h2>
    </div>
    <div class="card" style="background-color: #2a9d8f;">
        <div class="feature-icon">
            <i class="fa fa-graduation-cap"></i>
        </div>
        <h2>Student Management</h2>
    </div>
    <div class="card" style="background-color: #e76f51;">
        <div class="feature-icon">
            <i class="fa fa-chart-bar"></i>
        </div>
        <h2>Reports</h2>
    </div>
</div>

        </div>

        <!-- Footer -->
        <footer>
            <span>&copy; {{ date('Y') }} <a href="https://www.learnsoftbeliotechsolutions.co.ke/">Learnsoft Beliotech Solutions</a> All Rights Reserved.</span>
            <span>Version 1.1.0</span>
        </footer>
    </body>
</html>
