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
         case "python":
            tag.style.backgroundColor = "#0080ff";
            tag.style.color = "#e6e600";
            break;
         case "sql":
            tag.style.backgroundColor = "black";
            tag.style.color = "#cc33ff";
            break;
         case "javascript":
            tag.style.backgroundColor = "#ebce14";
            tag.style.color = "black";
            break;
         case "php":
            tag.style.backgroundColor = "#5c62a3";
            tag.style.color = "black";
            break;
         case "swift":
            tag.style.backgroundColor = "#fc5835";
            tag.style.color = "black";
            break;
         case "c++":
            tag.style.backgroundColor = "white";
            tag.style.color = "#004482";
            break;
         case "bash":
            tag.style.backgroundColor = "black";
            tag.style.color = "#00ff00";
            break;
      }
   }
}
