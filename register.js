  document.querySelector('form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = e.target.email.value;
    const password = e.target.pwd.value;
    const confirmPassword = e.target['confirm-pwd'].value;

    if (password !== confirmPassword) {
      alert('Passwords do not match!');
      return;
    }

    try {
      await firebase.auth().createUserWithEmailAndPassword(email, password);
      alert('Registration successful!');
      window.location.href = 'login.html'; // Redirect to the login page
    } catch (error) {
      alert(error.message);
    }
  });
