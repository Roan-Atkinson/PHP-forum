$(document).ready(function() {
   if (localStorage.isLoggedIn == "false" || CryptoJS.MD5(localStorage.username) != localStorage.session) {
      alert("This content is restricted to users.\nLog in or create an accout to view it.");
      window.location.href = '../';
   }
   updateCategoryColors();
   var url = window.location.href;
   if (url.slice(-1) == "/") {
      window.location = url.slice(0, -1);
   }
});

function updateCategoryColors() {
   var tags = document.getElementsByClassName("postCategory");
   for (var i = 0; i < tags.length; i++) {
      var tag = tags[i];
      var content = tag.innerHTML;
      tag.style.fontWeight = "bold";
      switch (content) {
         case "general":
            tag.style.backgroundColor = "#3ab54a";
            tag.style.color = "black";
            break;
         case "hacking":
            tag.style.backgroundColor = "black";
            tag.style.color = "#00ff00";
            break;
         case "scripting":
            tag.style.backgroundColor = "#0080ff";
            tag.style.color = "#e6e600";
            break;
         case "ethics":
            tag.style.backgroundColor = "#ffff00";
            tag.style.color = "black";
            break;
         case "social engineering":
            tag.style.backgroundColor = "#c5b358";
            tag.style.color = "black";
            break;
         case "wireless":
            tag.style.backgroundColor = "white";
            tag.style.color = "#0099ff";
            break;
         case "bluetooth":
            tag.style.backgroundColor = "black";
            tag.style.color = "#0099ff";
            break;
         case "mitm":
            tag.style.backgroundColor = "#cc0000"
            tag.style.color = "white";
            break;
         case "networking":
            tag.style.backgroundColor = "#982e59";
            tag.style.color = "#cccccc";
            break;
         case "xss":
            tag.style.backgroundColor = "#ff8000";
            tag.style.color = "black";
            break;
         case "sqli":
            tag.style.backgroundColor = "black";
            tag.style.color = "#cc33ff";
            break;
         case "arduino":
            tag.style.backgroundColor = "#007399";
            tag.style.color = "black";
            break;
      }
   }
}
