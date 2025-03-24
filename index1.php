<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team PVR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style1.css">

    <link rel="icon" href="logo.png" type="image/icon type">
</head>
<body>
<?php if (isset($_SESSION['error'])): ?>
        <div class="error-box show" id="errorBox">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-box show" id="successBox">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>



    <!-- Registration Form -->
    <div class="container" id="signup">
        <a href="index.php" class="close-btn">
            <ion-icon name="close-outline"></ion-icon>
        </a>  

        <h1 class="form-title">Register</h1>

        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder=" " required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder=" " required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder=" " required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>

        <div class="links">
            <p>Already have an account? <a href="#" id="signInButton">Sign In</a></p>
        </div>
    </div>


    <!-- Sign-In Form -->
    <div class="container" id="signIn">
        <a href="index.php" class="close-btn">
            <ion-icon name="close-outline"></ion-icon>
        </a>  

        <h1 class="form-title">Sign In</h1>

        <form method="post" action="login.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder=" " required>
                <label for="password">Password</label>
            </div>
            <div class="remember-forget">  
                <label><input type="checkbox"> Remember me</label>
            </div>
            <p class="recover"><a href="#">Recover Password</a></p>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>

        <div class="links">
            <p>Don't have an account yet? <button id="signUpButton">Sign Up</button></p>
        </div>
    </div>

    <script src="script1.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
