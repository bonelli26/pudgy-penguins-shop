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

<section class="pdp-hero mw">
	<div class="max-width pdp-hero-inner">
		<div class="left">
			<div class="slider no-drag-free">
				<div class="frame">
					<?php if($data->hero_ribbon === true) { ?>
						<img class="preload-critical ribbon" data-preload-desktop="<?php echo $data->ribbon_image->url ?>" data-preload-mobile="<?php echo $data->ribbon_image->url ?>">
					<?php } ?>
					<div class="slides">
							<div class="inner">
								<?php foreach ($data->hero_product_images as $slide) { ?>
									<div class="slide">
										<img class="preload-critical bg" data-preload-desktop="<?php echo $slide->image->url ?>" data-preload-mobile="<?php echo $slide->image->url ?>">
									</div>
								<?php } ?>
							</div>
					</div>
				</div>
				<div class="thumbnails dots">
					<?php foreach ($data->hero_product_images as $key => $slide) { ?>
						<button class="thumbnail dot <?php if ($key === 0) { ?>active<?php } ?>">
							<img class="preload-critical bg" data-preload-desktop="<?php echo $slide->image->url ?>" data-preload-mobile="<?php echo $slide->image->url ?>">
						</button>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="right">
			<p class="eyebrow"><?php echo $data->product_eyebrow[0]->text ?></p>
			<h1><?php echo $data->product_title[0]->text ?></h1>
			<div class="price-wrapper">
				<p class="price"><?php echo $data->product_price_1[0]->text ?></p>
				<p class="old-price"><?php echo $data->product_price_2[0]->text ?>
					<span><svg width="58" height="28" viewBox="0 0 58 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="1.38793" y1="26.7724" x2="55.7664" y2="1.41531" stroke="#EF928E" stroke-width="2"/>
					<line x1="2.23317" y1="1.41498" x2="56.6116" y2="26.7721" stroke="#EF928E" stroke-width="2"/>
					</svg></span>
				</p>
			</div>
			<div class="after-pay desktop-only">
				<p>Or 4-interest free payments of <strong>$6.99 </strong>with</p><img class="preload" src="https://images.prismic.io/pudgypenguinsshop/acd79ef5-7945-4a3a-93cd-36a1aefd54a5_afterpay.png?auto=compress,format">
			</div>
			<div class="after-pay mobile-only">
				<p>Or 4-interest free payments with</p><img class="preload" src="https://images.prismic.io/pudgypenguinsshop/acd79ef5-7945-4a3a-93cd-36a1aefd54a5_afterpay.png?auto=compress,format">
			</div>
			<p class="copy"><?php echo $data->product_description[0]->text ?></p>
			<div class="variant-wrapper mw">
				<img class="preload-critical bg" data-preload-desktop="<?php echo $data->variant_ice_block->url ?>" data-preload-mobile="<?php echo $data->variant_ice_block->url ?>">
				<div class="left-variant variant">
					<p><?php echo $data->product_variant_1_title[0]->text ?></p>
					<p><?php echo $data->product_variant_1_value[0]->text ?></p>
				</div>
				<div class="right-variant variant">
					<p><?php echo $data->product_variant_2_title[0]->text ?></p>
					<p><?php echo $data->product_variant_2_value[0]->text ?></p>
				</div>
			</div>
			<div class="atc-wrapper">
				<button class="icon-link">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" fill="none"><g filter="url(#a)"><path fill="#fff" d="M18.1 2c-1.704 0-3.34 1.187-4.6 3.317C12.24 3.187 10.604 2 8.9 2A6.908 6.908 0 0 0 2 8.9c0 7.048 10.69 12.708 11.145 12.946a.76.76 0 0 0 .71 0C14.31 21.608 25 15.95 25 8.9 25 5.095 21.904 2 18.1 2Z"/><path stroke="#00142D" stroke-width="2" d="M18.1 1c-1.771 0-3.349.985-4.6 2.553C12.249 1.985 10.67 1 8.9 1 4.543 1 1 4.543 1 8.9c0 4.003 2.998 7.44 5.753 9.788 2.81 2.394 5.669 3.908 5.929 4.044a1.76 1.76 0 0 0 1.635 0c.255-.132 3.117-1.647 5.93-4.044C23.002 16.34 26 12.903 26 8.9 26 4.543 22.457 1 18.1 1Z"/></g><defs><filter id="a" width="29.471" height="26.404" x="0" y="0" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="2.471" dy="2.471"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_2_23"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_2_23" result="shape"/></filter></defs></svg>
				</button>
				<div class="quantity increment-wrapper">
					<button class="decrease">-</button>
					<span class="count">1</span>
					<button class="increase">+</button>
				</div>
				<button class="add-to-cart">Add To Cart<span><svg width="23" height="27" viewBox="0 0 23 27" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g filter="url(#filter0_d_1130_7264)">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M4.38927 8.61189H6.74035V7.21661C6.74035 4.04146 9.17416 1.45947 12.1331 1.45947C15.092 1.45947 17.4982 4.04169 17.4982 7.21661V8.61189H20.3189C21.0381 8.61189 21.6191 9.2354 21.6191 10.0072V18.4946C21.6191 21.7595 19.13 24.4595 16.0605 24.4595H8.31668C5.1912 24.4595 2.61914 21.6995 2.61914 18.3456V10.5104C2.61914 9.47182 3.42124 8.61111 4.3891 8.61111L4.38927 8.61189ZM9.20181 8.61189H15.0376V7.21661C15.0376 5.52485 13.7097 4.1008 12.134 4.1008C10.5298 4.1008 9.20266 5.52572 9.20266 7.21661V8.61189H9.20181Z" fill="#F5FDFF"/>
							<path d="M20.3189 8.11189H17.9982V7.21661C17.9982 3.79936 15.4008 0.959473 12.1331 0.959473C8.86861 0.959473 6.24035 3.79567 6.24035 7.21661V8.11189H4.79148L4.79131 8.11111H4.3891C3.11247 8.11111 2.11914 9.22947 2.11914 10.5104V18.3456C2.11914 21.9418 4.88243 24.9595 8.31668 24.9595H16.0605C19.4403 24.9595 22.1191 22.0002 22.1191 18.4946V10.0072C22.1191 8.99305 21.3469 8.11189 20.3189 8.11189ZM14.5376 8.11189H9.70266V7.21661C9.70266 5.77114 10.8357 4.6008 12.134 4.6008C13.401 4.6008 14.5376 5.76728 14.5376 7.21661V8.11189Z" stroke="#00142D"/>
							</g>
							<defs>
							<filter id="filter0_d_1130_7264" x="0.619141" y="0.459473" width="22" height="26" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix"/>
							<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
							<feOffset dx="-1" dy="1"/>
							<feComposite in2="hardAlpha" operator="out"/>
							<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.0784314 0 0 0 0 0.176471 0 0 0 1 0"/>
							<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1130_7264"/>
							<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1130_7264" result="shape"/>
							</filter>
							</defs>
							</svg></span></button>
			</div>
		</div>
	</div>
</section>
<section class="about-section max-width mw">
	<div class="text-block">
		<svg class="ice-block" width="1028" height="401" preserveAspectRatio="none" viewBox="0 0 1028 401" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g filter="url(#filter0_d_1130_7266)">
				<path d="M8.28386 12.6215C9.13533 11.0985 10.7108 10.1171 12.4456 10.029L65.3644 7.34066L129.242 6.84001L193.12 6.33936L224.424 10.0058C224.835 10.0539 225.251 10.0507 225.663 9.99606L256.997 5.83871L512.508 3.83611L768.018 1.83351L831.896 1.33286L863.2 4.99927C863.611 5.04745 864.028 5.04418 864.439 4.98956L895.773 0.832211L958.693 0.339067C959.326 0.334108 959.953 0.449288 960.54 0.678492L986.207 10.7C986.531 10.8266 986.867 10.9186 987.212 10.9747L1019.31 16.2076C1021.71 16.5989 1023.46 18.667 1023.45 21.1036L1023.4 33.9393L1023.27 68.0476L1023.01 136.264L1022.52 262.435L1022.28 325.52L1022.16 357.063L1022.11 371.664C1022.1 372.434 1021.92 373.195 1021.58 373.887L1016.58 383.95C1015.75 385.61 1014.08 386.691 1012.24 386.763L958.165 388.855L894.289 389.104L830.412 389.353L766.535 389.602L702.661 389.097L638.782 390.1L511.029 390.599L255.51 394.613L191.633 395.114L127.763 393.602L63.8776 396.115L17.6102 391.775C16.7966 391.698 16.0165 391.423 15.3383 390.974L2.27408 382.312C0.890721 381.395 0.0641564 379.843 0.0705383 378.174L0.12064 365.073L0.24127 333.531L0.48253 270.445L0.965049 144.275L1.22593 76.058L1.35637 41.9497L1.41662 26.1955C1.41988 25.343 1.64106 24.5029 2.05915 23.7551L8.28386 12.6215Z" fill="#E9F7FB"/>
				<path d="M864.559 5.98087L864.439 4.98956L864.56 5.98087L895.832 1.83172L958.69 1.33906C959.196 1.33509 959.697 1.42723 960.167 1.6106L985.834 11.6321C986.222 11.784 986.627 11.8944 987.039 11.9618L1019.14 17.1946C1021.06 17.5077 1022.45 19.1621 1022.45 21.1115L1022.4 33.9471L1022.27 68.0554L1022.01 136.272L1021.52 262.443L1021.28 325.528L1021.16 357.071L1021.11 371.672C1021.1 372.288 1020.96 372.896 1020.68 373.45L1015.68 383.513C1015.02 384.841 1013.69 385.706 1012.21 385.763L958.173 387.855L958.156 387.855L894.296 388.104L830.42 388.353L766.555 388.602L766.543 388.602L702.681 388.097L702.669 388.096L702.657 388.097L638.79 389.1L638.778 389.1L511.036 389.598L511.025 389.599L255.514 393.613L255.506 393.614L191.653 394.114L127.798 392.603L127.767 392.602L127.735 392.603L63.9163 395.114L17.7151 390.779C17.0642 390.718 16.4401 390.498 15.8976 390.138L2.83334 381.477C1.72666 380.743 1.0654 379.501 1.07051 378.166L1.12061 365.066L1.24124 333.523L1.4825 270.438L1.96502 144.267L2.2259 76.0502L2.35634 41.9418L2.41659 26.1877C2.4192 25.5057 2.59615 24.8336 2.93062 24.2354L9.15533 13.1017C9.8365 11.8833 11.0969 11.0982 12.4847 11.0277L65.3821 8.34048L129.238 7.84L193.054 7.33984L224.296 10.999C224.79 11.0568 225.289 11.0529 225.783 10.9874L257.056 6.83821L512.504 4.8361L768.014 2.8335L831.83 2.33334L863.072 5.99253C863.566 6.05034 864.065 6.04642 864.559 5.98087Z" stroke="#00142D" stroke-width="2" vector-effect="non-scaling-stroke"/>
			</g>
			<defs>
				<filter id="filter0_d_1130_7266" x="0.0703125" y="0.338867" width="1027.38" height="399.777" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
					<feFlood flood-opacity="0" result="BackgroundImageFix"/>
					<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
					<feOffset dx="4" dy="4"/>
					<feComposite in2="hardAlpha" operator="out"/>
					<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
					<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1130_7266"/>
					<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1130_7266" result="shape"/>
				</filter>
			</defs>
		</svg>
		<img class="preload-critical icon" data-preload-desktop="<?php echo $data->about_section_igloo->url ?>" data-preload-mobile="<?php echo $data->about_section_igloo->url ?>">
		<h2><?php echo $data->about_block_1_title[0]->text ?></h2>
		<p class="copy"><?php echo $data->about_block_1_copy[0]->text ?></p>
	</div>
	<div class="text-block">
		<svg class="ice-block" width="1028" height="401" preserveAspectRatio="none" viewBox="0 0 1028 401" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g filter="url(#filter0_d_1130_7266)">
				<path d="M8.28386 12.6215C9.13533 11.0985 10.7108 10.1171 12.4456 10.029L65.3644 7.34066L129.242 6.84001L193.12 6.33936L224.424 10.0058C224.835 10.0539 225.251 10.0507 225.663 9.99606L256.997 5.83871L512.508 3.83611L768.018 1.83351L831.896 1.33286L863.2 4.99927C863.611 5.04745 864.028 5.04418 864.439 4.98956L895.773 0.832211L958.693 0.339067C959.326 0.334108 959.953 0.449288 960.54 0.678492L986.207 10.7C986.531 10.8266 986.867 10.9186 987.212 10.9747L1019.31 16.2076C1021.71 16.5989 1023.46 18.667 1023.45 21.1036L1023.4 33.9393L1023.27 68.0476L1023.01 136.264L1022.52 262.435L1022.28 325.52L1022.16 357.063L1022.11 371.664C1022.1 372.434 1021.92 373.195 1021.58 373.887L1016.58 383.95C1015.75 385.61 1014.08 386.691 1012.24 386.763L958.165 388.855L894.289 389.104L830.412 389.353L766.535 389.602L702.661 389.097L638.782 390.1L511.029 390.599L255.51 394.613L191.633 395.114L127.763 393.602L63.8776 396.115L17.6102 391.775C16.7966 391.698 16.0165 391.423 15.3383 390.974L2.27408 382.312C0.890721 381.395 0.0641564 379.843 0.0705383 378.174L0.12064 365.073L0.24127 333.531L0.48253 270.445L0.965049 144.275L1.22593 76.058L1.35637 41.9497L1.41662 26.1955C1.41988 25.343 1.64106 24.5029 2.05915 23.7551L8.28386 12.6215Z" fill="#E9F7FB"/>
				<path d="M864.559 5.98087L864.439 4.98956L864.56 5.98087L895.832 1.83172L958.69 1.33906C959.196 1.33509 959.697 1.42723 960.167 1.6106L985.834 11.6321C986.222 11.784 986.627 11.8944 987.039 11.9618L1019.14 17.1946C1021.06 17.5077 1022.45 19.1621 1022.45 21.1115L1022.4 33.9471L1022.27 68.0554L1022.01 136.272L1021.52 262.443L1021.28 325.528L1021.16 357.071L1021.11 371.672C1021.1 372.288 1020.96 372.896 1020.68 373.45L1015.68 383.513C1015.02 384.841 1013.69 385.706 1012.21 385.763L958.173 387.855L958.156 387.855L894.296 388.104L830.42 388.353L766.555 388.602L766.543 388.602L702.681 388.097L702.669 388.096L702.657 388.097L638.79 389.1L638.778 389.1L511.036 389.598L511.025 389.599L255.514 393.613L255.506 393.614L191.653 394.114L127.798 392.603L127.767 392.602L127.735 392.603L63.9163 395.114L17.7151 390.779C17.0642 390.718 16.4401 390.498 15.8976 390.138L2.83334 381.477C1.72666 380.743 1.0654 379.501 1.07051 378.166L1.12061 365.066L1.24124 333.523L1.4825 270.438L1.96502 144.267L2.2259 76.0502L2.35634 41.9418L2.41659 26.1877C2.4192 25.5057 2.59615 24.8336 2.93062 24.2354L9.15533 13.1017C9.8365 11.8833 11.0969 11.0982 12.4847 11.0277L65.3821 8.34048L129.238 7.84L193.054 7.33984L224.296 10.999C224.79 11.0568 225.289 11.0529 225.783 10.9874L257.056 6.83821L512.504 4.8361L768.014 2.8335L831.83 2.33334L863.072 5.99253C863.566 6.05034 864.065 6.04642 864.559 5.98087Z" stroke="#00142D" stroke-width="2" vector-effect="non-scaling-stroke"/>
			</g>
			<defs>
				<filter id="filter0_d_1130_7266" x="0.0703125" y="0.338867" width="1027.38" height="399.777" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
					<feFlood flood-opacity="0" result="BackgroundImageFix"/>
					<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
					<feOffset dx="4" dy="4"/>
					<feComposite in2="hardAlpha" operator="out"/>
					<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
					<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1130_7266"/>
					<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1130_7266" result="shape"/>
				</filter>
			</defs>
		</svg>
		<h2><?php echo $data->about_block_2_title[0]->text ?></h2>
		<p class="copy"><?php echo $data->about_block_2_copy[0]->text ?></p>
	</div>
</section>
<section class="faq-section max-width mw">
	<h3><?php echo $data->faq_section_header[0]->text ?></h3>
	<div class="inner">
		<?php foreach ($data->faq_block as $block) { ?>
			<div class="drawer">
				<svg class="ice-block" width="1028" height="401" preserveAspectRatio="none" viewBox="0 0 1028 401" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g filter="url(#filter0_d_1130_7266)">
						<path d="M8.28386 12.6215C9.13533 11.0985 10.7108 10.1171 12.4456 10.029L65.3644 7.34066L129.242 6.84001L193.12 6.33936L224.424 10.0058C224.835 10.0539 225.251 10.0507 225.663 9.99606L256.997 5.83871L512.508 3.83611L768.018 1.83351L831.896 1.33286L863.2 4.99927C863.611 5.04745 864.028 5.04418 864.439 4.98956L895.773 0.832211L958.693 0.339067C959.326 0.334108 959.953 0.449288 960.54 0.678492L986.207 10.7C986.531 10.8266 986.867 10.9186 987.212 10.9747L1019.31 16.2076C1021.71 16.5989 1023.46 18.667 1023.45 21.1036L1023.4 33.9393L1023.27 68.0476L1023.01 136.264L1022.52 262.435L1022.28 325.52L1022.16 357.063L1022.11 371.664C1022.1 372.434 1021.92 373.195 1021.58 373.887L1016.58 383.95C1015.75 385.61 1014.08 386.691 1012.24 386.763L958.165 388.855L894.289 389.104L830.412 389.353L766.535 389.602L702.661 389.097L638.782 390.1L511.029 390.599L255.51 394.613L191.633 395.114L127.763 393.602L63.8776 396.115L17.6102 391.775C16.7966 391.698 16.0165 391.423 15.3383 390.974L2.27408 382.312C0.890721 381.395 0.0641564 379.843 0.0705383 378.174L0.12064 365.073L0.24127 333.531L0.48253 270.445L0.965049 144.275L1.22593 76.058L1.35637 41.9497L1.41662 26.1955C1.41988 25.343 1.64106 24.5029 2.05915 23.7551L8.28386 12.6215Z" fill="#E9F7FB"/>
						<path d="M864.559 5.98087L864.439 4.98956L864.56 5.98087L895.832 1.83172L958.69 1.33906C959.196 1.33509 959.697 1.42723 960.167 1.6106L985.834 11.6321C986.222 11.784 986.627 11.8944 987.039 11.9618L1019.14 17.1946C1021.06 17.5077 1022.45 19.1621 1022.45 21.1115L1022.4 33.9471L1022.27 68.0554L1022.01 136.272L1021.52 262.443L1021.28 325.528L1021.16 357.071L1021.11 371.672C1021.1 372.288 1020.96 372.896 1020.68 373.45L1015.68 383.513C1015.02 384.841 1013.69 385.706 1012.21 385.763L958.173 387.855L958.156 387.855L894.296 388.104L830.42 388.353L766.555 388.602L766.543 388.602L702.681 388.097L702.669 388.096L702.657 388.097L638.79 389.1L638.778 389.1L511.036 389.598L511.025 389.599L255.514 393.613L255.506 393.614L191.653 394.114L127.798 392.603L127.767 392.602L127.735 392.603L63.9163 395.114L17.7151 390.779C17.0642 390.718 16.4401 390.498 15.8976 390.138L2.83334 381.477C1.72666 380.743 1.0654 379.501 1.07051 378.166L1.12061 365.066L1.24124 333.523L1.4825 270.438L1.96502 144.267L2.2259 76.0502L2.35634 41.9418L2.41659 26.1877C2.4192 25.5057 2.59615 24.8336 2.93062 24.2354L9.15533 13.1017C9.8365 11.8833 11.0969 11.0982 12.4847 11.0277L65.3821 8.34048L129.238 7.84L193.054 7.33984L224.296 10.999C224.79 11.0568 225.289 11.0529 225.783 10.9874L257.056 6.83821L512.504 4.8361L768.014 2.8335L831.83 2.33334L863.072 5.99253C863.566 6.05034 864.065 6.04642 864.559 5.98087Z" stroke="#00142D" stroke-width="2" vector-effect="non-scaling-stroke"/>
					</g>
					<defs>
						<filter id="filter0_d_1130_7266" x="0.0703125" y="0.338867" width="1027.38" height="399.777" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix"/>
							<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
							<feOffset dx="4" dy="4"/>
							<feComposite in2="hardAlpha" operator="out"/>
							<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
							<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1130_7266"/>
							<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1130_7266" result="shape"/>
						</filter>
					</defs>
				</svg>
				<div class="label">
					<p><?php echo $block->question[0]->text ?></p>
					<span>+</span>
				</div>
				<div class="drawer-items">
					<p><?php echo $block->answer[0]->text ?></p>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<section class="bottom-marquee max-width">
	<h3>As seen on</h3>
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
<section class="best-sellers mw max-width">
	<div class="top">
		<h3><?php echo $data->tile_trio_header[0]->text ?></h3>
	</div>
	<div class="best-sellers-wrapper slider no-drag-free no-loop no-loop-mobile" data-at="767" data-align="center">
		<div class="slides">
			<div class="inner">
				<?php foreach ($data->tile_trio_slide as $slide)  {
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
									<img class="preload-critical" data-preload-desktop="<?php echo $thisData->image->url ?>" data-preload-mobile="<?php echo $thisData->image->url ?>">
									<img class="preload-critical" data-preload-desktop="<?php echo $thisData->image_hover->url ?>" data-preload-mobile="<?php echo $thisData->image_hover->url ?>">
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
