<!doctype html>
<html lang="">
   <head>
       <meta charset="utf-8">
       <title>The Forum - Login</title>
       <link rel="icon" href="../../icon.png">
       <link rel="stylesheet" href="../../css/main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="../../js/main.js"></script>
       <script src="../../js/md5.js"></script>
       <script>
          $(document).ready(function() {
             function getQueryParams(qs) {
                 qs = qs.split('+').join(' ');

                 var params = {},
                     tokens,
                     re = /[?&]?([^=]+)=([^&]*)/g;

                 while (tokens = re.exec(qs)) {
                     params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
                 }

                 return params;
             }

             var indicator = document.getElementById("indicator").style.backgroundColor = "#ff0000";

             var params = getQueryParams(document.location.search);
             var error = document.getElementById("error");
             switch (params.error) {
                case "1":
                   error.innerHTML = "User already exists";
                   break;
                case "2":
                  error.innerHTML = "Username is too long (more than 15 chars)";
                  break;
               case "3":
                  error.innerHTML = "Incorrect hex code";
                  break;
               case "4":
                  error.innerHTML = "Passwords do not match";
                  break;
                default:
                  error.innerHTML = "An unknown error occurred.";
             }
          });
       </script>
   </head>
    <body>

      <div id="header">
         <table onclick="window.location='../../'" class="pointer">
            <tr>
               <td width="50"><img src="../../icon-white.png" height="50" width="50" id="headerImg"></td>
               <td id="headerText">The Forum</td>
            </tr>
         </table>
      </div>
      <div id="indicatorDiv">
         Logged in: <div id="indicator">&nbsp;</div>
      </div>

      <div class="content">
         <h2>Error</h2>
         <br>
         <p id="error">

         </p>
      </div>

   </body>
</html>
