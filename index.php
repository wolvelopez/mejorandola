<!-- 
	Necesario para los botones de Facebook y G+, pero it's ok, carga asíncrono
-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=159628940772638";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
  window.___gcfg = {lang: 'es'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<aside id="home-social">
	<p>S&iacute;guenos en...</p>
	<ul>
		<li class="home-twitter">
			<a href="https://twitter.com/cristalab" class="twitter-follow-button" data-show-count="false" 
			data-lang="es" data-width="130px">Sigue a @cristalab</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</li>
		<li>
			<div class="fb-like" data-href="https://www.facebook.com/cristalab" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="arial"></div>
		</li>
		<li>
			<g:plusone size="small"></g:plusone>
		</li>
	</ul>
	<form method="post" action="http://feedburner.google.com/fb/a/mailverify" target="popupwindow">
		<label>En tu email</label>
		<input type="text" name="email" placeholder="Escribe tu email y ENTER" />
		<input type="hidden" name="uri" value="clab" />
		<input type="hidden" name="loc" value="es_ES" />
		<input type="hidden" name="submit" value="Suscribete" />
	</form>
</aside>

<div id="full-content-width" class="big-sidebar">
	<section id="content">

		<?php
			// @var $blogposts V4Pager
		?>
		
		<?php $flag_destacados = true; ?>
		<?php foreach ($destacados as $index_post): ?>
		
		<?php include(V4_TEMPLATES . "index-post.php") ; ?>
		<?php endforeach; ?>
		
		<?php $flag_destacados = false; ?>
		<?php foreach ($articulos as $index_post) : ?>
			<?php include(V4_TEMPLATES . "index-post.php") ; ?>
		<?php endforeach; ?>
			
		
		<p class="pagination pagination-lr">

			<?php if ($articulos_pager->getFirstPage() != $articulos_pager->getPage()) : ?>
				<a href="/index/<?php echo $articulos_pager->getPrevPage(); ?>" class="alignleft">&laquo; Ver m&aacute;s nuevos</a>
			<?php endif; ?>

			<?php if ($articulos_pager->getLastPage() != $articulos_pager->getPage()) :?>
				<a href="/index/<?php echo $articulos_pager->getNextPage(); ?>" class="alignright">Ver m&aacute;s viejos &raquo;</a>
			<?php endif ;?>
			<?php unset($articulos); ?>
			<?php unset($articulos_pager); ?>
		</p>
		
	</section><!-- #content -->


</div><!-- #content-sidebar-wrapper -->

<nav id="nav-courses">
	<ul>
		<li class="course-flash"><a href="/flash/"><span>Curso de Flash</span></a></li>
		<li class="course-html"><a href="/curso-html/"><span>Curso de HTML</span></a></li>
		<li class="course-css3"><a href="/css3/"><span>Curso de CSS3</span></a></li>
		<li class="course-oop"><a href="/programacion-orientada-objetos/"><span>Curso de Programaci&oacute;n</span></a></li>
	</ul>
</nav><!-- #nav-courses -->

<div id="footer-links">
	<section>
		<nav>
			<h3>Otros Tutoriales</h3>
			<ul>
				<?php foreach ($otros_tutoriales as $index_blog_otro) : ?>
					<li><a href="<?php echo $index_blog_otro["url"]; ?>"><?php echo $index_blog_otro["titulo"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav>
			<h3>Videotutoriales</h3>
			<ul>
				<?php foreach ($otros_videos as $index_blog_otro): ?>
					<li><a href="<?php echo $index_blog_otro["url"]; ?>"><?php echo $index_blog_otro["titulo"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav>
			<h3>Otros Art&iacute;culos</h3>
			<ul>
				<?php foreach ($otros_articulos as $index_blog_otro): ?>
					<li><a href="<?php echo $index_blog_otro["url"]; ?>"><?php echo $index_blog_otro["titulo"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav>
			<h3>Anime</h3>
			<ul>
				<?php foreach ($anime as $index_blog_otro): ?>
					<li><a href="<?php echo $index_blog_otro["url"]; ?>"><?php echo $index_blog_otro["titulo"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav>
			<h3>Amigos</h3>
			<ul>
				<?php foreach ($amigos[0] as $index_amigo): ?>
					<li><a href="<?php echo $index_amigo["url"]; ?>"><?php echo $index_amigo["nombre"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav>
			<h3>M&aacute;s amigos...</h3>
			<ul>
				<?php foreach ($amigos[1] as $index_amigo): ?>
					<li><a href="<?php echo $index_amigo["url"]; ?>"><?php echo $index_amigo["nombre"]; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</section>

	<aside class="tag-cloud">
		<h3>Hablamos de</h3>
		<p>
			<?php $last_tag = array_pop($tags_maximo); ?>
			<?php foreach ($tags_maximo as $index_tag) : ?>
				<a href="<?php echo $index_tag["url"]; ?>"><?php echo $index_tag["tag"]; ?></a>,
			<?php endforeach; ?>
			<a href="<?php echo $last_tag["url"]; ?>"><?php echo $last_tag["tag"]; ?></a>
		</p>
	</aside>
</div><!-- #footer-links -->