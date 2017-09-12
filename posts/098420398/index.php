<!doctype html>
<?php
$postIndex = 0;
$posts_JSON = file_get_contents("../posts.json");
$posts_data = json_decode($posts_JSON);

$postNAME = $posts_data[$postIndex]->name;
$postAUTHOR = $posts_data[$postIndex]->author;
$postDATE = $posts_data[$postIndex]->date;
$postCATEGORY = $posts_data[$postIndex]->category;
$postID = $posts_data[$postIndex]->id;
$postCONTENT = $posts_data[$postIndex]->content;
$postCONTENTprev = substr(htmlentities(preg_replace('#\<(.*?)\>#', ' ', $postCONTENT)), 0, 70) . "...";
?>
<html lang="">
   <head>
       <meta charset="utf-8">
       <title>The Forum - <?php echo $postID; ?></title>
       <link rel="icon" href="../../icon.png">
       <link rel="stylesheet" href="../../css/main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="../../js/md5.js"></script>
       <script src="../../js/main.js"></script>
       <script src="../../js/posts.js"></script>
       <script>
         $(document).ready(function() {
            document.getElementById("commentUsername").setAttribute("value", localStorage.username);
         });
       </script>
       <?php
         echo "
            <script>
               $(document).ready(function() {
                  document.getElementById(\"commentForm\").setAttribute(\"action\", \"$postID/comment.php\");
               });
            </script>
         ";
       ?>
   </head>
    <body>

      <div id="header">
         <table onclick="goHome()" class="pointer">
            <tr>
               <td width="50"><img src="../../icon-white.png" height="50" width="50" id="headerImg"></td>
               <td id="headerText">The Forum</td>
            </tr>
         </table>
      </div>
      <div id="backToPostDiv">
         <button id="backToPostsButton" class="pointer" onclick="gotoPosts()">Back to Posts</button>
      </div>
      <div id="indicatorDiv">
         Logged in: <div id="indicator">&nbsp;</div>
      </div>
      <div id="postButtonsDiv">
         <button class="newPostButton pointer" onclick="gotoNewPost()">New Post</button>
         <br>
         <button class="newPostButton pointer" onclick="gotoDelPosts()">Delete Post</button>
      </div>

      <div class="content">
         <div class="post">
            <h2 class="title"><?php echo $postNAME; ?></h2>
            <span class="postInfo"><?php echo $postAUTHOR . " - " . $postDATE . "<br>&gt;&gt;&gt;" . $postID; ?>
               <span class="postCategory"><?php echo $postCATEGORY; ?></span>
            </span>
            <hr width="800" color="black" size="2">
            <div class="postContent">
               <?php echo $postCONTENT; ?>
            </div>
            <hr width="800" color="black" size="1">
            <form method="post" id="commentForm">
               <input placeholder="comment" name="comment" type="text" class="commentField" autocomplete = "off" autofocus>
               <input type="submit" value="comment" class="commentButton" name="submit">
               <input type="checkbox" name="anonymous" value="anonymous">anonymous
               <input type="hidden" name="username" id="commentUsername">
            </form>
            <div class="comments">
<?php

$comments = file_get_contents("comments.data");
echo $comments;


echo "</div>\n</div>\n</div>\n</body>\n</html>";
?>
