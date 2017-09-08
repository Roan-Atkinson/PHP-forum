<?php

   if (isset($_POST["submit"])) {
      $comment = $_POST["comment"];
      $anon = $_POST["anonymous"];
      $username = $_POST["username"];
      if ($anon) {
         $username = "Anonymous";
      }
      exec("echo \"<span class='commentUser'>$username</span><br><span class='comment'>$comment</span><br><br>\" >> comments.data");
      header("Location: ../0984203984");
      exit();
   }

?>
