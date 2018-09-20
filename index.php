<?php
include('dbclass.php');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Zanellazine Ceramics</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">		
        <link rel="stylesheet" href="css/bootstrap.min.css">
       
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="vendor/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="menu">
			<ul>
				<li><a target="eshop">e-shop</a></li>
				<li><a target="about">about us</a></li>
				<li><a target="follow">follow us</a></li>
				<li><a target="contact">contact us</a></li>
			</ul>
		</div>
		<div class="main">
			<div id="landing">
				<div class="container">
					<div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
						<div class="toplogo">
							<!--<span class="helper"></span>--><img class="img-responsive" src="img/logo.png">
						</div>
					</div>
				</div>
				<div class="sld">
					<div class="owl-carousel" id="mainowl">
<?php
$q = "select * from zan_slider order by id desc";
$res=mysqli_query($conn, $q);
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
?>
						<div class="sldbg" style="background:url('<?php echo $row["img"]?>') no-repeat center center; background-size:cover;"></div>
<?php
}
?>						
					</div>
				</div>
			</div>
			<div id="eshop" class="pd-bot" style="min-height:100vh">
				<div class="topsez pd-top pd-bot push-bot">
					<h1 class="white nomargin">E-shop</h1>
				</div>
				<div class="container push-top">
<?php
$q = "select * from zan_prodotti order by pos";
$res=mysqli_query($conn, $q);
$bootstrap_counter=0;
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	if($bootstrap_counter==3){
		$bootstrap_counter=0;
		echo "<div class='clearfix hidden-xs hidden-sm'></div>";
	}
?>				
					<div class="col-md-4 prod">
						<a class="trgmod" id="prod<?php echo $row["id"]?>" data-toggle="modal" data-target="#modServ"><img class="img-responsive fotoprod" src="<?php echo $row["img"]?>"></a>
						<p><?php echo $row["tit"]?></p>
						<p><?php echo $row["prezzo"]?></p>
						<?php if($row["link"]!=""){echo "<p><a class='link' href='".$row["link"]."'>buy now</a></p>";}else{echo "<p><a class='link' href='#contact'>contact us</a></p>";}?>
					</div>
<?php
$bootstrap_counter++;
}
mysqli_close($conn);
?>						
				</div>
			</div>
			<div id="about" class="pd-bot" style="min-height:100vh">
				<div class="topsez pd-top pd-bot push-top push-bot">
					<h1 class="white nomargin">About Us</h1>
				</div>
				<div class="container center push-top">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img class="img-responsive inbl" src="img/about.jpg">
						</div>
					</div>
					<div class="row push-top">
						<div class="col-md-8 col-md-offset-2">
							<p>Zanellazine is the name of the ceramic studio born in 2012 out of the passion for art of two women, Giovanna and Lucia, who are respectively aunt and niece. They share the same aesthetics vision and a common talent. In their ceramic laboratory, surrounded by the green hills of Varese in the north of Italy, they create handcrafted ceramics that reflect their love for nature. </p>
<p>Giovanna Zighetti has been a ceramist for the past 35 years and brings her experience, know-how and technique on the other hand Lucia Zamberletti comes from a fashion background and constantly looks for innovation with enthusiasm and energy </p>
<p>They consider themselves artisans rather than artists. Working with clay is a spontaneous and contemplative process: driven by the present and by the suggestions of the raw material they make unique pieces that always express their aesthetics but also have a functionality.</p>

						</div>
					</div>
				</div>
			</div>
			<div id="follow" class="pd-bot" style="min-height:100vh">
				<div class="topsez pd-top pd-bot push-top push-bot">
					<h1 class="white nomargin">Follow us</h1>
				</div>
				<div class="container push-top">
					<!--<script type="text/javascript">(function() {var sjw = document.createElement("script"); sjw.type = "text/javascript"; sjw.async = true; sjw.src = ("https:" == document.location.protocol ? "https://" : "http://") + "seejay.co/publish/init/?s=YTozOntzOjQ6Imhhc2giO3M6MzI6IjNhZDIxNGM5NTUyMTUwMTdiNzE0ZTIxZTEwOWJhNGU3IjtzOjQ6InBvc3QiO2k6MTtzOjU6ImVtYmVkIjtiOjE7fQ==";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(sjw, s);})(); </script>
					<div id="sjw_3ad214c955215017b714e21e109ba4e7" class="SJ-widget SJ-reset"></div>-->
					<div id="insta"></div>
				</div>
			</div>
			<div id="contact" class="pd-bot" style="min-height:80vh">
				<div class="topsez pd-top pd-bot push-top push-bot">
					<h1 class="white nomargin">contact us</h1>
				</div>
				<div class="container push-top">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="form push-top">
								<input type="text" id="name" name="name" placeholder="Name...">
								<input type="text" id="cog" name="cog" placeholder="Last Name...">
								<input type="text" id="mail" name="mail" placeholder="E-mail...">
								<textarea style="width:100%;height:100px;" name="msg" id="msg" placeholder="Write something..."></textarea>
								<div class="btnform white" id="sbm">Send</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<footer>
				<div class="container">
					<div class="row center pd-top pd-bot">
						<div class="col-md-12">
							<img class="img-responsive inbl logofoot" src="img/logofoot.png">
						</div>
					</div>
					<div class="row white">						
						<div class="col-md-12 center">					
							<div class="social">
								<p>Stay connected and follow us on</p><br><br>
								<a href="https://www.instagram.com/zanellazine" target="_blank"><img src="img/i.png"></a>
								<a href="https://pinterest.com/zanellazine/" target="_blank"><img src="img/p.png"></a>
								<a href="https://www.facebook.com/zanellazinelab" target="_blank"><img src="img/f.png"></a>
							</div>
						</div>
					</div>
					<div class="row center push-top white">
						<p>&copy; 2016 zanellazine - art and craft, ceramic stuff. All rights reserved.</p>
						<p>Contact us at <a href="mailto:zanellazine@gmail.com">zanellazine@gmail.com</a> | (+39) 3356421004 | Varese, Italy |</p>
					</div>
				</div>
			</footer>
		</div>
		
		<div id="totop"><span class="glyphicon glyphicon-arrow-up"></span></div>
		
		<!--modal-->
		<div class="modal fade" tabindex="-1" role="dialog" id="modServ">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="container">
							<div class="row center">
								<div class="col-md-6 col-md-offset-6">
									<h3 class="modal-title"></h3>
									<h4 class="modal-subtitle" style="text-align:right;"></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col-md-6" id="modfoto">
									<img class="img-responsive" id="fotomodal" src="">
									<div class="row push-top">
										<div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2" id="fotoalt1">										
										</div>
										<div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2" id="fotoalt2">
										</div>
										<div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2" id="fotoalt3">
										</div>
									</div>
								</div>
								<div class="col-md-6" id="modtxt">
									<div id="testoprod"></div>
									<div id="btnshop">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/vendor/jquery-1.11.2.min.js"></script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="vendor/owl.carousel.min.js"></script>
		<script src="js/vendor/masonry.pkgd.min.js"></script>
    	<script src="js/vendor/imagesloaded.pkgd.min.js"></script>
        <script src="js/main.js"></script>
		
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85768553-1', 'auto');
  ga('send', 'pageview');

</script>

		<script src="/js/cookiePrivacy.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$.cookiesDirective();
			});
		</script>
		
    </body>
</html>
