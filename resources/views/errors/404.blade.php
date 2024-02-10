<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>Redirect Home</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        .countdown {
            font-size: 2em;
            color: red;
        }
    </style>
</head>

<body>
    <div>
        <h1>404 Not Found</h1>
        <p>Don't worry! We're redirecting you back to safety. <br>
            You'll be at Home in <span class="countdown">5</span>
            seconds... (〃￣︶￣)人(￣︶￣〃)</p>
    </div>

    <script>
        var countdownElement = document.querySelector('.countdown');
        var countdownNumber = 5;
        var countdownInterval = setInterval(function() {
            countdownNumber--;
            countdownElement.textContent = countdownNumber;
            if (countdownNumber <= 0) {
                clearInterval(countdownInterval);
                window.location.href = "/home";
            }
        }, 1000);
    </script>
</body>

</html>
