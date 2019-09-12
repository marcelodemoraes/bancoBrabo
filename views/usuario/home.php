<?php if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } ?>
	
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<title>Banco Brabo - Página Inicial</title>
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="O banco mais incrível de todos">
	<meta name="author"      content="Alexandre, Flávio, Gabriel, Marcelo, Yasmin">
	<link rel="stylesheet" href="<?php echo SRC_PATH; ?>css/bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo SRC_PATH; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo SRC_PATH; ?>color/default.css" >
	<link rel="shortcut icon" href="<?php echo SRC_PATH; ?>img/favicon.ico">
	<!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
	======================================================= -->
</head>

<body>
	<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
					<h1 class="brand"><a href="<?php echo BASE_URL; ?>">Banco Brabo</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="team"  href="#about">Sobre</a></li>
							<li><a title="login" href="#login">Login</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	<div id="header-wrapper" class="header-slider">
		<header class="clearfix">
			<div class="logo">
				<img width="600px" src="<?php echo SRC_PATH; ?>img/logo_banco_brabo.png" alt="Banco Brabo" />
			</div>
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="main-flexslider" class="flexslider">
							<ul class="slides">
								<li>
									<p class="home-slide-content">
										Banco <strong>Brabo</strong>
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										<strong>Rich</strong> and sucessfull
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										Você mais <strong>poderoso</strong>
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										Funciona
									</p>
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>
		</header>
	</div>
	<!-- spacer section -->
	<section class="spacer green">
		<div class="container">
			<div class="row">
				<div class="span6 alignright flyLeft">
					<blockquote class="large">
						Quanto mais a gente rala, mais a gente cresce <cite>Charlie Brown</cite>
					</blockquote>
				</div>
				<div class="span6 aligncenter flyRight">
					<i class="icon-coffee icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->

	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<h4>Quem somos nós</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2>Nós vivemos com <strong>segurança</strong></h2>
						<p>
							Todos muito dedicados à segurança da informação e membros exemplares do Ganesh.
						</p>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
						<img src="<?php echo SRC_PATH; ?>img/icons/creativity.png" alt="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span2 offset1 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="<?php echo SRC_PATH; ?>img/team/img-1.jpg" alt="" />
						<h3>Flávio Salles</h3>
						<p>
							Art director
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="<?php echo SRC_PATH; ?>img/team/img-2.jpg" alt="" />
						<h3>Gabriel Van Loon</h3>
						<p>
							Web developer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="<?php echo SRC_PATH; ?>img/team/img-3.jpg" alt="" />
						<h3>Marcelo de Moraes</h3>
						<p>
							Web designer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="<?php echo SRC_PATH; ?>img/team/img-4.jpg" alt="" />
						<h3>Yasmin Araujo</h3>
						<p>
							UI designer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="<?php echo SRC_PATH; ?>img/team/img-5.jpg" alt="" />
						<h3>Alexandre Junior</h3>
						<p>
							Digital imaging
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->
	
	<!-- spacer section -->
	<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						Seu dinheiro, nosso lucro
				</div>
				<div class="span12 aligncenter flyRight">
					<i class="icon-rocket icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->

	
	<!-- section: contact -->
	<section id="login" class="section green">
			<div class="container">
				<h4>Login</h4>
				<div class="blankdivider30">
				</div>
				<div class="row">
					<div class="span12">
						<div class="cform" id="contact-form">
							<div id="sendmessage">Your message has been sent. Thank you!</div>
							<div id="errormessage"></div>
							<form action="" method="post" role="form" class="contactForm">
								<div class="row">
									<div class="span6">
										<div class="field your-name form-group">
											<input type="text" name="login" class="form-control" id="login" placeholder="Login" required/>
											<div class="validation"></div>
										</div>
										<div class="field your-email form-group">
											<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required/>
											<div class="validation"></div>
										</div>
										<input type="submit" value="Entrar" class="btn btn-theme pull-left">
									</div>
								</form>
								<form action="" method="post" role="form" class="contactForm">
									<div class="span6">
											<div class="field your-name form-group2"><div class="field your-name form-group2">
													<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required/>
													<div class="validation"></div>
												</div>
													<input type="text" name="login" class="form-control" id="login" placeholder="Login" required />
													<div class="validation"></div>
												</div>
												<div class="field your-email form-group2">
													<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required />
													<div class="validation"></div>
												</div>
										<input type="submit" value="Cadastrar" class="btn btn-theme pull-left">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- ./span12 -->
				</div>
			</div>
		</section>

		<!-- end section contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
					</ul>
					<p class="copyright">
						&copy; Banco Brabo. All rights reserved.
						<div class="credits">
							<!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
              -->
							Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
						</div>
					</p>
				</div>
			</div>
		</div>
		<!-- ./container -->
	</footer>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="<?php echo SRC_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/jquery.scrollTo.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/jquery.nav.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/jquery.localScroll.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/bootstrap.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/jquery.prettyPhoto.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/isotope.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/jquery.flexslider.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/inview.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/animate.js"></script>
	<script src="<?php echo SRC_PATH; ?>js/custom.js"></script>
	<script src="<?php echo SRC_PATH; ?>contactform/contactform.js"></script>

</body>

</html>