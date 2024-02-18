<!DOCTYPE html>
<html lang="en" style="font-family: cursive;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Some Error Occured</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body{
            height: 100%;
            width: 100%;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #errorDiv{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 10px;
            padding: 20vh;
            border-radius: 1.25rem;
            background-color: rgb(255 255 255 / 10%);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 4vh;
        }
    </style>
</head>
<body>
    <div id="errorDiv">
        <p>Sorry! There's some error</p><br>
        <p>Redirecting to Home Page</p>
    </div>
    <script>
        setTimeout(function() {
            window.open('/', '_self');
        }, 5000);
    </script>
</body>
</html>