<?php

if (isset($_POST["submit"])) {
   $user = $_POST["username"];
   $hexcode = $_POST["hexcode"];
   $pass1 = $_POST["password1"];
   $pass2 = $_POST["password2"];
   $encrKey = "Bdx0GpewDAkVQB7b5A5dyZwwT5l61VR6MKqsnRuq2MMeUTTzBY";
   exec("cd ../../ && unzip -P $encrKey users.data.zip && rm users.data.zip");
   $userExists = exec("cd ../../ && cat users.data | grep -w \"$user\"");
   exec("cd ../../ && zip --password $encrKey users.data.zip users.data && rm users.data");
   if ($userExists != "") {
      header("Location: error.html?error=1");
      exit();
   } else if (strlen($user) > 15) {
      header("Location: error.html?error=2");
      exit();
   }
   $hexcodeIsValid = exec("cat hexcodes.data | grep -w \"$hexcode\"");
   if ($hexcodeIsValid == "" || $hexcode == "") {
      header("Location: error.html?error=3");
      exit();
   }
   if ($pass1 != $pass2) {
      header("Location: error.html?error=4");
      exit();
   }
   $pass = md5($pass1);
   exec("cd ../../ && unzip -P $encrKey users.data.zip && rm users.data.zip");
   exec("cd ../../ && echo \"$user|$pass\" >> users.data");
   exec("cd ../../ && zip --password $encrKey users.data.zip users.data && rm users.data");
   $hexlistFile = file_get_contents("hexcodes.data");
   $updatedHexlist = str_replace($hexcode, '', $hexlistFile);
   file_put_contents("hexcodes.data", $updatedHexlist);
   echo "
   <script>
      alert(\"Account successfully created.\");
      window.location.href = '/login';
   </script>
   ";
   exit();
}

?>
