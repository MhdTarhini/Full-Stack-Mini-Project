function getParam(param) {
  let url = window.location.search;
  let urlParams = new URLSearchParams(url);
  return urlParams.get(param);
}

const username = getParam("username");

document.getElementsByClassName("username")[0].innerText = username;
