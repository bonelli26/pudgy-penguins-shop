<?php use Prismic\Dom\RichText; ?>
<footer>
	<div class="top">
		<div class="tag"><?php echo $globalModules->footer_tag[0]->text ?></div>
		<img class="preload-critical" data-preload-desktop="<?php echo $globalModules->footer_header_image->url ?>" data-preload-mobile="<?php echo $globalModules->footer_header_image->url ?>">
	</div>
	<div class="marquee footer-marquee mw">
		<div class="inner" data-dur="<?php echo $globalModules->footer_marquee_duration[0]->text; ?>">
			<div class="group">
				<?php foreach ($globalModules->social_block as $block) { ?>
					<div class="block-wrapper">
						<div class="block">
							<img class="preload-critical" data-preload-desktop="<?php echo $block->top_image->url ?>" data-preload-mobile="<?php echo $block->top_image->url ?>">
							<div class="top-block">
								<div class="img-wrapper">
									<img class="preload-critical" data-preload-desktop="<?php echo $block->profile_image->url ?>" data-preload-mobile="<?php echo $block->profile_image->url ?>">
								</div>
								<div class="text-wrapper">
									<p><?php echo $block->block_header[0]->text ?></p>
									<p><?php echo $block->subheader_block[0]->text ?></p>
								</div>
							</div>
							<p><?php echo $block->copy[0]->text ?></p>
						</div>
						<div class="block">
							<img class="preload-critical" data-preload-desktop="<?php echo $block->top_image->url ?>" data-preload-mobile="<?php echo $block->top_image->url ?>">
							<div class="top-block">
								<div class="img-wrapper">
									<img class="preload-critical" data-preload-desktop="<?php echo $block->profile_image->url ?>" data-preload-mobile="<?php echo $block->profile_image->url ?>">
								</div>
								<div class="text-wrapper">
									<p><?php echo $block->block_header[0]->text ?></p>
									<p><?php echo $block->subheader_block[0]->text ?></p>
								</div>
							</div>
							<p><?php echo $block->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="group" aria-hidden="true">
				<?php foreach ($globalModules->social_block as $block) { ?>
					<div class="block-wrapper">
						<div class="block">
							<img class="preload-critical" data-preload-desktop="<?php echo $block->top_image->url ?>" data-preload-mobile="<?php echo $block->top_image->url ?>">
							<div class="top-block">
								<div class="img-wrapper">
									<img class="preload-critical" data-preload-desktop="<?php echo $block->profile_image->url ?>" data-preload-mobile="<?php echo $block->profile_image->url ?>">
								</div>
								<div class="text-wrapper">
									<p><?php echo $block->block_header[0]->text ?></p>
									<p><?php echo $block->subheader_block[0]->text ?></p>
								</div>
							</div>
							<p><?php echo $block->copy[0]->text ?></p>
						</div>
						<div class="block">
							<img class="preload-critical" data-preload-desktop="<?php echo $block->top_image->url ?>" data-preload-mobile="<?php echo $block->top_image->url ?>">
							<div class="top-block">
								<div class="img-wrapper">
									<img class="preload-critical" data-preload-desktop="<?php echo $block->profile_image->url ?>" data-preload-mobile="<?php echo $block->profile_image->url ?>">
								</div>
								<div class="text-wrapper">
									<p><?php echo $block->block_header[0]->text ?></p>
									<p><?php echo $block->subheader_block[0]->text ?></p>
								</div>
							</div>
							<p><?php echo $block->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bottom">
		<img class="preload-critical" data-preload-desktop="<?php echo $globalModules->footer_bottom_image->url ?>" data-preload-mobile="<?php echo $globalModules->footer_bottom_image->url ?>">
		<div class="links">
			<?php foreach ($globalModules->bottom_links as $link) { ?>
				<a href="<?php echo $link->url[0]->text ?>"><?php echo $link->text[0]->text ?></a>
			<?php } ?>
		</div>
		<div class="socials">
			<?php foreach ($globalModules->socials as $link) { ?>
				<a href="<?php echo $link->url[0]->text ?>">
					<img class="preload-critical" data-preload-desktop="<?php echo $link->image->url ?>" data-preload-mobile="<?php echo $link->image->url ?>">
					<div class="text-wrapper">
						<p><?php echo $link->text_1[0]->text ?></p>
						<p><?php echo $link->text_2[0]->text ?></p>
					</div>

				</a>
			<?php } ?>
		</div>
	</div>
	<div class="utility-links">
		<p><?php echo $globalModules->copyright[0]->text ?></p>
		<?php foreach ($globalModules->utility_links as $link) { ?>
			<a href="<?php echo $link->url[0]->text ?>"><?php echo $link->text[0]->text ?></a>
		<?php } ?>
	</div>
</footer>
