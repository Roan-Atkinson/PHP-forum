<?php

   if (isset($_POST["submit"])) {

      $username = $_POST["username"];
      $toDeletePostID = $_POST["postID"];

      $posts_JSON = file_get_contents("../posts.json");
      $posts_data = json_decode($posts_JSON);

      $foundPost = false;
      for ($i=0; $i < count($posts_data); $i++) {
         $postID = $posts_data[$i]->id;
         $postAUTHOR = $posts_data[$i]->author;
         if ($toDeletePostID == $postID) {
            $postIndex = $i;
            $foundPost = true;
            break;
         }
      }
      if (!$foundPost) {
         header("Location: error.html?error=1");
         exit();
      }
      if ($username == "Anonymous" && $username != "admin") {
         header("Location: error.html?error=2");
         exit();
      }
      if ($username != $postAUTHOR) {
         if ($username != "admin") {
            header("Location: error.html?error=3");
            exit();
         }
      }

      exec("cd ../ && rm -r $postID");
      $postIDsFile = file_get_contents("../IDs.list");
      $updatedPostIDs = str_replace("$postID,", '', $postIDsFile);
      file_put_contents("../IDs.list", $updatedPostIDs);

      unset($posts_data[$postIndex]);
      file_put_contents("../posts.json", json_encode($posts_data));

      echo "
         <script>
            alert(\"Post successfully deleted.\");
            window.location.href = \"/posts\";
         </script>
      ";
      exit();

   }
?>
