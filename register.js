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

  var passwordField = document.getElementById("password-input");
  var passwordContainer = document.getElementById("password-container");
  var elem1=document.createElement("label");
  var elem2=document.createElement("label");
  var elem3=document.createElement("label");
  var elem4=document.createElement("label");
  var elem5=document.createElement("label");



  passwordField.addEventListener("input" , function(){
    var password = passwordField.value;

    if (password.length >= 8) {
        elem1.style.color = "green";
    } else {
        elem1.style.color = "red";
    }

    if (/\d/.test(password)) {
        elem2.style.color = "green";
    } else {
        elem2.style.color = "red";
    }

    if (/[A-Z]/.test(password)) {
        elem4.style.color = "green";
    } else {
        elem4.style.color = "red";
    }

    if (/[a-z]/.test(password)) {
        elem3.style.color = "green";
    } else {
        elem3.style.color = "red";
    }

    if (/^[A-Za-z0-9]*$/.test(password)) {
      elem5.style.color = "green";
  } else {
      elem5.style.color = "red";
  }
});

  passwordField.addEventListener("click" , function(){
    passwordContainer.innerHTML = '';
    

    elem1.textContent = "password must be at least 8 characters long";
    elem1.style.color = "red";
    elem1.style.display = "inline-block";
    elem1.style.marginBottom = "10px";
    passwordContainer.appendChild(elem1);
    
    elem2.textContent = "Password must have at lest one numerical value";
    elem2.style.color = "red";
    elem2.style.display = "inline-block";
    elem2.style.marginBottom = "10px";
    passwordContainer.appendChild(elem2);

    elem3.textContent = "Password must have at lest one lowercase letter";
    elem3.style.color = "red";
    elem3.style.display = "inline-block";
    elem3.style.marginBottom = "10px";
    passwordContainer.appendChild(elem3);

    elem4.textContent = "Password must have at lest one uppercase letter";
    elem4.style.color = "red";
    elem4.style.display = "inline-block";
    elem4.style.marginBottom = "10px";
    passwordContainer.appendChild(elem4);

    elem5.textContent = "Password should not contain any special characters";
    elem5.style.color = "red";
    elem5.style.display = "inline-block";
    elem5.style.marginBottom = "10px";
    passwordContainer.appendChild(elem5);
    
    passwordContainer.style.marginBottom = "10px";

    
  });

  var passwordConfirmField = document.getElementById("password-confirm-input");
  var passwordConfirmContainer = document.getElementById("password-confirm-container");
  var elem6=document.createElement("label");

  passwordConfirmField.addEventListener("click",function(){

    elem6.textContent = "password confirmation does not match";
    elem6.style.color = "red";
    elem6.style.display = "inline-block";
    elem6.style.marginBottom = "10px";
    passwordConfirmContainer.appendChild(elem6);
  });


  passwordConfirmField.addEventListener("input", function(){
    
    var password = passwordConfirmField.value;

    if (password === passwordField.value){
      elem6.style.color = "green";
      elem6.textContent = "password confirmation does match" ;

    } else {
      elem6.style.color = "red";

    }
  });