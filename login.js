document.querySelector('form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = e.target.email.value;
    const password = e.target.pwd.value;

    try {
      await firebase.auth().signInWithEmailAndPassword(email, password);
      alert('Login successful!');
      window.location.href = 'home.html'; // Redirect to the home page
    } catch (error) {
      alert(error.message);
    }
  });