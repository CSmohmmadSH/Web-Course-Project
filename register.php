<?php include 'header.php'; ?>


<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="register.css">
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
<body>

    <div class="container">
        <form action="">
            <h1>Register</h1>
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" name="full-name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" maxlength="10" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="confirm-pwd">Confirm Password</label>
                <input type="password" name="confirm-pwd" maxlength="10" class="form-control" required/>
            </div>
            <input type="submit" class="buttons" value="Register" />
            <a href="Login.php">Already have an account? Log in</a>
        </form>
    </div>
    <script src="register.js"></script>
</body>



<?php include 'footer.php'; ?>
