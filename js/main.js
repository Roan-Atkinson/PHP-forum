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

function goHome() {
   window.location.href = '/';
}

function gotoPosts() {
   if (localStorage.isLoggedIn == "false" || CryptoJS.MD5(localStorage.username) != localStorage.session) {
      alert("This content is restricted to users.\nLog in or create an accout to view it.");
   } else {
      window.location.href = '/posts';
   }
}

function gotoNewPost() {
   window.location.href = '/posts/new';
}

function gotoDelPosts() {
   window.location.href = '/posts/delete';
}

function gotoLogin() {
   window.location.href = '/login';
}

function gotoRegister() {
   window.location.href = '/login/register';
}

function logout() {
   localStorage.isLoggedIn = "false";
   localStorage.session = undefined;
   localStorage.username = undefined;
}
