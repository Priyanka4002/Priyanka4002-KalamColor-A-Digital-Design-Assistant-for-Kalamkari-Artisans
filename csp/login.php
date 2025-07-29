<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalamkari Art - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #e66465, #9198e5);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 90%;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .banner img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border: 1px solid #e66465;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: #e66465;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #d35454;
        }

        .home-button {
            margin-top: 15px;
        }

        .home-button a {
            color: black;
            text-decoration: none;
            font-weight: 500;
        }

        .home-button a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px 20px;
            }

            h2 {
                font-size: 20px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Banner -->
        <div class="banner">
            <img src="p5.png" alt="Kalamkari Art Banner">
        </div>
        
        <!-- Login Form -->
        <h2>Login</h2>
        <form action="loginverification.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="u" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="p" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

        <!-- Home Button -->
        <div class="home-button">
            <a href="index.html">Go to Home</a>
        </div>
    </div>

</body>
</html>
