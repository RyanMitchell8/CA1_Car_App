<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Irish Auto Views</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        /* General Reset and Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            background-image: url('images/garages/background.jpg');
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; 
            background-repeat: no-repeat; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


        /* Container */
        .container {
            text-align: center;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }


        /* Logo */
        .logo {
            margin: 0 auto 20px;
        }

        /* Buttons */
        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button.register {
            background-color: #28a745;
        }

        .button.register:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Shamrock SVG Logo -->
        <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100">
            <title>Four Leaf Shamrock Logo</title>
            <!-- First Leaf -->
            <path d="M50 30 C40 10, 20 10, 20 30 C20 50, 40 50, 50 40 C60 50, 80 50, 80 30 C80 10, 60 10, 50 30 Z" fill="#28A745"/>
            <!-- Second Leaf -->
            <path d="M50 30 C60 10, 80 10, 80 30 C80 50, 60 50, 50 40 C40 50, 20 50, 20 30 C20 10, 40 10, 50 30 Z" fill="#28A745"/>
            <!-- Third Leaf -->
            <path d="M50 50 C60 70, 80 70, 80 50 C80 30, 60 30, 50 40 C40 30, 20 30, 20 50 C20 70, 40 70, 50 50 Z" fill="#28A745"/>
            <!-- Fourth Leaf -->
            <path d="M50 50 C40 70, 20 70, 20 50 C20 30, 40 30, 50 40 C60 30, 80 30, 80 50 C80 70, 60 70, 50 50 Z" fill="#28A745"/>
        </svg>
        </div>
        <h1>Welcome to Irish Auto Views</h1>
        <p>Your Gateway to Ireland’s Best Cars</p>
        <div class="button-group">
            <a href="/login" class="button">Login</a>
            <a href="/register" class="button register">Register</a>
        </div>
    </div>
</body>
</html>
