<!doctype html>
<html lang="">
   <head>
       <meta charset="utf-8">
       <title>The Forum - Register</title>
       <link rel="icon" href="../../icon.png">
       <link rel="stylesheet" href="../../css/main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="../../js/main.js"></script>
       <script src="../../js/md5.js"></script>
       <script src="../../js/register.js"></script>
       <script>
          var url = window.location.href.substring(0,window.location.href.length - document.location.search.length);
          if (url.slice(-1) != "/") {
             window.location.href = url+"/"+document.location.search;
          }
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
         <h2>Register</h2>
         <br>
         <form action="register.php" method="post">
            <input placeholder="username" name="username" type="text" class="loginField" autocomplete = "off" autofocus>
            <br>
            <input placeholder="password" name="password1" type="password" class="loginField" autocomplete = "off">
            <br>
            <input placeholder="confirm" name="password2" type="password" class="loginField" autocomplete = "off">
            <br><br>
            <input type="submit" value="register" class="loginButton" name="submit">
         </form>
      </div>

   </body>
</html>
