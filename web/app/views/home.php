<?php
$document = $PAGE["document"];
$data = $document->data;
global $CONTENT;
use Prismic\Dom\RichText;
/* ---------------
echo "<br><pre>";
print_r($document);
echo "</pre>";
/* --------------- */
?>

<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="svg-grid" viewBox="0 0 1439 3712"><g stroke="#E1DDEC" clip-path="url(#a)" opacity=".2"><path vector-effect="non-scaling-stroke" d="M30 3.5h1380M30 47.5h1380M30 91.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380M59.5 620V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4"/></g><g stroke="#E1DDEC" clip-path="url(#b)" opacity=".2"><path vector-effect="non-scaling-stroke" d="M30 619.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620"/></g><g stroke="#E1DDEC" clip-path="url(#c)" opacity=".2">
		<path vector-effect="non-scaling-stroke" d="M30 1239.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#d)" opacity=".2">
		<path vector-effect="non-scaling-stroke" d="M30 1859.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#e)" opacity=".2">
		<path vector-effect="non-scaling-stroke" d="M30 2479.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#f)" opacity=".2"><path vector-effect="non-scaling-stroke" d="M30 3095.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><defs><clipPath id="a">
			<path vector-effect="non-scaling-stroke" fill="#fff" d="M0 0h1439v620H0z"/></clipPath><clipPath id="b">
			<path vector-effect="non-scaling-stroke" fill="#fff" d="M0 616h1439v620H0z"/></clipPath><clipPath id="c"><path vector-effect="non-scaling-stroke" fill="#fff" d="M0 1236h1439v620H0z"/></clipPath><clipPath id="d"><path vector-effect="non-scaling-stroke" fill="#fff" d="M0 1856h1439v620H0z"/></clipPath><clipPath id="e"><path vector-effect="non-scaling-stroke" fill="#fff" d="M0 2476h1439v620H0z"/></clipPath><clipPath id="f"><path vector-effect="non-scaling-stroke" fill="#fff" d="M0 3092h1439v620H0z"/></clipPath></defs></svg>
<div class="color-bg"></div>
<section class="hero mw">
	<div class="max-width hero-wrapper">
		<div class="left">
			<div class="tag"><?php echo $data->hero_tag[0]->text ?></div>
			<h1><?php echo $data->hero_header[0]->text ?></h1>
			<p><?php echo $data->hero_intro_text[0]->text ?></p>
			<a class="pink-btn" href="<?php echo $data->hero_button_url[0]->text ?>">Shop Now</a>
		</div>
		<div class="right">
			<img class="preload-critical bg toy" data-preload-desktop="<?php echo $data->toy_image->url ?>" data-preload-mobile="<?php echo $data->toy_image->url ?>">
		</div>
		<img class="preload-critical bg hand" data-preload-desktop="<?php echo $data->hand_image->url ?>" data-preload-mobile="<?php echo $data->hand_image_mobile->url ?>">
	</div>
	<img class="preload-critical bg" data-preload-desktop="<?php echo $data->hero_bg->url ?>" data-preload-mobile="<?php echo $data->hero_bg->url ?>">
</section>

<section class="block-trio mw max-width">
	<?php foreach ($data->ice_blocks as $block) { ?>
		<div class="block">
			<img class="preload-critical toy" data-preload-desktop="<?php echo $block->image->url ?>" data-preload-mobile="<?php echo $block->mobile_image->url ?>">
			<div class="inner">
				<p><?php echo $block->eyebrow[0]->text ?></p>
				<p><?php echo $block->copy[0]->text ?></p>
			</div>
		</div>
	<?php } ?>
</section>

<section class="best-sellers mw max-width">
	<div class="top">
		<h2><?php echo $data->best_sellers_header[0]->text ?></h2>
		<p><?php echo $data->best_seller_copy[0]->text ?></p>
	</div>
	<div class="best-sellers-wrapper slider no-drag-free no-loop no-loop-mobile" data-at="767" data-align="center">
		<div class="slides">
			<div class="inner">
				<?php foreach ($data->best_seller_slide as $slide)  {
					$thisDocument = $CONTENT->local->getContent($slide->slide->uid, "penguin_block");
					$thisData = $thisDocument->data; ?>
					<a class="slide card-wrapper" href="/">
						<span>
							<?php if($thisData->ribbon === true): ?>
								<img class="preload ribbon" data-preload-desktop="<?php echo $thisData->ribbon_image->url ?>" data-preload-mobile="<?php echo $thisData->ribbon_image->url ?>">
							<?php else: ?>
								<svg class="svg-left" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
							<path d="M45.8518 1.81937C45.7323 1.78886 45.6089 1.77665 45.4858 1.78317L23.2581 2.95928C22.611 2.99352 22.1039 3.52816 22.1039 4.17612V6.0786L11.598 3.00656C11.327 2.9273 11.0368 2.94465 10.7771 3.05562L2.52113 6.58397C2.01419 6.80062 1.71586 7.33065 1.79366 7.87643L7.19182 45.7474C7.26845 46.2851 7.69164 46.7071 8.2295 46.7823C8.76735 46.8575 9.29003 46.5676 9.51114 46.0716L20.2099 22.0692L26.8408 23.7066C27.0466 23.7574 27.2621 23.7536 27.466 23.6957L50.6463 17.1094C50.7503 17.0799 50.8499 17.0366 50.9425 16.9808L64.5966 8.748C65.0173 8.49434 65.2446 8.01289 65.173 7.5269C65.1014 7.0409 64.745 6.64542 64.269 6.52385L45.8518 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
							</svg>
								<svg class="svg-right" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
								<path d="M21.1155 1.81937C21.235 1.78886 21.3584 1.77665 21.4815 1.78317L43.7092 2.95928C44.3562 2.99352 44.8633 3.52816 44.8633 4.17612V6.0786L55.3693 3.00656C55.6403 2.9273 55.9305 2.94465 56.1901 3.05562L64.4462 6.58397C64.9531 6.80062 65.2514 7.33065 65.1736 7.87643L59.7755 45.7474C59.6988 46.2851 59.2756 46.7071 58.7378 46.7823C58.1999 46.8575 57.6773 46.5676 57.4561 46.0716L46.7574 22.0692L40.1265 23.7066C39.9207 23.7574 39.7052 23.7536 39.5013 23.6957L16.321 17.1094C16.217 17.0799 16.1174 17.0366 16.0248 16.9808L2.37064 8.748C1.94996 8.49434 1.72272 8.01289 1.79431 7.5269C1.8659 7.0409 2.22231 6.64542 2.69826 6.52385L21.1155 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
							</svg>
							<?php endif ?>
							<div class="tag" style="background: #<?php echo $thisData->tag_color[0]->text ?>"><?php echo $thisData->tag[0]->text ?></div>
							<div class="block">
								<div class="img-wrapper">
									<img class="preload" data-preload-desktop="<?php echo $thisData->image->url ?>" data-preload-mobile="<?php echo $thisData->image->url ?>">
									<img class="preload" data-preload-desktop="<?php echo $thisData->image_hover->url ?>" data-preload-mobile="<?php echo $thisData->image_hover->url ?>">
								</div>
								<div class="block-inner">
									<p class="type"><?php echo $thisData->type[0]->text ?></p>
									<p class="name"><?php echo $thisData->name[0]->text ?></p>
									<div class="price"><?php echo RichText::asHtml($thisData->price); ?></div>
									<button class="pink-btn">Shop Now</button>
								</div>
							</div>
						</span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="pudgy-sale max-width">
	<div class="top">
		<div class="eyebrow"><?php echo $data->sale_tag[0]->text ?></div>
		<h3><?php echo $data->pudgy_sale_header[0]->text ?></h3>
	</div>
	<div class="blocks">
		<?php foreach ($data->sale_blocks as $slide)  {
			$thisDocument = $CONTENT->local->getContent($slide->slide->uid, "penguin_block");
			$thisData = $thisDocument->data; ?>
			<a class="slide card-wrapper" href="/">
				<span>
					<?php if($thisData->ribbon === true): ?>
						<img class="preload ribbon" data-preload-desktop="<?php echo $thisData->ribbon_image->url ?>" data-preload-mobile="<?php echo $thisData->ribbon_image->url ?>">
					<?php else: ?>
						<svg class="svg-left" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
					<path d="M45.8518 1.81937C45.7323 1.78886 45.6089 1.77665 45.4858 1.78317L23.2581 2.95928C22.611 2.99352 22.1039 3.52816 22.1039 4.17612V6.0786L11.598 3.00656C11.327 2.9273 11.0368 2.94465 10.7771 3.05562L2.52113 6.58397C2.01419 6.80062 1.71586 7.33065 1.79366 7.87643L7.19182 45.7474C7.26845 46.2851 7.69164 46.7071 8.2295 46.7823C8.76735 46.8575 9.29003 46.5676 9.51114 46.0716L20.2099 22.0692L26.8408 23.7066C27.0466 23.7574 27.2621 23.7536 27.466 23.6957L50.6463 17.1094C50.7503 17.0799 50.8499 17.0366 50.9425 16.9808L64.5966 8.748C65.0173 8.49434 65.2446 8.01289 65.173 7.5269C65.1014 7.0409 64.745 6.64542 64.269 6.52385L45.8518 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
					</svg>
						<svg class="svg-right" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
						<path d="M21.1155 1.81937C21.235 1.78886 21.3584 1.77665 21.4815 1.78317L43.7092 2.95928C44.3562 2.99352 44.8633 3.52816 44.8633 4.17612V6.0786L55.3693 3.00656C55.6403 2.9273 55.9305 2.94465 56.1901 3.05562L64.4462 6.58397C64.9531 6.80062 65.2514 7.33065 65.1736 7.87643L59.7755 45.7474C59.6988 46.2851 59.2756 46.7071 58.7378 46.7823C58.1999 46.8575 57.6773 46.5676 57.4561 46.0716L46.7574 22.0692L40.1265 23.7066C39.9207 23.7574 39.7052 23.7536 39.5013 23.6957L16.321 17.1094C16.217 17.0799 16.1174 17.0366 16.0248 16.9808L2.37064 8.748C1.94996 8.49434 1.72272 8.01289 1.79431 7.5269C1.8659 7.0409 2.22231 6.64542 2.69826 6.52385L21.1155 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
					</svg>
					<?php endif ?>
					<div class="tag" style="background: #<?php echo $thisData->tag_color[0]->text ?>"><?php echo $thisData->tag[0]->text ?></div>
					<div class="block">
						<div class="img-wrapper">
							<img class="preload" data-preload-desktop="<?php echo $thisData->image->url ?>" data-preload-mobile="<?php echo $thisData->image->url ?>">
							<img class="preload" data-preload-desktop="<?php echo $thisData->image_hover->url ?>" data-preload-mobile="<?php echo $thisData->image_hover->url ?>">
						</div>
						<div class="block-inner">
							<p class="type"><?php echo $thisData->type[0]->text ?></p>
							<p class="name"><?php echo $thisData->name[0]->text ?></p>
							<div class="price"><?php echo RichText::asHtml($thisData->price); ?></div>
							<button class="pink-btn">Shop Now</button>
						</div>
					</div>
				</span>
			</a>
		<?php } ?>
	</div>
</section>

<section class="fifty-fifty-tiles mw max-width">
	<div class="tile-wrapper">
		<?php foreach ($data->fifty_fifty_tiles as $tile) { ?>
			<a class="tile" href="<?php echo $tile->url[0]->text ?>">
				<img class="preload frame" data-preload-desktop="<?php echo $tile->frame->url ?>" data-preload-mobile="<?php echo $tile->frame->url ?>">
				<div class="tile-inner">
					<div class="top">
						<img class="preload" data-preload-desktop="<?php echo $tile->top_image->url ?>" data-preload-mobile="<?php echo $tile->top_image->url ?>">
						<div class="tag"><?php echo $tile->tag[0]->text ?></div>
					</div>
					<div class="bottom">
						<p class="title"><?php echo $tile->tilte[0]->text ?></p>
						<p class="copy"><?php echo $tile->copy[0]->text ?></p>
						<button class="pink-btn">Shop Now</button>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
</section>

<section class="video-trio mw slider no-drag-free no-loop no-loop-mobile max-width" data-at="767" data-align="center">
	<div class="tag"><?php echo $data->video_tag[0]->text ?></div>
	<h4><?php echo $data->video_header[0]->text ?></h4>
	<div class="slides">
		<div class="inner">
			<?php foreach ($data->videos as $media) { ?>
				<div class="video-wrapper slide no-">
					<button class="play">
						<svg width="99" height="111" viewBox="0 0 99 111" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g filter="url(#filter0_dd_1007_945)">
								<path d="M88.2721 47.7752L10.0847 3.66622C8.51099 2.77793 6.84625 2.77793 5.26688 3.66622C3.69318 4.55451 3 6.19778 3 7.97436V96.1923C3 97.9689 3.69312 99.6122 5.27255 100.5C6.06226 100.945 6.80087 101.167 7.68138 101.167C8.56189 101.167 9.36881 100.945 10.1584 100.5L88.3051 56.3915C89.8788 55.5032 90.8333 53.8599 90.8333 52.0833C90.8333 50.3068 89.8458 48.6635 88.2721 47.7752Z" fill="url(#paint0_linear_1007_945)"/>
								<path d="M9.83891 4.10164L9.83901 4.1017L88.0263 48.2106C89.4492 49.0138 90.3333 50.4942 90.3333 52.0833C90.3333 53.6788 89.4766 55.156 88.0593 55.956L9.9133 100.065C9.19366 100.469 8.47061 100.667 7.68138 100.667C6.89928 100.667 6.2443 100.473 5.51765 100.065C4.13813 99.2888 3.5 97.8429 3.5 96.1923V7.97436C3.5 6.32371 4.1383 4.87759 5.51231 4.10184C6.93966 3.29917 8.41813 3.29967 9.83891 4.10164Z" stroke="#00142D"/>
							</g>
							<defs>
								<filter id="filter0_dd_1007_945" x="0.568245" y="0.568245" width="97.5603" height="110.325" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
									<feFlood flood-opacity="0" result="BackgroundImageFix"/>
									<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
									<feMorphology radius="4.86351" operator="dilate" in="SourceAlpha" result="effect1_dropShadow_1007_945"/>
									<feOffset dx="2.43175" dy="4.86351"/>
									<feComposite in2="hardAlpha" operator="out"/>
									<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
									<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1007_945"/>
									<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
									<feMorphology radius="2.43175" operator="dilate" in="SourceAlpha" result="effect2_dropShadow_1007_945"/>
									<feOffset/>
									<feComposite in2="hardAlpha" operator="out"/>
									<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.0784314 0 0 0 0 0.176471 0 0 0 1 0"/>
									<feBlend mode="normal" in2="effect1_dropShadow_1007_945" result="effect2_dropShadow_1007_945"/>
									<feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1007_945" result="shape"/>
								</filter>
								<linearGradient id="paint0_linear_1007_945" x1="2.74606" y1="2.73385" x2="101.234" y2="14.7776" gradientUnits="userSpaceOnUse">
									<stop stop-color="#C1ECFF"/>
									<stop offset="0.25" stop-color="#C1ECFF"/>
									<stop offset="0.381662" stop-color="white"/>
									<stop offset="0.608286" stop-color="#C2ECFF"/>
									<stop offset="1" stop-color="#C1ECFF"/>
								</linearGradient>
							</defs>
						</svg>
					</button>
					<video class="preload" muted preload autoplay loop playsinline webkit-playsinline data-preload-desktop="<?php echo $media->video->url ?>" data-preload-mobile="<?php echo $media->video->url ?>">
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<section class="bottom-marquee max-width">
	<h4>As seen on</h4>
	<div class="marquee mw">
		<div class="inner" data-dur="<?php echo $data->bottom_marquee_duration[0]->text; ?>">
			<div class="group">
				<?php foreach ($data->bottom_marquee as $block) { ?>
					<img class="preload-critical" data-preload-desktop="<?php echo $block->image->url ?>" data-preload-mobile="<?php echo $block->image->url ?>">
				<?php } ?>
			</div>
			<div class="group" aria-hidden="true">
				<?php foreach ($data->bottom_marquee as $block) { ?>
					<img class="preload-critical" data-preload-desktop="<?php echo $block->image->url ?>" data-preload-mobile="<?php echo $block->image->url ?>">
				<?php } ?>
			</div>
		</div>
	</div>
</section>
