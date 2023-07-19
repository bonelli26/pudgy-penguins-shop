<?php use Prismic\Dom\RichText; ?>
<footer>
	<div class="top mw">
		<div class="tag"><?php echo $globalModules->footer_tag[0]->text ?></div>
		<p class="footer-header"><?php echo $globalModules->footer_header[0]->text ?></p>
	</div>
	<div class="marquee hover footer-marquee mw">
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
							<p class="copy"><?php echo $block->copy[0]->text ?></p>
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
							<p class="copy"><?php echo $block->copy[0]->text ?></p>
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
							<p class="copy"><?php echo $block->copy[0]->text ?></p>
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
							<p class="copy"><?php echo $block->copy[0]->text ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="bottom mw">
		<svg class="svg-left" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
			<path d="M45.8518 1.81937C45.7323 1.78886 45.6089 1.77665 45.4858 1.78317L23.2581 2.95928C22.611 2.99352 22.1039 3.52816 22.1039 4.17612V6.0786L11.598 3.00656C11.327 2.9273 11.0368 2.94465 10.7771 3.05562L2.52113 6.58397C2.01419 6.80062 1.71586 7.33065 1.79366 7.87643L7.19182 45.7474C7.26845 46.2851 7.69164 46.7071 8.2295 46.7823C8.76735 46.8575 9.29003 46.5676 9.51114 46.0716L20.2099 22.0692L26.8408 23.7066C27.0466 23.7574 27.2621 23.7536 27.466 23.6957L50.6463 17.1094C50.7503 17.0799 50.8499 17.0366 50.9425 16.9808L64.5966 8.748C65.0173 8.49434 65.2446 8.01289 65.173 7.5269C65.1014 7.0409 64.745 6.64542 64.269 6.52385L45.8518 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
		</svg>
		<svg class="svg-right" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
			<path d="M21.1155 1.81937C21.235 1.78886 21.3584 1.77665 21.4815 1.78317L43.7092 2.95928C44.3562 2.99352 44.8633 3.52816 44.8633 4.17612V6.0786L55.3693 3.00656C55.6403 2.9273 55.9305 2.94465 56.1901 3.05562L64.4462 6.58397C64.9531 6.80062 65.2514 7.33065 65.1736 7.87643L59.7755 45.7474C59.6988 46.2851 59.2756 46.7071 58.7378 46.7823C58.1999 46.8575 57.6773 46.5676 57.4561 46.0716L46.7574 22.0692L40.1265 23.7066C39.9207 23.7574 39.7052 23.7536 39.5013 23.6957L16.321 17.1094C16.217 17.0799 16.1174 17.0366 16.0248 16.9808L2.37064 8.748C1.94996 8.49434 1.72272 8.01289 1.79431 7.5269C1.8659 7.0409 2.22231 6.64542 2.69826 6.52385L21.1155 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
		</svg>
		<img class="preload-critical pengu-logo" data-preload-desktop="<?php echo $globalModules->footer_bottom_image->url ?>" data-preload-mobile="<?php echo $globalModules->footer_bottom_image->url ?>">
		<div class="images">
			<?php foreach ($globalModules->footer_images as $link) { ?>
				<img class="preload-critical" data-preload-desktop="<?php echo $link->image->url ?>" data-preload-mobile="<?php echo $link->image->url ?>">
			<?php } ?>
		</div>
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
