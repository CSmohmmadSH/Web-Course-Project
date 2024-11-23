<?php include 'header.php'; ?>

<head> 
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="home.css">

    <script src="https://www.gstatic.com/firebasejs/9.17.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.17.1/firebase-auth-compat.js"></script>
    <script>
        const firebaseConfig = {
        apiKey: "AIzaSyAruUqBPpFBJQjhhVFNUcNebu2RkWTKIuI",
        authDomain: "web-project-5e1e0.firebaseapp.com",
        projectId: "web-project-5e1e0",
        storageBucket: "web-project-5e1e0.firebasestorage.app",
        messagingSenderId: "941427731414",
        appId: "1:941427731414:web:743ec8d5744e3111b59277",
        measurementId: "G-2KB3D8090V"
    };

    const app = firebase.initializeApp(firebaseConfig);
    </script>
</head>

        <div class="container">
            <form id="password-reset-form">
            <h1>Reset Password</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="reset-email" type="email" name="email" class="form-control" required />
            </div>
                <input type="submit" class="buttons" value="Send Link"></input>
                <a href="register.php">New Account</a>
                <a id="Login-page" href="login.php">Back to Login</a>
            </form>
        </div>
    <script src="passwordRest.js"></script>
</body>

<?php include 'footer.php'; ?>