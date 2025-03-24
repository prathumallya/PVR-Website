<?php
session_start();

// Auto-logout after 5 minutes (300 seconds)
$inactive = 300;
if (isset($_SESSION['last_activity'])) {
    $session_life = time() - $_SESSION['last_activity'];
    if ($session_life > $inactive) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/icon type">
    <title>Team PVR</title>
</head>
<body>
    <div class="header">
        <nav class="nav">
            <div class="logo">
                <a href="index.php"><p>PVR.</p></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php" class="link active">Home</a></li>
                    <li><a href="#about-us" class="link">About</a></li>
                    <li><a href="project.html" class="link">Projects</a></li>
                    <li><a href="#blog" class="link">Blog</a></li>
                </ul>
            </div>
            <div class="btn">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <!-- User Circle -->
                    <button class="user-circle" id="userCircle"><?php echo strtoupper($_SESSION['user_name'][0]); ?></button>

                    <!-- Dropdown Menu -->
                    <div id="userDropdown" class="dropdown-menu">
                        <p><strong>Profile</strong></p>
                        <p> <i class='bx bxs-user' ></i><?php echo $_SESSION['user_name']; ?> <?php echo $_SESSION['last_name']; ?></p>
                        <?php if (isset($_SESSION['user_email'])): ?>
                        <p><i class='bx bxs-envelope'></i><?php echo $_SESSION['user_email']; ?></p>
                        <?php endif; ?>
                        <button id="logoutButton">Log out</button>
                    </div>
                <?php else: ?>
                    <button id="signInButton"><a href="index1.php">LOGIN</a></button>
                <?php endif; ?>
            </div>
        </nav>
    </div>

    <div class="bg">
        <img src="img.png">
    </div>

    <div class="info">
        <h2>Hi We Are Team PVR.</h2>
        <p>A Bunch of Coding Enthusiasts from Computer and Communication Dept
            Of NMAMIT College, Nitte<br>.......
        </p>
    </div>

    <div class="about" id="about-us">
        <h2>About Us</h2>
        <p>We Are a Bunch of Students From Nitte Who Are Interested And Doing This To Follow Our Passion<br>We Do Several Projects Related to Computer Like Web Development Etc...</p>
        <a href="about.php">Know More About Us</a>
    </div>

    <div class="blog" id="blog">
        <h2>Blogs</h2>
        <video controls width="600">
        <source
            src="pvlog.mp4"
            type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </div>

    <div class="footer">
        <p>PVR.</p>
        <h6>© CopyRight 2024, All rights reserved</h6>
        <div class="socials">
        <a href="https://www.instagram.com/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA1dJREFUSEudV0Fy2zAMxOolzktiPyQdux+J/RIn/YjdXnvt3e5HuBVAUAIpyvFUMxnJEglgFwsQgYQLIsK1F4uPIvMrf7JbZ2G06c/4eu0Xhh5GG4MrHjM63Va/sV8QCGv0nagXrzoo4qvIUHBcm2mBkNyI6B9yPuZbtRHA9WH6JmAZYDc3JI8ifBXB9hnAeQ3vTuQngOM6ox1xkWlLwRmUjSfj7svy3RGvPMcg7xTZDYDtiyxWVBfgTOkmgo2IKG2nSN9XmiVTTofIedyvQdwx4EXVHnWzEBdJ3bCnyHUAdo8oXpSTksH0JmLF8kudj3a2I3MfGHDw9Fpas+MAg+TNRfQCo+hhAbd730T4wxGrI6X4YqiBl1Z0FSiOitIXA4DcTGrHWd2yHw2+uuG/IvKhQZL8JsJPd/zdnd4qx57PKsduVBdeoTQ3amBKRwreOzWoyEzFZNo71X8A/M4Miga7M62UJhdtJ3KLTE12HBB7ab07mpOj1RWKXBlQtZ8wxBISSeQFlK3AHTu/lbi0jDI9vALD5DgxbSCikWslaXlUTYKk77OcHvR76fnm2NTNHTBM+1qqi4GK6kQex0b17rnM6qwuqJrPQtkLeAKGY6GUpDKodjPVS8RaCtwK5SKIVNt7KzFFA+CjpCDWZUBtZViESabJsTGxIq4O1ea43hyiLpSS1MA0QFX4xEofcaljN/QAsfZco3oADtWZ7QI0qjMr2ummHv1/VDst1gYpN283ge4ccRYllBX9tRswdMTVy7HXVCwny1PsaIl7gbVA9a95/ulEaY0qG3pVaHVlYrqN6+c6XhFXQRbqOFdumjtWcdJKO9dwk4fQQHILrsQ1Iy71uuitxYt1t9wQtHEoEkVuLbNXZonJiMOY+Ph90f0qMQy4TgimSMtIVHpfOyHO5oPSnzokioIrukvtNnNo9/AK7JQyrEosz3TN5QfFhSJK+2IQWNLZhmRdTFNwHluvqt3Rrg4CFUW6UaPVu7J9tzMS0zw1zz9x8MvPYfThnYLD4ClrDrs+BlUxcu99ftibg7jDj8mF9SCNrucYndNv6PvXPP1NB0FHe08hfiaX7fDW+++ldVYOj+o8XijWvHdmrrYgl817WrFw3GsgCz+dcPthRMWubaq5/wffEuc5RqN8bQAAAABJRU5ErkJggg=="/></a>
                    <a href="https://www.linkedin.com/feed/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAvdJREFUSEutVzGuEzEQfc89JQ1VfssZQCLnQAgiCjgCXTa3oPtBQrT/BOhH0NNS/hzi1x5ie7wee72bRWApWq3Xnjdv5s3YIf7LIAAB4oMgJLwtjrB0fqi9smAy0d27uMr4qJ6Oj7/FieuVbGE853QG7n0XL+8APAXwneQva3kujMXOmqgQbJeJyE8ALwpteUO6r+l93qj90l+lua9CrUZF/AcAn5vE/Sb53MSym5oJ40V9BCfMEJH95XUYp4I0KY+O7klSqVWv3TkXiTmFT4FfAvjRMP5G8nVPvuuyGQttMiblJCIfAXwC8AzAHSDvSfeYd64plX4sLPuG8XLJm6+ldq7ku7bYCnBJrH1fZmiLyAYIP55JnudhE+QI7EU2BO4btC8ko+BEJDzf5u9Re8AWwAbArT7t9hOAHR3PoZWWtpqBFd2L31DwUGsdR5K7MCc+AgflRyOCmKvDOKeeFOQ4kcCbCLTlFDx/qMtJgQtjBa7jYjFTFWokk48HuhS1NCpxESJ+gznGEdgPF5P7WB8hAsa2Wgx5Dc6340QypMRAmxwncUwZO3IXQDTHPcZbR57SGutc5dqNI8+5ES2HOuXy6OiWgA+kG6xwvMg9gVcpyllIckO6UemzwMbXJC5lLMC+6TpBOEcbRi9ySyCccDYdWzIKTbNsdkxCnb4ZVdc51q2VwexgVrphvCVdH1jruKhaQ026kXEpJ4UVbOncyZ7TXmS4aK9oIaF3GGsLtKo2nqYcxzr2g4B1qBW4HAWxOky955BKzdheWSKwVfUk1LaBjPmLTGz7tuqfhFoX/ruqI2MVTYlch3Ev1DldoY47DSTWsbbMjqoLY9WrF1/nONlfo+qq8I+lgaiqk+hy+yqMC4Hh0sr3Tc9PwNNQE/GQmMux7Uq2aBsmbTmZpQa4Op3SixdpO845dxyt86oXp6ZQH9BlXYmcbR65S9f+m85y7W/I2ILyWdu11J+c3Ll6V+fJnfnKLc+W1pwv5kK/5s545Za0BlE9+QNlRKE2nnbLtwAAAABJRU5ErkJggg=="/></a>
                    <a href="https://github.com/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAv5JREFUSEuVV9thIjEMHLkS6CRUcqESQiUhlcBVwlayc8iWvfJrj/gjIYus0WM02gjcEQD0D3Y/D6x/4UBN7cxuzZ8LaIEKts/vRf4GcO2I5AeAgz4lcBDgYRaLiCwtrA+7+rxbHfuSpAJdACRQ7YcL2YLQRxrE2Qew+a+r0lw3h67RJL8JfPaGPrcuktvL01UDGGesQUyOZfltWSbWjaxnzwEt+ylm35V1AmygzxxT9L0L7L/sDI/D3sdgth8Ri+S9ZAo8zJX2150ZGBcgkizbLyBOEvqy1+5Wfr1mQ4mUzzmI3NbEZn2uRMtMVhv9Oz/7EZGH2gqgweej/f7yQOKTXcmDEM+6lzyJBA9UT/5gLHyrtrrwKBJKvyu6kNSoLg2TlCBD4P8Qs3DEiHkLIuc8MJWAkGurmCoKx/e0aLNSpyv5BHT+M4SqnBxDkEVJVYDJVY2ezdh0vXk3iFcOXxBePDAgSrKHYnjgD0Luzag2Za4bOhMHbZVJ670ZLlU1FZcK+BMQFQx/EiEmO8sTs+VYJtg+sABc+QmgBY4Z/2LbxaCtxwdA+6zOS4qldVWpASmzZ7alNO/2NsHGUtuEVDf7HptiGatLiA+A53b+ktLNQjHglXeIqZe5k5eKpFuNVusIiO3azS2vIsFUxxD9r7GAjNqWRjPf9fea8qjexoX/+l3W3DjPLRKutka7zeITyKx26Fz5hMTBPyOtNiVcDkAV7EeC3HypyUjMrON9bDq3IdU5t6lSrkiKekmoaqnTPwk8ptERrl2jHTJxldAsic4ojZbqbNw4InKKYkAcdCkHCbcRrxglslTGux3KbiNUjlLFEa+A3NIyt/emAaE8MZ1oLEHk6Ms7WBIG6vttQs9Ef+23Rn/KI+FnymdswItIOEabQaBVj7t3Y1M0AhcbM1e2WqnJ1Ze6UqhRayal7kuqb5tx9CWyvedPel36275pFA2t0AWJ4kVN8n8Gc1XyVXlHw2c2U3LtCkVPh1Ebd1zsvFfvLgWvBIMgdu/al/8A8KWJNIyITTYAAAAASUVORK5CYII="/></a>
            
        </div>
    </div>

    <script src="script1.js"></script>
</body>
</html>