document.querySelector('form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = e.target.email.value;
    const password = e.target.pwd.value;

    try {
      await firebase.auth().signInWithEmailAndPassword(email, password);
      if (email === "mohmmad521@hotmail.com"){
        window.location.href = 'adminPage.php';
      } else {
        window.location.href = 'home.php'; 

      }
    } catch (error) {
      alert(error.message);
    }
  });