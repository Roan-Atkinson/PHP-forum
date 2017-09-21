<?php

function removeEverythingBefore($in, $before) {
    $pos = strpos($in, $before);
    return $pos !== FALSE
        ? substr($in, $pos + strlen($before), strlen($in))
        : "";
}

if (isset($_POST["submit"])) {
   $user = $_POST["username"];
   $pass = $_POST["password"];
   $encrKey = "Bdx0GpewDAkVQB7b5A5dyZwwT5l61VR6MKqsnRuq2MMeUTTzBY";
   exec("cd ../ && unzip -P $encrKey users.data.zip && rm users.data.zip");
   $crud = exec("cd ../ && cat users.data | grep -w \"$user\"");
   exec("cd ../ && zip --password $encrKey users.data.zip users.data && rm users.data");
   if ($crud == "") {
      header("Location: error.html");
      exit();
   }
   $correctHasedPass = removeEverythingBefore($crud, "|");
   $hasedPassAttempt = md5($pass);
   if ($hasedPassAttempt == $correctHasedPass) {
      $session = md5($user);
      login($user, $session);
   } else {
      header("Location: error.html");
      exit();
   }
}

function login($user, $session) {
   echo "
   <script>
   localStorage.isLoggedIn = \"true\"
   localStorage.session = \"$session\"
   localStorage.username = \"$user\"
   window.location = \"../posts/\"
   </script>
   ";
   exit();
}
?>
