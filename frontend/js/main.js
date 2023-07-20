// Sign in
let signin_button = document
  .querySelector(".sign-in")
  .addEventListener("click", getValidation);

function getValidation() {
  let username_input = document.getElementById("inputUsername");
  let user_password = document.getElementById("inputPassword");
  let button = document.querySelector(".sign-in");
  let input_data = {
    username: username_input.value,
    password: parseInt(user_password.value),
  };
  fetch("http://localhost/Full%20Stack%20Mini%20Project/backend/signin.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(input_data),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "logged in") {
        button.style.backgroundColor = "green";
        isSignin(data);
      } else {
        button.style.backgroundColor = "red";
      }
    });
}

function isSignin(data) {
  document.getElementsByClassName("username").innerHtml = data.username;
}
