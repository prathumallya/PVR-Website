document.addEventListener("DOMContentLoaded", function () {
    // Handle Sign In & Sign Up Forms
    const signUpButton = document.getElementById('signUpButton');
    const signInButton = document.getElementById('signInButton');
    const signInForm = document.getElementById('signIn');
    const signUpForm = document.getElementById('signup');

    if (signUpButton && signInButton && signInForm && signUpForm) {
        signUpButton.addEventListener('click', function () {
            signInForm.style.display = "none";
            signUpForm.style.display = "block";
        });

        signInButton.addEventListener('click', function () {
            signInForm.style.display = "block";
            signUpForm.style.display = "none";
        });
    }

    // Close Sign-In Form
    function closeForm() {
        let signInElement = document.getElementById("signIn");
        if (signInElement) signInElement.style.display = "none";
    }

    // Toggle User Dropdown
    let userCircle = document.getElementById("userCircle");
    let userDropdown = document.getElementById("userDropdown");

    if (userCircle && userDropdown) {
        userCircle.addEventListener("click", function (event) {
            event.stopPropagation();
            userDropdown.style.display = userDropdown.style.display === "block" ? "none" : "block";
        });

        // Hide dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!userCircle.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.style.display = "none";
            }
        });
    }

    // Logout Button
    let logoutButton = document.getElementById("logoutButton");
    if (logoutButton) {
        logoutButton.addEventListener("click", function () {
            window.location.href = 'logout.php';
        });
    }

    // Handle Error Message Animation
    let errorBox = document.getElementById("errorBox");
    if (errorBox) {
        errorBox.style.transition = "opacity 0.5s ease-in-out, box-shadow 0.3s ease-in-out";
        errorBox.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";

        setTimeout(() => {
            errorBox.style.opacity = "0"; // Fade out
            setTimeout(() => errorBox.remove(), 300); // Remove from DOM
        }, 3000);
    }

    // Auto-Logout after 5 Minutes of Inactivity
    let timeout;
    function resetTimer() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            window.location.href = 'logout.php';
        }, 300000); // 5 minutes
    }

    resetTimer(); // Initialize timer
    document.addEventListener("mousemove", resetTimer);
    document.addEventListener("keypress", resetTimer);
    document.addEventListener("touchstart", resetTimer);
});
