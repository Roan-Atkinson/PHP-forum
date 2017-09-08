$(document).ready(function() {
    if (localStorage.isLoggedIn == "true" && CryptoJS.MD5(localStorage.username) == localStorage.session) {
      localStorage.isLoggedIn = "false";
      localStorage.session = undefined;
      localStorage.username = undefined;
      alert("ERROR: already logged in.\nYou are being logged out as a precautionary measure.");
      goHome();
   }
   var url = window.location.href;
   if (url.slice(-1) == "/") {
      window.location = url.slice(0, -1);
   }
});
