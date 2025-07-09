<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')

    <title>Qr Code</title>

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1593079831268-3381b0db4a77?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: brightness(0.5);
        }

        .card-container {
            perspective: 1000px;
        }

        .card {
            position: relative;
            width: 200px;
            height: 250px;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .front,
        .back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            backface-visibility: hidden;
            top: 0;
            left: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back {
            transform: rotateY(180deg);
        }

        .card.flipped {
            transform: rotateY(180deg);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    {{ $slot }}

    <script>
        document.getElementById('profile-btn').addEventListener('click', () => {
            document.querySelector('.card').classList.toggle('flipped');
        });
    </script>
</body>

</html>

