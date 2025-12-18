<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode | Florascape</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #E8F5E6;
            color: #111;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        .logo {
            margin-bottom: 2rem;
            max-width: 200px;
        }

        h1 {
            font-size: 3rem;
            color: #4D9D45;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.25rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact {
            margin-top: 2rem;
            font-size: 1rem;
            color: #999;
        }
    </style>
</head>

<body>
    <img src="{{ asset('images/florascape-logo.png') }}" alt="Florascape" class="logo">
    <h1>We'll be back soon!</h1>
    <p>Our website is currently undergoing scheduled maintenance to improve your experience. We are working hard to get
        everything ready for you.</p>

    <div class="contact">
        Need to reach us? <br>
        <a href="mailto:hello@florascape.com" style="color: #4D9D45; text-decoration: none;">hello@florascape.com</a>
    </div>
</body>

</html>