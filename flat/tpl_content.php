<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** CONTENT ********** -->
<div id="dokuwiki__content"><div class="pad group">
	<?php html_msgarea() ?>

	
	<div class="page group">
		<?php tpl_flush() ?>
		<?php tpl_includeFile('pageheader.html') ?>
		<!-- wikipage start -->
		<?php tpl_content() ?>
		<!-- wikipage stop -->
		<?php tpl_includeFile('pagefooter.html') ?>
	</div>

	<div class="docInfo">
		<?php print $lang['lastmod']." le ".dformat($INFO['lastmod']);?>
	</div>

	<?php tpl_flush() ?>
</div></div>
<!-- /content -->

<hr class="a11y" />
<!-- PAGE ACTIONS -->
<div id="dokuwiki__pagetools">
	<h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
	<div class="tools">
		<ul>
			<?php
				$data = array(
					'view'  => 'main',
					'items' => array(
						'edit'      => tpl_action('edit',      true, 'li', true, '<span>', '</span>'),
						'revert'    => tpl_action('revert',    true, 'li', true, '<span>', '</span>'),
						'revisions' => tpl_action('revisions', true, 'li', true, '<span>', '</span>'),
						'backlink'  => tpl_action('backlink',  true, 'li', true, '<span>', '</span>'),
						'subscribe' => tpl_action('subscribe', true, 'li', true, '<span>', '</span>'),
						'top'       => tpl_action('top',       true, 'li', true, '<span>', '</span>')
					)
				);

				// the page tools can be amended through a custom plugin hook
				$evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
				if($evt->advise_before()){
					foreach($evt->data['items'] as $k => $html) echo $html;
				}
				$evt->advise_after();
				unset($data);
				unset($evt);
			?>
		</ul>
	</div>
</div>
