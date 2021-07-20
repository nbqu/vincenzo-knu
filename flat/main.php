<?php
/**
 * Flat for Dokuwiki Template 2021
 *
 * @link     http://dokuwiki.org/template
 * @author   beemoon and co <contact@beemoon.fr>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,chrome=1');

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    
	<style type="text/css">
		img.wp-smiley,img.emoji{
			display:inline !important;
			border:none !important;
			box-shadow:none !important;
			height:1em !important;
			width:1em !important;
			margin:0.07em !important;
			vertical-align:-0.1em !important;
			background:none !important;
			padding:0!important}
			
		@font-face {
		  font-family: 'FontAwesome';
		  src: url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.eot?v=4.3.0');
		  src: url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.eot?#iefix&v=4.3.0') format('embedded-opentype'), url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.woff2?v=4.3.0') format('woff2'), url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.woff?v=4.3.0') format('woff'), url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.ttf?v=4.3.0') format('truetype'), url('<?php echo DOKU_TPL ?>assets/fonts/fontawesome-webfont.svg?v=4.3.0#fontawesomeregular') format('svg');
		  font-weight: normal;
		  font-style: normal;
		}
	</style>
	
	<link rel='stylesheet' id='flat-fonts-css' href='https://fonts.googleapis.com/css?family=Yesteryear%7CLato:400,700%7CBitter%7COpen+Sans+Condensed' media='all' />	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
	<script src="<?php echo DOKU_TPL."assets/js/flat.js"; ?>" ></script>

    
</head>

<body class="blog custom-background" itemscope itemtype="http://schema.org/WebPage">

<div id="dokuwiki__site">
	<div id="dokuwiki__top">
		<div id="page">
			<div class="container">
			<div class="row row-offcanvas row-offcanvas-left">

				<?php include('tpl_header.php') ?>						
	
<div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
<div id="screen__mode" class="no"><?php /* helper to detect CSS media query in script.js */ ?></div>
    
</body>
</html>
