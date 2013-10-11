<?php 

 get_header(); ?>

	<div id="content_box" class="list">	
		<div id="left_box" class="list">
			<div id="content" class="content list">
			
			<?php 		if (have_posts()) : ?>
			<?php 
				while (have_posts()) : the_post(); ?>
								
				<h1 <?php post_class() ?> ><?php the_title(); ?></h1>
				
				<div class="format_text">
								
					<section id="le-projet" class="sub-section">			
								
						<h2>Le projet</h2>
						
						<p>L’objectif de ce workshop est de produire un livre de «spécimens typographiques», réunissant des exemples permettant d’évaluer et de comparer le rendu des fontes sur papier. Cet ouvrage sera entièrement réalisé avec des polices disponibles <em>sous licence libre</em>.</p>
						
						<p>La fonction de ce livre sera en premier lieu utilitaire : on cherchera à créer des spécimens permettant d’évaluer les caractéristiques des fontes dans leur usage pour le corps du texte <em>(body type)</em> et sur support imprimé. On s’efforcera à présenter les fontes de manière neutre, sans masquer leurs éventuels défauts, afin de permettre aux usagers de les comparer aussi objectivement que possible.</p>
					
					</section>
															
					<section id="sujets" class="section">			
					
						<h2>Sujets abordés</h2>		
														
						<p>Les sujets suivants seront traités au cours du workshop:</p>
						
						<section class="sujet">
						
							<h3>Notions de typographie: le spécimen</h3>
							
							<p>Aperçu historique, montrant l’évolution du spécimen typographique depuis l’apparition de l'imprimerie, et son renouvellement à l’ère du numérique.</p>
							
							<figure class="figure">
								<img class="illustration" width="841" height="414" src="<?php bloginfo('template_directory'); ?>/microsites/img/font-workshop/specimens-hist2.jpg" alt="" />
								<figcaption class="caption"><span class="underlined">Un spécimen de William Caslon, 1734; L'application FontBook pour iPad, 2011.</span></figcaption>
							</figure>
							
						</section>
						
						<section class="sujet">
						
							<h3>Licences: aspects juridiques et pratiques</h3>
							
							<p>Le workshop comprendra une introduction théorique sur les licences libres et leur modèle économique (ou pas). On s’intéressera aux conditions d’utilisation accompagnant les fontes (et en passant, on clarifiera les droits et limitations des licences de fontes commerciales). On comparera les différentes licences en usage pour les fontes libres: <a href="http://scripts.sil.org/OFL">Open Font License</a>; <a href="http://www.gnu.org/licenses/gpl-faq.html#FontException">GPL with font exception</a>; <a href="http://www.apache.org/licenses/">Apache Software License</a>; <a href="http://creativecommons.org/">Creative Commons</a>.</p>
							
						</section>
						
						<section class="sujet">
						
							<h3>Travail collaboratif: introduction à DropBox et GitHub</h3>
							
							<p>Le workshop comprendra une introduction pratique à l’usage de <a href="https://www.dropbox.com/">DropBox</a> et de <a href="https://github.com/">GitHub</a> (via son <a href="http://mac.github.com/">application OSX</a>), pour faciliter le travail en équipe. Ces systèmes permettront de synchroniser les fichiers de travail, et de gérer les versions. À l’issue du workshop, les fichiers constituant le livre seront rendus publics sous une licence libre, permettant à d’autres graphistes de les adapter à leurs besoins.</p>
							
							<p>
							<img class="illustration" width="841" height="414" src="<?php bloginfo('template_directory'); ?>/microsites/img/font-workshop/github-and-dropbox.jpg" alt="" />
							</p>
							
							
							</section>
					
					</section>
										
					<section id="missions" class="sub-section">	
					
					<h2>Les missions des participants</h2>
					
					<p>Les participants au workshop se répartiront les tâches suivantes, en fonction de leurs compétences respectives.</p>
					
					<ul class="ul">
						<li>Recherche de fontes libres</li>
						<li>Etablissement de critères pour l’inclusion de fontes</li>
						<li>Etablissement de critères pour leur classification</li>
						<li>Recherche de textes (en domaine public) à utiliser pour la création de specimens</li>
						<li>Conception graphique des spécimens</li>
						<li>Conception graphique de la couverture du livre</li>
						<li>Planification de la production et de la diffusion</li>
					</ul>
					
					</section>
					
					<section id="deroulement"> 
					
						<h2>Déroulement (proposition sur 5 jours)</h2>
						
						<ul class="ul">
							<li class="strong">Jour 1</li>
								<ul class="ul-ul">
									<li>Introduction au projet</li>
									<li>Fontes et spécimens: usages à travers l’histoire</li>
									<li>Licences et fontes: aspects juridiques et pratiques</li>
									<li>Définition de la liste des tâches</li>
									<li>Formation de groupes de travail</li>
									<li>Séance d’introduction à GitHub</li>
								</ul>
							
							<li class="strong">Jour 2</li>
								<ul class="ul-ul">
									<li>Recherche de fontes</li>
									<li>Recherche de textes en domaine public</li>
									<li>Établissement de critères de sélection</li>
									<li>Séance d’introduction à Scribus (logiciel de PAO)</li>
									<li>Création de modèles de spécimens (propositions)</li>
								</ul>
							
							<li class="strong">Jour 3</li>
								<ul class="ul-ul">
									<li>Réunion, examen des propositions de modèles</li>
									<li>Choix du modèle de spécimen privilégié</li>
									<li>Choix de mise en page</li>
									<li>Choix d’organisation du livre (chapitrage)</li>
									<li>Choix de la licence du livre</li>
									<li>Recherche de fontes (suite)</li>
									<li>Travail sur les spécimens</li>
								</ul>
							
							<li class="strong">Jour 4</li>
								<ul class="ul-ul">
									<li>Recherche de fontes (suite)</li>
									<li>Travail sur les spécimens (suite)</li>
									<li>Rédaction des parties éditoriales (données techniques, sommaire, préface, postface)</li>
									<li>Réalisation d’un graphisme de couverture</li>
								</ul>
							
							<li class="strong">Jour 5</li>
							
								<ul class="ul-ul">
									<li>Finition du livre, assemblage, export PDF</li>
									<li>Upload du PDF sur <a href="https://www.createspace.com/">Amazon CreateSpace</a>, <a href="http://www.lulu.com/">Lulu</a>, Google Books</li>
									<li>Travail sur la diffusion: rédaction de communiqués (presse, réseaux sociaux)</li>
									<li>Debriefing, remise de certificats de participation</li>
								</ul>
						</ul>
					
					</section>
					
					<section id="ressources" class="sub-section">
					
					<h2>Ressources et références</h2>
					
					<h3>À propos des spécimens typographiques</h3>
					
					<ul class="ul">
					
						<li>"<i>Le design des spécimens typographiques</i>", Nick Sherman, dans <i><a href="http://www.theshelf.fr/">The Shelf</a></i>, N° 1, 2012.</li>
						
						<li><a href="http://opentype.info/blog/2008/02/18/type-specimen/">Rare Type Specimens at the Open Library</a>, Ralf Herrmann, 2008.</li>
						
						<li><a href="http://webfontspecimen.com/">Web Font Specimen</a>, Tim Brown, 2009</li>
						
						<li><a href="http://typophile.com/node/787">Discussion sur l’origine du "Hamburgefonts" et autres phrases de test</a>, typophile.com, 2003.</li>
											
					</ul>
					
					
					<h3>À propos des fontes sous licence libre</h3>
					
					<ul class="ul">
					
						<li><a href="http://www.youtube.com/watch?v=AQ-2CUl25Ew">The Open Font License, purpose, achievements, future</a>, par Dave Crossland et Nicolas Spalinger, LGM 2007 (vidéo)</li>
						
						<li><a href="http://fontfeed.com/archives/free-fonts-free-is-not-always-free/">Free Fonts: Free Is Not Always Free</a>, par Yves Peters, 2010</li>
					
					</ul>
					
					
					<h3>Quelques bibliothèques de fontes libres:</h3>
					
					<ul class="ul">
					
						<li><a href="http://www.openfontlibrary.org/">Open Font Library</a></li>
						
						<li><a href="http://www.fontsquirrel.com/">Font Squirrel</a></li>
						
						<li><a href="http://www.theleagueofmoveabletype.com/">The League of Moveable Type</a></li>
					
						<li><a href="http://www.google.com/webfonts/">Google Web Fonts</a> et <a href="http://code.google.com/p/googlefontdirectory/">Google Font Directory</a></li>
					
						<li><a href="http://www.edgefonts.com/">Adobe Edge Web Fonts</a></li>
						
						<li><a href="http://fedoraproject.org/wiki/Category:Fonts">Debian Fonts Task Force</a></li>
						
						<li><a href="http://fedoraproject.org/wiki/Category:Fonts">Fontes du Fedora Project</a></li>
						
						<li><a href="http://www.gust.org.pl/projects/e-foundry">Fontes du TeX Users Group</a></li>
						
						<li class="hidden"><a href="http://fr.wikipedia.org/wiki/Fontes_de_caract%C3%A8res_unicode_libres">Fontes de caractères unicode libres (Wikipédia)</a></li>
												
						<li class="hidden"><a href="http://planet.open-fonts.org/">Planet Open Fonts</a></li>
					
					</ul>
					
					<h3>Technique: Git, GitHub, etc</h3>
					
					<ul class="ul">
					
						<li><a href="http://golancourses.net/2013/resources/tools/git-and-github/">Liste de tutoriels Git/GitHub</a>, par Prof. Golan Levin, Carnegie Mellon University</li>
										
					</ul>
					
					</section>
					
					<section id="bio" class="bio">	
					
					<h2>Biographie</h2>
					
					<p>Manuel Schmalstieg (*1976) est artiste numérique, designer et éditeur. Passionné par les modes de création participatifs, il est fondateur des structures de production N3krozoft Ltd, Low-Rez.tv et Greyscale Press.</p>
					<p>Plus d’informations: <a href="http://ms-studio.net">ms-studio.net</a></p>
										
					</section>
					
				</div>
				
				<ul id="main-menu" class="main-menu unstyled bold">
				
					<li><a href="#le-projet">1. Le projet</a></li>
					
					<li><a href="#sujets">2. Sujets abordés</a></li>
					
					<li><a href="#missions">3. Missions</a></li>
					
					<li><a href="#deroulement">4. Déroulement</a></li>
					
					<li><a href="#ressources">5. Ressources</a></li>
					
				</ul>
				
				
				
				<?php 
				endwhile; 
				endif; ?>
			
			</div><!--#content-->
		</div><!--#left_box-->
		
	</div><!--#content_box-->
	
	<script defer src="<?php bloginfo('template_directory'); ?>/js/mylibs/jquery.easing.1.3.min.js"></script>
	
	<script>
 jQuery(document).ready(function(){
        			
		// code pour liens sortants:
		  jQuery("a[href^=http]").each(
		   function(){ 
		      if(this.href.indexOf(location.hostname) == -1) {
		      jQuery(this).attr('target', '_blank');
		    	}
		  	});
        			
 			jQuery('#main-menu a').bind('click',function(event){
  			    var $anchor = jQuery(this);
  			    jQuery('html, body').stop().animate({
  			        scrollTop: jQuery($anchor.attr('href')).offset().top
  			    }, 500);
  			    event.preventDefault();
  			});
        			
      });
	</script>

<?php get_footer(); ?>