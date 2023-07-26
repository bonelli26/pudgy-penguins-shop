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
<section class="collection-hero">
	<h1><?php echo $data->collection_header[0]->text ?></h1>
	<p><?php echo $data->collection_intro_text[0]->text ?></p>
</section>
<section class="collection-grid mw">
	<div class="filters">
		<button class="pink-btn blue active" data-trigger="all">all toys</button>
		<?php foreach($data->filters as $key => $filter) { ?>
			<button class="pink-btn blue" data-trigger="<?php echo $filter->copy[0]->text ?>"><?php echo $filter->copy[0]->text ?></button>
		<?php } ?>
	</div>
	<div class="grid mw">
		<?php foreach ($data->collection_grid as $slide)  {
			$thisDocument = $CONTENT->local->getContent($slide->slide->uid, "penguin_block");
			$thisData = $thisDocument->data; ?>
			<a class="card-wrapper <?php echo $thisData->type[0]->text ?>" href="/">
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
		<div class="card-wrapper dummy"></div>
		<div class="card-wrapper dummy"></div>
	</div>
</section>
