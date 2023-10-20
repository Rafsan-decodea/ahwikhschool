

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form action="login.php" method="post">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button style="color: white;" type="submit">Login</button>
        </form>
        <br>

        <input class="btn btn-primary" id="registernew" type="button" value="Register For New Users"/>
    </div>
    <div class="register-container">
        <h2>User Registration</h2>
        <br>
        <form action="registration.php" method="post">
            <div class="input-container">
                <label for="phoneNumber">Phone Number (Bangladesh):</label>
                <input type="number" id="phoneNumber" name="phoneNumber" placeholder="01XXXXXXXXX" required pattern="01\d{9}">
            </div>
            <div class="input-container">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button style="background-color: #007BFF; color: white;" type="submit">Register</button>
        </form>
        <br>
        <input class="btn btn-primary" id="login" type="button" value="loginnnn"/>
    </div>
</body>
</html>

<script src="script.js"></script>
