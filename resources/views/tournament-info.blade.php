<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#3ed2a7">

	<link rel="shortcut icon" href="./favicon.png" />

	<title>Torneo</title>

	<link rel="stylesheet" href="https://use.typekit.net/qxb8htk.css">

	<link rel="stylesheet" href="{{ asset('assets/vendors/liquid-icon/liquid-icon.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/theme-vendors.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/themes/original.css') }}" />

	<!-- Head Libs -->
	<script async src="{{ asset('assets/vendors/modernizr.min.js') }}"></script>

</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="minimal" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">

	<div id="wrap">

		<div class="titlebar titlebar-sm scheme-light text-center" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url({{ asset('./assets/img/web/'.$tournament->game.'.png') }});">

			<header class="main-header main-header-overlay">

				<div class="mainbar-wrap">
					<div class="megamenu-hover-bg"></div><!-- /.megamenu-hover-bg -->
					<div class="container-fluid mainbar-container">
						<div class="mainbar">
							<div class="row mainbar-row align-items-lg-stretch px-4">

								<div class="col">
									<div class="navbar-header">
										<a class="navbar-brand" href="index.html" rel="home">
											<span class="navbar-brand-inner">
												<img class="logo-dark" src="{{ asset('./assets/img/logo/logo.png') }}" alt="Royal League">
												<img class="logo-light" src="{{ asset('./assets/img/logo/logo.png') }}" alt="Royal League">
												<img class="logo-sticky" src="{{ asset('./assets/img/logo/logo.png') }}" alt="Royal League">
												<img class="mobile-logo-default" src="{{ asset('./assets/img/logo/logo.png') }}"
													alt="Royal League">
												<img class="logo-default" src="{{ asset('./assets/img/logo/logo.png') }}" alt="Royal League">
											</span>
										</a>
										<button type="button" class="navbar-toggle collapsed nav-trigger style-mobile"
											data-toggle="collapse" data-target="#main-header-collapse" aria-expanded="false"
											data-changeclassnames='{ "html": "mobile-nav-activated overflow-hidden" }'>
											<span class="sr-only">Toggle navigation</span>
											<span class="bars">
												<span class="bar"></span>
												<span class="bar"></span>
												<span class="bar"></span>
											</span>
										</button>
									</div><!-- /.navbar-header -->
								</div><!-- /.col -->

								<div class="col text-right">

									<div class="collapse navbar-collapse" id="main-header-collapse" aria-expanded="false"
										role="tablist">

										<ul
											class="main-nav main-nav-hover-underline-1 nav align-items-lg-stretch justify-content-lg-end">
											<li>
												<a href="/">
													<span class="link-icon"></span>
													<span class="link-txt">
														<span class="link-ext"></span>
														<span class="txt">Inicio</span>
													</span>
												</a>
											</li>
											<li>
												<a href="{{ route("tournaments") }}">
													<span class="link-icon"></span>
													<span class="link-txt">
														<span class="link-ext"></span>
														<span class="txt">Torneos</span>
													</span>
												</a>
											</li>
											<li>
												<a href="{{ route("dashboard") }}">
													<span class="link-icon"></span>
													<span class="link-txt">
														<span class="link-ext"></span>
														<span class="txt">Dashboard</span>
													</span>
												</a>
											</li>
											<!--<li>
												<a href="#">
													<span class="link-icon"></span>
													<span class="link-txt">
														<span class="link-ext"></span>
														<span class="txt">Premios</span>
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="link-icon"></span>
													<span class="link-txt">
														<span class="link-ext"></span>
														<span class="txt">Registro</span>
													</span>
												</a>
											</li>-->

										</ul>

										<div class="header-module">

											<!--<a href="#"
												class="btn btn-solid btn-sm round btn-solid border-thick btn-gradient color-secondary font-size-14">
												<span>
													<span class="btn-gradient-bg"></span>
													<span class="btn-txt">Iniciar Sesión</span>
													<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
												</span>
											</a>-->

										</div> <!-- /.header-module -->

									</div><!-- /.collapse -->

									<div class="header-module">

										<!--<a href="#"
											class="btn btn-solid btn-sm round btn-solid border-thick btn-gradient color-secondary font-size-14">
											<span>
												<span class="btn-gradient-bg"></span>
												<span class="btn-txt">Iniciar Sesión</span>
												<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
											</span>
										</a>-->

									</div> <!-- /.header-module -->


								</div><!-- /.col -->

							</div><!-- /.mainbar-row -->
						</div><!-- /.mainbar -->
					</div><!-- /.mainbar-container -->
				</div><!-- /.mainbar-wrap -->

			</header><!-- /.main-header -->

			<div class="titlebar-inner">
				<div class="container titlebar-container">
					<div class="row titlebar-container">
						<div class="titlebar-col col-md-12">
							<h1 id="a"data-fittext="true" data-fittext-options='{ "maxFontSize": 80, "minFontSize": 32 }'>{{ $tournament->game}}</h1>
							<a class="titlebar-scroll-link" href="#content" data-localscroll="true"><i class="fa fa-angle-down"></i></a>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.titlebar -->

		<main id="content" class="content">

			<section class="vc_row pt-50 pb-35">
				<div class="container">
					<div class="row">

						<div class="lqd-column col-md-12">

							<div class="tabs tabs-nav-side tabs-nav-shadowed">
								<ul class="nav tabs-nav" role="tablist">
									<li class="tabs-nav-title">
										<h6 class="font-weight-bold">Información</h6>
									</li>
									<li role="presentation" class="h5 active">
										<a href="#ld-tab-pane-1" aria-expanded="false" aria-controls="ld-tab-pane-1" role="tab" data-toggle="tab">Resumen</a>
									</li>
									<li role="presentation" class="h5">
										<a href="#ld-tab-pane-2" aria-expanded="false" aria-controls="ld-tab-pane-2" role="tab" data-toggle="tab">Reglas</a>
									</li>
									<li role="presentation" class="h5">
										<a href="#ld-tab-pane-3" aria-expanded="false" aria-controls="ld-tab-pane-3" role="tab" data-toggle="tab">Registro</a>
									</li>
									<li role="presentation" class="h5">
										<a href="#ld-tab-pane-4" aria-expanded="false" aria-controls="ld-tab-pane-4" role="tab" data-toggle="tab">Premios</a>
									</li>
								</ul>
								<div class="tabs-content">

									<!-- Resumen -->
									<div id="ld-tab-pane-1" role="tabpanel" class="tabs-pane pl-md-5 fade active in">

										<h2 class="mt-0">{{ $tournament->title }}</h2>

										<div class="fancy-box fancy-box-overlay shadowed scheme-light border-radius-3">

											<div class="cb-img-container border-radius-3">
												<figure
													class="fancy-box-image border-radius-3 bg-left-top"
													style="background-image: url({{ asset('img/torneos/'.$tournament->image) }});"
													data-liquid-blur="true"
													data-blur-options='{ "imgSrc": "backgroundImage", "radius": 30, "blurHandlerOn": "static" }'>
													<img class="invisible" src="img/torneos/{{$tournament->image}}" alt="Content Box">
												</figure>
											</div><!-- /.cb-img-container -->

											<span class="cb-overlay bg-fade-dark-06"></span><!-- /.cb-overlay -->

											<div class="fancy-box-contents border-radius-3">

												<div class="fancy-box-header">
													<!-- <span class="lb-cb-subtitle text-uppercase ltr-sp-2">Subtitle</span> -->
													<h3 class="font-size-24 font-weight-bold">{{ $tournament->title }}</h3>

												</div><!-- /.fancy-box-header -->

												<div class="fancy-box-footer">
													<a href="#" class="btn btn-xsm btn-underlined text-uppercase font-size-12 lh-15 btn-white text-white">
														<span>
															<!--<span class="btn-txt">Discover one</span>-->
														</span>
													</a>
												</div><!-- /.fancy-box-footer -->

											</div><!-- /.fancy-box-contents -->

											<!--<a href="#" class="liquid-overlay-link"></a>-->

										</div><!-- /.fancy-box fancy-box-classes -->

										<br>
										<p>Sean todos bienvenidos a nuestro torneo Royal League: <strong>{{ $tournament->title }}.</strong></p>
										<p>{{ $tournament->description }}</p>

										<hr>

										<h2>Dinámica del torneo</h2>
										<p>La modalidad del torneo consiste en enviar tus 4 mejores partidas en un lapso de tiempo determinado.</p>
										<p>Tendrás 6 horas para enviar tus mejores 4 partidas de 5:00PM a 11:00 PM <strong>(Zona horaria de CDMX)</strong>.</p>
										<p>Se tomará en cuenta la posición final y kills de las partidas, cada partida seleccionada debera contar con su evidencia, foto con celular de la posición en la que quedo el equipo y marcador.</p>
										<p>Sus 4 evidencias deberán ser enviadas a nuestro equipo en un plazo no mayor a 10 minutos después de la finalziación del torneo, es decir, máximo 11:10PM del día del torneo. Las evidencias que superen el tiempo máximo serán negadas.</p>
										<p>Evidencias a enviar: </p>
										<ul>
											<li>2 fotografías por partida (1 de posición del equipo y otra de la puntuación obtenida)</li>
										</ul>
										<p>El mensaje debe contener los siguentes datos:</p>
										<ul>
											<li>Nombre del equipo registrado</li>
											<li>Partida 1, (foto 1 y 2). Partida 2 (foto 1 y 2). Partida 3(foto 1 y 2). Partida 4(foto 1 y 2)</li>
										</ul>
										<br>
										<p>3 días antes del torneo se creará un grupo de WhatsApp con el lider de cada equipo únicamente para recordatorio de la dinámica y aclaración de dudas. Los resultados del torneo serán publicados en nuestras redes sociales en un máximo de 72 horas despues de la finalización del torneo.</p>




									</div>


									<!-- Reglas -->
									<div id="ld-tab-pane-2" role="tabpanel" class="tabs-pane pl-md-5 fade">

										<h2 class="mt-0">Reglas</h2>

										<div class="fancy-box fancy-box-overlay shadowed scheme-light border-radius-3">

											<div class="cb-img-container border-radius-3">
												<figure
													class="fancy-box-image border-radius-3 bg-left-top"
													style="background-image: url({{ asset('img/torneos/'.$tournament->image) }});"
													data-liquid-blur="true"
													data-blur-options='{ "imgSrc": "backgroundImage", "radius": 30, "blurHandlerOn": "static" }'>
													<img class="invisible" src="img/torneos/{{$tournament->image}}" alt="Content Box">
												</figure>
											</div>

											<span class="cb-overlay bg-fade-dark-06"></span>

											<div class="fancy-box-contents border-radius-3">

												<div class="fancy-box-header">
													<!-- <span class="lb-cb-subtitle text-uppercase ltr-sp-2">Subtitle</span> -->
													<h3 class="font-size-24 font-weight-bold">Reglamento del torneo</h3>

												</div>

												 <div class="fancy-box-footer">
													<!--<a href="#" class="btn btn-xsm btn-underlined text-uppercase font-size-12 lh-15 btn-white text-white">
														<span>
															<span class="btn-txt">Descargar PDF</span>
														</span>
													</a>-->
												</div> 

											</div>

											<!--<a href="#" class="liquid-overlay-link"></a>-->

										</div>

										<br>

										<p>IMPORTANTE: Debes seguir las páginas de 
											<a href="https://www.facebook.com/Royal-League-109787480839374/">Facebook</a> e 
											<a href="https://www.instagram.com/royalleagueorg/">Instagram</a> 
											de Royal League
										</p>

										<hr>

										<ul><!-- Cambiar a dinamico -->
											<li>Se prohíbe el uso de cuentas nuevas (mínimo 75 partidas jugadas).</li>
											<li>Se prohíbe el uso de reverse boosting.</li>
											<li>El crossplay deberá estar activo durante las partidas.</li>
											<li>Cada jugador debe identificarse con el ID de ACTIVISION.</li>
											<li>Deberán tener público su perfil en <a href="cod.tracker.gg/modern-warfare"></a>cod.tracker.gg/modern-warfare.</li>
											<li>Se monitoreará el perfil de los participantes para comparar su rendimiento con semanas pasadas.</li>
											<li>Mínimo un participante deberá hacer stream en Facebook o Twitch, los que no puedan deberán grabar sus partidas y tener el audio activo de sus compañeros para poder escuchar los call outs.</li>
											<li>Poner como título del Stream "Torneo Royal League".</li>
											<li>Respeto para todos los participantes y administradores.</li>
										</ul>

										<hr>

										<p>Nos reservemos el derecho de descalificar a cualquier equipo que no cumpla uno o más lineamientos de los antes mencionados. </p>

									</div>


									<!-- Registro -->
									<div id="ld-tab-pane-3" role="tabpanel" class="tabs-pane pl-md-5 fade">

										<h2 class="mt-0">Procedimiento de registro</h2>

										<div class="fancy-box fancy-box-overlay shadowed scheme-light border-radius-3">

											<div class="cb-img-container border-radius-3">
												<figure
													class="fancy-box-image border-radius-3 bg-left-top"
													style="background-image: url({{ asset('img/torneos/'.$tournament->image) }});"
													data-liquid-blur="true"
													data-blur-options='{ "imgSrc": "backgroundImage", "radius": 30, "blurHandlerOn": "static" }'>
													<img class="invisible" src="img/torneos/{{$tournament->image}}" alt="Content Box">
												</figure>
											</div>

											<span class="cb-overlay bg-fade-dark-06"></span>

											<div class="fancy-box-contents border-radius-3">

												<div class="fancy-box-header">
													<!-- <span class="lb-cb-subtitle text-uppercase ltr-sp-2">Subtitle</span> -->
													<h3 class="font-size-24 font-weight-bold">Registro de equipos</h3>

												</div>

												<div class="fancy-box-footer">
													<!--<a href="#" class="btn btn-xsm btn-underlined text-uppercase font-size-12 lh-15 btn-white text-white">
														<span>
															<span class="btn-txt">PDF - Instrucciones de registro</span>
														</span>
													</a>-->
												</div>
											</div>

											<!--<a href="#" class="liquid-overlay-link"></a>-->

										</div>

										<br>

										<p>El procedimiento de registro es el siguente: </p>

										<hr>

										<ul>	<!-- Cambiar a dinamico -->
											<li>Enviar un mensaje a la págna de Facebook solicitando el registro para el torneo</li>
											<li>Mandar el ID ACTIVISION de los tres integrantes</li>
											<li>Mandar el nombre del equipo</li>

										</ul>

									</div>


									<!-- Premios -->
									<div id="ld-tab-pane-4" role="tabpanel" class="tabs-pane pl-md-5 fade">

										<h2 class="mt-0">Premios</h2>

										<div class="fancy-box fancy-box-overlay shadowed scheme-light border-radius-3">

											<div class="cb-img-container border-radius-3">
												<figure
													class="fancy-box-image border-radius-3 bg-left-top"
													style="background-image: url({{ asset('img/torneos/'.$tournament->image) }});"
													data-liquid-blur="true"
													data-blur-options='{ "imgSrc": "backgroundImage", "radius": 30, "blurHandlerOn": "static" }'>
													<img class="invisible" src="img/torneos/{{$tournament->image}}" alt="Content Box">
												</figure>
											</div>

											<span class="cb-overlay bg-fade-dark-06"></span>

											<div class="fancy-box-contents border-radius-3">

												<div class="fancy-box-header">
													<!-- <span class="lb-cb-subtitle text-uppercase ltr-sp-2">Subtitle</span> -->
													<h3 class="font-size-24 font-weight-bold">Premiación del torneo</h3>
												</div>

												<div class="fancy-box-footer">
													<!--<a href="#" class="btn btn-xsm btn-underlined text-uppercase font-size-12 lh-15 btn-white text-white">

													</a>-->
												</div>
											</div>
											<!--<a href="#" class="liquid-overlay-link"></a>-->
										</div>

										<br>
										<h3>Parámetros y puntuación</h3>

										<p>Estos serán los parametros a considerar dentro de las partidas seleccionadas, se sumaran todas y cada una para
											obtener la puntuación final de tu equipo.</p>

										<ul>
											@foreach ($parameters as $parameter)
												<li>{{ $parameter->parameter }}</li>
											@endforeach
										</ul>

										<hr>

										<h3>Premiación</h3>

										<ul>
											<li>
												<h4>1er lugar - ${{ $tournament->price1 }} MXN</h4>
											</li>
											<li>
												<h4>2do lugar - ${{ $tournament->price2 }} MXN</h4>
											</li>
											<li>
												<h4>3er lugar - ${{ $tournament->price3 }} MXN</h4>
											</li>
										</ul>



									</div>

								</div>
							</div>

						</div>

					</div>
				</div>
			</section>

		</main>

		<footer class="main-footer pt-70" style="background-image: url({{ asset('./assets/img/web/bg-14.jpg') }}); background-size: cover; " data-sticky-footer="true">

			<section>

				<div class="container">
					<div class="row">

						<div class="lqd-column col-md-3 col-sm-6">

							<h3 class="widget-title text-white">Royal League</h3>
							<ul class="lqd-custom-menu reset-ul text-white">
								<li><a href="index.html">Inicio</a></li>
								<li><a href="torneos.html">Torneos</a></li>
								<li><a href="#">Premios</a></li>
								<li><a href="#">Registro</a></li>
							</ul>

						</div><!-- /.col-md-3 col-sm-6 -->

						<div class="lqd-column col-md-3 col-sm-6">

							<h3 class="widget-title text-white">Reglamentos</h3>
							<ul class="lqd-custom-menu reset-ul text-white">
								<li><a href="#">Reglas</a></li>
								<li><a href="#">Registro</a></li>
								<li><a href="#">Premiación</a></li>
							</ul>

						</div><!-- /.col-md-3 col-sm-6 -->

						<div class="lqd-column col-md-3 col-sm-6">

							<h3 class="widget-title text-white">Contacto</h3>
							<p>
								support@royalleague.com.mx
								<br>
							</p>

						</div><!-- /.col-md-3 col-sm-6 -->

						<div class="lqd-column col-md-3 col-sm-6">

							<h3 class="widget-title text-white">¡Siguenos!</h3>
							<ul class="social-icon social-icon-md">
								<li><a href="https://www.facebook.com/Royal-League-109787480839374"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/royalleagueorg/"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							</ul>

							<!--<h3 class="widget-title text-white">Subscribe</h3>
							<div class="ld-sf ld-sf--input-solid ld-sf--button-solid ld-sf--size-xs ld-sf--circle ld-sf--border-thin ld-sf--button-show ld-sf--button-inline">
								<form id="ld_subscribe_form" class="ld_sf_form" action="https://liquid-themes.us20.list-manage.com/subscribe/post?u=7f582d555cef808a99ea001a7&amp;id=58ab120d89" name="mc-embedded-subscribe-form" method="post">
									<p class="ld_sf_paragraph pr-2">
										<input type="email" class="ld_sf_text" id="mce-EMAIL" name="EMAIL" placeholder="Your email" value="">
									</p>
									<button type="submit" class="ld_sf_submit px-4">
										<span class="submit-icon">
											<i class="fa fa-angle-right"></i>
										</span>
										<span class="ld-sf-spinner">
											<span>Sending </span>
										</span>
									</button>
								</form>
								<div class="ld_sf_response"></div>
							</div><!-- /.ld-sf -->

						</div><!-- /.col-md-3 col-sm-6 -->

					</div><!-- /.row -->
				</div><!-- /.container -->

			</section>

			<section class="bt-fade-white-015 pt-35 pb-35 mt-50">
				<div class="container">
					<div class="row">

						<div class="lqd-column col-md-6">

							<ul class="lqd-custom-menu reset-ul inline-nav">
								<li><a href="#">Aviso de Privacidad</a></li>
							</ul>

						</div><!-- /.col-md-6 -->

						<div class="lqd-column col-md-6 text-md-right">
							<p class="my-0"><span style="font-size: 15px;">© 2020 Royal League.</span></p>
						</div><!-- /.col-md-6 text-md-right -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>

		</footer><!-- /.main-footer -->

	</div><!-- /#wrap -->

	<script src="{{ asset('./assets/vendors/jquery.min.js') }}"></script>
	<script src="{{ asset('./assets/js/theme-vendors.js') }}"></script>
	<script src="{{ asset('./assets/js/theme.min.js') }}"></script>
	<script src="{{ asset('./assets/js/liquidAjaxMailchimp.min.js') }}"></script>

</body>
</html>
