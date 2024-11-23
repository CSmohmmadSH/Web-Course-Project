document.getElementById('password-reset-form').addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default form submission

    const email = document.getElementById('reset-email').value;

    try {
      // Firebase function to send password reset email
    await firebase.auth().sendPasswordResetEmail(email);
    alert("password reset link has been sent to your email. Please check your inbox, and don't forget to check your spam or junk folder if you don't see it.");
    } catch (error) {
      alert(error.message); // Show error message if something goes wrong
    }
});