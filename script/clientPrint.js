import { API_URL } from "/10dance-v1.0.1-orientation-day/script/apiService.js";
const urlParams = new URLSearchParams(window.location.search);

window.onload = async () => {
  try {
    // ?id= אוסף קווארי סטרינג
    const userId = urlParams.get("id");
    const url = API_URL + "singleStudent.php?id=" + userId;
    const res = await fetch(url);
    const data = await res.json();
    renderToHTML(data[0]);
  } catch {}
};

const renderToHTML = (_studentItem) => {
  document.querySelector("#name").innerHTML =
    _studentItem.first + " " + _studentItem.last;
  document.querySelector("#institute").innerHTML = _studentItem.class;
  setTimeout(() => {
    window.print();
    timer();
  }, 100);
};

const timer = function () {
  const postPrintURL = urlParams.get("post-print-url");
  setTimeout((e) => {
    window.location = postPrintURL;
  }, 200);
};
