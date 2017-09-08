<!doctype html>
<html lang="">
   <head>
       <meta charset="utf-8">
       <title>The Cave - Posts</title>
       <link rel="icon" href="../icon.png">
       <link rel="stylesheet" href="../css/main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="../js/md5.js"></script>
       <script src="../js/main.js"></script>
       <script src="../js/posts.js"></script>
   </head>
    <body>

      <div id="header">
         <table onclick="goHome()" class="pointer">
            <tr>
               <td width="50"><img src="../icon-white.png" height="50" width="50" id="headerImg"></td>
               <td id="headerText">The Cave</td>
            </tr>
         </table>
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
         <h2>Posts</h2>
         <hr width="800" color="black" size="2">
         <div id="postsList">


<?php

$posts_JSON = file_get_contents("posts.json");
$posts_data = json_decode($posts_JSON);


for ($i=0; $i < count($posts_data); $i++) {
   $postNAME = $posts_data[$i]->name;
   $postAUTHOR = $posts_data[$i]->author;
   $postDATE = $posts_data[$i]->date;
   $postCATEGORY = $posts_data[$i]->category;
   $postID = $posts_data[$i]->id;
   $postCONTENT = $posts_data[$i]->content;
   $postCONTENTprev = substr(htmlentities(preg_replace('#\<(.*?)\>#', ' ', $postCONTENT)), 0, 70) . "...";
   echo "<div class=\"postListTtem\" onclick=\"window.location.href='posts/$postID'\">\n";
   echo "<span class=\"postName\">$postNAME</span>\n<br>\n$postCONTENTprev\n</span><br>\n";
   echo "<span class=\"postInfo\">$postAUTHOR - $postDATE<br>&gt;&gt;&gt;$postID <span class=\"postCategory\">$postCATEGORY</span></span>\n";
   echo "<hr width=\"700\" color=\"black\" size=\"1\">\n</div>";
}


echo "</div>\n</div>\n</body>\n</html>";
?>
