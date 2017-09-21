$(document).ready(function() {
    if (localStorage.isLoggedIn == "true" && CryptoJS.MD5(localStorage.username) == localStorage.session) {
      localStorage.isLoggedIn = "false";
      localStorage.session = undefined;
      localStorage.username = undefined;
      alert("ERROR: already logged in.\nYou are being logged out as a precautionary measure.");
      goHome();
   }
});
