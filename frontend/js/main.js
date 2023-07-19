let username_input = document.querySelector("#inputUsername");

function getData() {
  fetch("http://localhost/Full%20Stack%20Mini%20Project/backend/signin.php", {
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    });
}
getData();
