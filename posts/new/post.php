<?php

   if (isset($_POST["submit"])) {
      $postAUTHOR = $_POST["username"];
      $postANON = $_POST["anonymous"];
      if ($postANON) {
         $postAUTHOR = "Anonymous";
      }
      $postTITLE = $_POST["title"];
      $postCATEGORY = $_POST["catagory"];
      $postCONTENT = $_POST["content"];
      date_default_timezone_set("UTC");
      $postDATE = date("d/m/Y");
      $randnum = "111111111";
      $existingIDs = file_get_contents("../IDs.list");
      $repeating = true;
      while ($repeating) {
         $randnum = (string)mt_rand(111111112,999999999);
         if (strpos($existingIDs, $randnum) === false) {
            $repeating = false;
         }
      }
      $postID = $randnum;
      $posts_JSON = file_get_contents("../posts.json");
      $posts_data = json_decode($posts_JSON);
      $postJSON = new stdClass();
      $postJSON->name = $postTITLE;
      $postJSON->author = $postAUTHOR;
      $postJSON->date = $postDATE;
      $postJSON->category = $postCATEGORY;
      $postJSON->id = $postID;
      $postJSON->content = $postCONTENT;
      array_push($posts_data,$postJSON);
      $postIndex = (string)count($posts_data)-1;
      file_put_contents("../posts.json", json_encode($posts_data));
      exec("cd ../ && mkdir $postID && cd $postID && touch comments.data && cp ../111111111/index.php . && cp ../111111111/comment.php .");
      exec("cd ../ && echo \"$postID,\" >> IDs.list");

      $indexPHPasArr = file("../$postID/index.php");
      $indexPHPasStr = file_get_contents("../$postID/index.php");
      $newcontent = str_replace($indexPHPasArr[2], "\$postIndex = $postIndex;\n", $indexPHPasStr);
      file_put_contents("../$postID/index.php", $newcontent);

      $commentPHPasArr = file("../$postID/comment.php");
      $commentPHPasStr = file_get_contents("../$postID/comment.php");
      $newcontent = str_replace($commentPHPasArr[10], "      header(\"Location: ../$postID/\");\n", $commentPHPasStr);
      file_put_contents("../$postID/comment.php", $newcontent);
      header("Location: ../");
      exit();


   }
?>
