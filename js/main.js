$(document).ready(function() {
   if (localStorage.isLoggedIn != "true") {
      localStorage.isLoggedIn = "false";
   } else if (CryptoJS.MD5(localStorage.username) != localStorage.session) {
      localStorage.isLoggedIn = "false";
      localStorage.session = undefined;
      localStorage.username = undefined;
      alert("Stop fidling with random values its not your buisness.\nYou are being logged out as a precautionary measure.");
      goHome();
   }
   var indicator = document.getElementById("indicator");
   if (localStorage.isLoggedIn == "true" && CryptoJS.MD5(localStorage.username) == localStorage.session) {
      indicator.style.backgroundColor = "#00ff00";
   } else {
      indicator.style.backgroundColor = "#ff0000";
   }
});

function logout() {
   localStorage.isLoggedIn = "false";
   localStorage.session = undefined;
   localStorage.username = undefined;
}
