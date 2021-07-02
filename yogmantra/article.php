<?php 
    include_once("includes/session.php");
    include_once("includes/config.php");

    $getid = mysql_real_escape_string(trim($_GET['id']));


    if($getid != '')
    {
    	//Select Blog article
	    $getblog = "SELECT * FROM blog WHERE blog_code='$getid'";
	    $gettingblog = mysql_query($getblog);

	    $updateblog = "UPDATE blog SET counter=counter+1 WHERE blog_code='$getid'";
	    $updatingblog = mysql_query($updateblog);
    }else{
    	header("Location:blog.php");
    }   
    
?>
<!DOCTYPE html>
<html lang="uk">
	<head>
		<title>Yoga at 50</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!--[if lte IE 8]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if lt IE 8]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/bxslider.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/selectric.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/adaptive.css" media="screen" />

		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.selectric.min.js"></script>
		<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
<body class="single-event">
	<header id="header" class="clear">
		<div class="headerWrap clear">
			
			<nav class="mainMenu">
				<ul class="clear">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li class="current-menu-item">
						<a href="about.html">About</a>
						<ul>
							<li><a href="mystory.html">Meet Yogmantra</a></li>
							<li><a href="recipes.html">Healthy Food Recipes</a></li>
						</ul>
					</li>
					<li>
						<a href="classes.html">Classes</a>
					</li>
					<li>
						<a href="gallery.html">Gallery</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
			<span class="showMobileMenu">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</span>
		</div>
	</header>
	<section class="container">
		<div class="pageHeader" style="background-image: url(images/content/singleEvent05.jpg); margin-bottom:50px">
		</div>
		<div class="contentWrap">
			<?php if(mysql_num_rows($gettingblog) > 0): ?>
			<?php while($blogrow = mysql_fetch_array($gettingblog)):?>
			<div class="wrapper">			
				<div class="singlePostWrap">
					<h1><?php echo $blogrow['title'];?></h1>
					<p><?php echo $blogrow['summary'];?></p>
					<p><?php echo $blogrow['body'];?></p>
					<h4>Comments</h4>
					<?php 
						$blog_code = $blogrow['blog_code'];

						//Select Blog article
					    $getblogcomm = "SELECT * FROM comment WHERE comment_blog='$blog_code'";
					    $gettingblogcomm = mysql_query($getblogcomm);

						if(mysql_num_rows($gettingblogcomm) > 0){ 
					?>
					<?php while($blogcommrow = mysql_fetch_array($gettingblogcomm)):?>
					<p>
						<ul>
							<li><sup><?php echo $blogcommrow['comment_author'];?></sup><br>
							<?php echo $blogcommrow['comment_body'];?></li>
						</ul>
					</p>
					<?php endwhile;?>
					<?php }else{ ?>
					<p>No comments.</p>
					<?php } ?>
				</div>
			</div>

			<div class="subscribeBox" style="background-image: url(images/content/subscribe.jpg);">
				<i class="iconEmail"></i>
				<h3>Leave</h3>
				<p>Your Comment</p>
				<form class="clear" action='commenting.php' method="POST">
					<input class="" type="hidden" name="comment_blog" value="<?php echo $blogrow['blog_code'];?>" >
					<input class="" type="text" name="comment_author" value="" placeholder="Your Name" required>
					<textarea name="comment_body" value="" placeholder="Your Comment" required></textarea>
					<input class="subscribeSubmit" type="submit" value="Submit">
				</form>
			</div>

			<?php endwhile;?>
			<?php endif;?>
		</div>
	</section>

	<footer id="footer" class="clear">
		<div class="footerSocial clear">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-instagram"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
		</div>
		<ul class="footerMenu clear">
			<li><a href="about.html">About</a></li>
			<li><a href="classes.html">Classes</a></li>
			<li><a href="gallery.html">Gallery</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
		<div class="footerSubscribe">
			<form>
				<input class="" type="text" name="" size="20" value="" placeholder="Your email">
				<input class="btnSubscribe" type="submit" value="Subscribe">
			</form>
		</div>
		<div class="copyright">
			<p>Copyright &copy; 2021. Designed by <a href='https://www.linkedin.com/in/tiyasha-banerjee-06/' target='_blank'>Tiyasha Banerjee</a></p>
		</div>
	</footer>
	<div class="mobileMenu">
		<ul>
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="current-menu-item">
				<a href="about.html">About</a>
				<ul class="sub-menu">
					<li><a href="mystory.html">Meet Alexis</a></li>
					<li><a href="recipes.html">Healthy Food Recipes</a></li>
				</ul>
			</li>
			<li>
				<a href="classes.html">Classes</a>
			</li>
			<li>
				<a href="gallery.html">Gallery</a>
			</li>
			<li>
				<a href="blog.php">Blog</a>
			</li>
			<li>
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</div>
</body>
</html>
