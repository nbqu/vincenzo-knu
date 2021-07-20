<?php
/**
 * DokuWiki Ravel Template
 * Based on the starter template and a wordpress theme of the same name
 * @link     http://dokuwiki.org/template:ravel
 * @author   desbest <afaninthehouse@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
header('X-UA-Compatible: IE=edge,chrome=1');

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );
$showSidebar = page_findnearest($conf['sidebar']) && ($ACT=='show');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    <link rel="stylesheet" id="ravel-fonts-css" href="//fonts.googleapis.com/css?family=Lora%3A400%2C700%2C400italic%2C700italic%7CRoboto%3A400%2C400italic%2C700%2C700italic&amp;ver=5.4.4" type="text/css" media="all">
    <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/mobileinputsize.js"></script>
</head>

<body id="dokuwiki__top">
    <?php /* with these Conditional Comments you can better address IE issues in CSS files,
             precede CSS rules by #IE8 for IE8 (div closes at the bottom) */ ?>
    <!--[if lte IE 8 ]><div id="IE8"><![endif]-->

    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
             should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
                         
    <div id="container" class="site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>"><div class="wrap"> <!-- ravel theme -->

    <!-- <div id="dokuwiki__site"> -->
        <?php tpl_includeFile('header.html') ?>

        <!-- ravel header -->


            <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

                <div id="branding">

                         <h1 id="site-title"><?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]"') ?></h1>
                        <?php /* how to insert logo instead (if no CSS image replacement technique is used):
                                upload your logo into the data/media folder (root of the media manager) and replace 'logo.png' accordingly:
                                tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" accesskey="h" title="[H]"') */ ?>
                        <?php if ($conf['tagline']): ?>
                            <h2 class="claim"><?php echo $conf['tagline'] ?></h2>
                        <?php endif ?>
                    <ul class="a11y skip">
                    <li><a href="#main"><?php echo $lang['skip_to_content'] ?></a></li>
                    </ul>

                </div><!-- #branding -->

                <nav id="menu-primary" class="menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                    <div class="assistive-text skip-link">
                    <a href="#main">Skip to content</a>
                    </div><!-- .skip-link -->

                    <h3 class="menu-toggle">
                    <span class="screen-reader-text">Navigation</span>
                    </h3><!-- .menu-toggle -->

                    <div class="wrap"><ul id="menu-primary-items" class="menu-items">
                        <h3 class="a11y"><?php echo $lang['site_tools'] ?></h3>
                        <?php tpl_toolsevent('sitetools', array(
                            'recent'    => tpl_action('recent', 1, 'li', 1),
                            'media'     => tpl_action('media', 1, 'li', 1),
                            'index'     => tpl_action('index', 1, 'li', 1),
                        )); ?>

                        <?php if ($conf['useacl'] && $showTools): ?>
                             <?php tpl_toolsevent('usertools', array(
                            'admin'     => tpl_action('admin', 1, 'li', 1),
                            'userpage'  => _tpl_action('userpage', 1, 'li', 1),
                            'profile'   => tpl_action('profile', 1, 'li', 1),
                            'register'  => tpl_action('register', 1, 'li', 1),
                            'login'     => tpl_action('login', 1, 'li', 1),
                            )); ?>
                        <?php endif; ?>
                    </ul></div>
                </nav>

                <?php //endif; // End check for header text. ?>

                <!-- // Loads the menu/primary.php template. -->

            </header><!-- #header -->

            <!-- <div id="main" class="main content-container"></div> -->


        <!-- ********** HEADER ********** -->
        <header id="header" style="padding: 0px;">
        <!-- <div id="dokuwiki__header"><div class="pad"> -->


            <div class="tools">
                <!-- USER TOOLS -->
                <?php if ($conf['useacl'] && $showTools): ?>
                    <!-- <div id="dokuwiki__usertools"> -->
                        <div><?php tpl_userinfo();  /* 'Logged in as ...' */ ?></div>
                    <!-- </div> -->
                <?php endif ?>

                <!-- SITE TOOLS -->
                <div id="dokuwiki__sitetools">
                    <?php tpl_searchform() ?>
                </div>

            </div>
            <div class="clearer"></div>

            <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs']){ ?>
                <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
            <?php } ?>
            <?php if($conf['youarehere']){ ?>
                <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
            <?php } ?>

            <div class="clearer"></div>
            <hr class="a11y" />
        </header>
        <!-- </div></div> --><!-- /header -->
        <div id="main" class="main content-container"><main id="content" class="contentXXX">
            <article id="post-12" class="entry post" itemscope="itemscope">

            <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>

            <header class="entry-header">

                <div class="entry-byline">
                    <!-- <time class="entry-published updated" datetime="2020-02-04T19:11:31+00:00" title="Tuesday, February 4, 2020, 7:11 pm">February 4, 2020</time>   -->
                        <!-- PAGE ACTIONS -->
                        <?php if ($showTools): ?>
                            <!-- <div id="dokuwiki__pagetools"> -->
                                <h3 class="a11y"><?php echo $lang['page_tools'] ?></h3>
                                <ul class="sidebarmenu">
                                    <?php tpl_toolsevent('pagetools', array(
                                        'edit'      => tpl_action('edit', 1, 'li', 1),
                                        'discussion'=> _tpl_action('discussion', 1, 'li', 1),
                                        'revisions' => tpl_action('revisions', 1, 'li', 1),
                                        'backlink'  => tpl_action('backlink', 1, 'li', 1),
                                        'subscribe' => tpl_action('subscribe', 1, 'li', 1),
                                        'revert'    => tpl_action('revert', 1, 'li', 1),
                                        'top'       => tpl_action('top', 1, 'li', 1),
                                    )); ?>
                                </ul>
                            <!-- </div> -->
                        <?php endif; ?> 

                         <!-- ********** ASIDE ********** -->
                        <?php if ($showSidebar): ?>
                            <div id="writtensidebar" class="desktop">
                            <?php tpl_includeFile('sidebarheader.html') ?>
                            <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
                            <?php tpl_includeFile('sidebarfooter.html') ?>
                            <div class="clearer"></div> 
                            </div>
                        <?php endif; ?>
                </div><!-- .entry-byline -->

                <!-- <h1 class="entry-title" itemprop="headline">Test post</h1> -->

            </header>



            <div class="entry-content" itemprop="articlebody">
            <!-- ********** CONTENT ********** -->
            <!-- <div id="dokuwiki__content"><div class="pad"> -->
                <?php tpl_flush() /* flush the output buffer */ ?>
                <?php tpl_includeFile('pageheader.html') ?>

                <div class="page">
                    <!-- wikipage start -->
                    <?php tpl_content() /* the main content */ ?>
                    <!-- wikipage stop -->
                    <div class="clearer"></div>
                </div>

                <?php tpl_flush() ?>
                <?php tpl_includeFile('pagefooter.html') ?>
            </article>
            </div>
            <!-- </div></div> --><!-- /content -->

            <!-- ********** ASIDE ********** -->
            <?php if ($showSidebar): ?>
                <div id="writtensidebar" class="mobile">
                <?php tpl_includeFile('sidebarheader.html') ?>
                <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
                <?php tpl_includeFile('sidebarfooter.html') ?>
                <div class="clearer"></div> 
                </div>
            <?php endif; ?>

            <div class="clearer"></div>
            <hr class="a11y" />
        </main></div><!-- #main -->
        <!-- </div> --><!-- /wrapper -->

        <footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

            <!-- // Loads the menu/social.php template. -->

            <div class="footer-content">
                <p class="copyright"><?php tpl_pageinfo() /* 'Last modified' etc */ ?></p>
                    <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
                <!-- .copyright -->
            </div><!-- .footer-content -->

        </footer><!-- #footer -->
        <?php tpl_includeFile('footer.html') ?>
    <!-- </div> --><!-- /dokuwiki__site -->
    </div></div> <!-- end ravel .container -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <!--[if lte IE 8 ]></div><![endif]-->
       <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/ravel.js"></script>
    <!-- due to the way dokuwiki buffers output, this javascript has to
            be before the </body> tag and not in the <head> -->
</body>
</html>
