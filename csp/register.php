<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kalamkari Art</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f6d365, #fda085);
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Banner Section */
        .banner {
            text-align: center;
            margin-bottom: 20px;
        }

        .banner img {
            max-width: 100%;
            border-radius: 10px;
        }

        /* Form Section */
        .form-section {
            text-align: center;
        }

        .form-section h2 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-section label {
            font-size: 16px;
            font-weight: 500;
            text-align: left;
            width: 100%;
            margin-bottom: 5px;
        }

        .form-section input {
            width: 90%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-section input:focus {
            outline: none;
            border: 1px solid #fda085;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-section button {
            background: #4CAF50;
            color: white;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        

        .form-section p {
            font-size: 14px;
            margin-top: 15px;
        }

        .form-section p a {
            color: black;
            text-decoration: none;
            font-weight: 500;
        }

        .form-section p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Banner -->
        <div class="banner">
            <img src="p5.png" alt="Kalamkari Art Banner">
        </div>
        
        <!-- Form Section -->
        <section class="form-section">
            <h2>Create Your Account</h2>
            <form name="RegistrationPage" action="insert.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="t1" placeholder="Choose a unique username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="t2" placeholder="Enter a strong password" required>
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="t3" placeholder="Re-enter your password" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="t4" placeholder="Enter your email address" required>
                
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </section>
    </div>
</body>
</html>
