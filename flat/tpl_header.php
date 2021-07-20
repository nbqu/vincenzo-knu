<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

				<div id="secondary" class="col-lg-3">
					
					<header id="masthead" class="site-header">
						<div class="hgroup">
							<h1 class="site-title display-title">
									<span itemprop="name">
										<?php
											// display wiki title in a link to the home page
											tpl_link(
												wl(),
												$conf['title']
											);
										?>
									</span>			
							</h1>
							<h2 itemprop="description" class="site-description">
							<?php if ($conf['tagline']): ?>
								<?php echo $conf['tagline']; ?>
							<?php endif ?>
							</h2>
						</div>
						<button type="button" class="btn btn-link hidden-lg toggle-sidebar" data-toggle="offcanvas" aria-label="Sidebar">
							<i class="fa fa-bars"></i>
						</button>
						<button type="button" class="btn btn-link hidden-lg toggle-navigation" aria-label="Navigation Menu">
							<i class="fa fa-gear"></i>
						</button>
						<nav id="site-navigation" class="navigation main-navigation">
							<ul id="menu-menu" class="nav-menu">
								<!-- ********** ASIDE ********** -->
									<?php tpl_flush() ?>
									<?php tpl_include_page($conf['sidebar'], true, true) ?>
								<!-- /aside -->
								
							</ul>
						</nav>
					</header>	
					
					<div class="sidebar-offcanvas">
						<div id="main-sidebar" class="widget-area" role="complementary">
							<aside id="search-2" class="widget widget_search">
								<?php tpl_searchform(); ?>
							</aside>
							
							<aside id="recent-posts-2" class="widget widget_recent_entries">
								<h3 class='widget-title'>Recent / Updated Posts</h3>
									<div class="pad2 aside include group">
										<div class="content"><div class="group">
											<?php tpl_flush() ?>
											<?php tpl_includeFile('sidebarheader.html') ?>
											
											<?php tpl_include_page(tpl_getConf('topSidebar'), true, true) ?>
											
										</div></div>
									</div>									
							</aside>
							
							<aside id="categories-1" class="widget widget_categories">
								<h3 class='widget-title'>About me...</h3>
									<div class="pad2 aside include group">
										<div class="content"><div class="group">
											<?php tpl_flush() ?>
											<?php tpl_include_page(tpl_getConf('bottomSidebar'), true, true) ?>
										</div></div>
									</div>
							</aside>
							
							<aside id="categories-2" class="widget widget_categories">
								<h3 class='widget-title'>Administation</h3>
								
								<!-- USER TOOLS -->
								<?php if ($conf['useacl']): ?>
									<div id="dokuwiki__usertools2">
										<h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
										<ul>
											<?php
												if (!empty($_SERVER['REMOTE_USER'])) {
													echo '<li class="user">';
													tpl_userinfo(); /* 'Logged in as ...' */
													echo '</li>';
												}
												tpl_toolsevent('usertools', array(
													tpl_action('admin', true, 'li', true),
													tpl_action('profile', true, 'li', true),
													tpl_action('register', true, 'li', true),
													tpl_action('login', true, 'li', true)
												));
											?>
										</ul>
									</div>
								<?php endif ?>
								
							</aside>
							<?php //tpl_includeFile('sidebarfooter.html') ?>
							
						</div>
					</div>
					
				</div>

				<div id="primary" class="content-area col-lg-9" itemprop="mainContentOfPage">
															
					<div id="content" class="site-content" role="main">							
						<!-- wrapper -->
						<div class="wrapper group">
							
							<?php include('tpl_content.php') ?>

						</div>
						<!-- /wrapper -->					
					</div>

					<footer class="site-info" itemscope itemtype="http://schema.org/WPFooter">
						<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform">Inspired by WordPress</a>. Theme: Flat 1.7.6 by
						<a rel="nofollow" href="https://themeisle.com/themes/flat/" title="Flat WordPress Theme">Themeisle</a> adapted for 
						<a href="https://www.dokuwiki.org/">Dokuwiki</a> by <a href="https://beemoon.fr">www.beemoon.com</a>
					</footer>
					
				</div>
					
			</div>
		</div>
		
		<?php include('tpl_footer.php') ?>
			
	</div>
</div>
