let signin_button = document
  .querySelector(".sign-up")
  .addEventListener("click", getRegister);

function getRegister() {
  let username = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  let signup_data = {
    username,
    email,
    password,
  };

  fetch("http://localhost/Full%20Stack%20Mini%20Project/backend/signup.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(signup_data),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        window.location.href = `index.html`;
      } else {
        document.querySelector(".is-exist").innerText =
          "Username is already exist";
      }
      console.log(data);
    })
    .catch((err) => console.log(err));
}
