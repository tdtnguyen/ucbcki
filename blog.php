<?php
  /** Project: UCBCKI Under Construction
  ** Website Blog (blog.php)
  **
  ** Author: Jerry Bao (jbao@berkeley.edu)
  ** Author: Robert Rodriguez (rob.rodriguez@berkeley.edu)
  ** Author: Diyar Aniwar (diyaraniwar@berkeley.edu)
  ** Author: Sock Ryu (cki.sock@gmail.com)
  ** 
  ** CIRCLE K INTERNATIONAL
  ** COPYRIGHT 2015-2016 - ALL RIGHTS RESERVED
  **/
  $pageTitle = "Blog";
  ini_set('display_errors', 1);
  require_once "admin/dbfunc.php";
  $blogdb = new BlogFunctions;
  $userdb = new UserFunctions;
  if (isset($_GET['from']) && $_GET['from'] > 0) {
    $start = $_GET['from'];
  } else {
    $start = 0;
  }
  $numposts = 6;
  $posts = $blogdb->getRecentPosts($start,$numposts);
?>

<!DOCTYPE html>
<html>
<head> 
  <? require_once "header.php"; ?>
</head>
<body>
  <div class="nav-placeholder"></div>
  <div id="blog-banner" class="jumbotron">
    <div class="container">
      <span>
      <h1>@ucbcki Blog</h1>
      <h3>Want to post an announcement or an article about club-related stuff?</h3> 
      <h4>Submit your ideas to Remy D'Agnillo (contact: cki-publications@lists.berkeley.edu).</h4>
      </span>
    </div>
  </div>
  <ul class="pager">
    <? if (isset($_GET['from']) && $_GET['from'] > 0) { ?>
      <li><a href=<? echo "blog.php?from=". ($start - 6); ?>>Previous</a></li>
    <? } ?>
    <? if (count($posts) == $numposts) { ?>
      <li><a href=<? echo "blog.php?from=". ($start + 6); ?>>Next</a></li>
    <? } ?>
  </ul>
  <? foreach ($posts as $post) { ?>
  <div class="container overlay">  
    <div class="blog-post">
      <div class="blog-content col-md-8"></div>
      <h2 class="blog-post-title"><a href=<?echo "blogpost.php?id=".$post['post_id'];?>><?= $post['title'];?></a></h2>
      <p class="blog-post-meta">Posted <?= date("F d, Y, h:i A",$post['publish_datetime']);?> by <a href="#"><? $author=$userdb->getUserInfo($post['author_id']); echo $author['first_name']; echo " "; echo $author['last_name']; ?></a></p>
      <p><?= $post['story'];?></p>
    </div><!-- /.blog-post -->
  </div>
  <? } ?>
  <ul class="pager">
    <? if (isset($_GET['from']) && $_GET['from'] > 0) { ?>
      <li><a href=<? echo "blog.php?from=". ($start - 6); ?>>Previous</a></li>
    <? } ?>
    <? if (count($posts) == $numposts) { ?>
      <li><a href=<? echo "blog.php?from=". ($start + 6); ?>>Next</a></li>
    <? } ?>
  </ul>
  <? require_once "footer.php"; ?>

</body>
</html>