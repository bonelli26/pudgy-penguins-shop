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

<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="svg-grid" viewBox="0 0 1439 3712"><g stroke="#E1DDEC" clip-path="url(#a)" opacity=".2"><path d="M30 3.5h1380M30 47.5h1380M30 91.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380M59.5 620V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4m44 616V4"/></g><g stroke="#E1DDEC" clip-path="url(#b)" opacity=".2"><path d="M30 619.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620m44 616V620"/></g><g stroke="#E1DDEC" clip-path="url(#c)" opacity=".2"><path d="M30 1239.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#d)" opacity=".2"><path d="M30 1859.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#e)" opacity=".2"><path d="M30 2479.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><g stroke="#E1DDEC" clip-path="url(#f)" opacity=".2"><path d="M30 3095.5h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1380 44h1380m-1350.5.5v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616m44 616v-616"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h1439v620H0z"/></clipPath><clipPath id="b"><path fill="#fff" d="M0 616h1439v620H0z"/></clipPath><clipPath id="c"><path fill="#fff" d="M0 1236h1439v620H0z"/></clipPath><clipPath id="d"><path fill="#fff" d="M0 1856h1439v620H0z"/></clipPath><clipPath id="e"><path fill="#fff" d="M0 2476h1439v620H0z"/></clipPath><clipPath id="f"><path fill="#fff" d="M0 3092h1439v620H0z"/></clipPath></defs></svg>
<section class="collection-hero">
	<h1><?php echo $data->collection_header[0]->text ?></h1>
	<p><?php echo $data->collection_intro_text[0]->text ?></p>
</section>
<section class="collection-grid mw">
	<div class="filters">
		<?php foreach ($data->filters as $filter) { ?>
			<button class="filter"><?php echo $filter->copy[0]->text ?></button>
		<?php } ?>
	</div>
	<div class="grid mw">
		<?php foreach ($data->collection_grid as $slide) { ?>
			<a class="slide card-wrapper mw" href="/">
				<span>
					<?php if($slide->ribbon === true): ?>
						<img class="preload ribbon" data-preload-desktop="<?php echo $slide->ribbon_image->url ?>" data-preload-mobile="<?php echo $slide->ribbon_image->url ?>">
					<?php else: ?>
						<svg class="svg-left" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
					<path d="M45.8518 1.81937C45.7323 1.78886 45.6089 1.77665 45.4858 1.78317L23.2581 2.95928C22.611 2.99352 22.1039 3.52816 22.1039 4.17612V6.0786L11.598 3.00656C11.327 2.9273 11.0368 2.94465 10.7771 3.05562L2.52113 6.58397C2.01419 6.80062 1.71586 7.33065 1.79366 7.87643L7.19182 45.7474C7.26845 46.2851 7.69164 46.7071 8.2295 46.7823C8.76735 46.8575 9.29003 46.5676 9.51114 46.0716L20.2099 22.0692L26.8408 23.7066C27.0466 23.7574 27.2621 23.7536 27.466 23.6957L50.6463 17.1094C50.7503 17.0799 50.8499 17.0366 50.9425 16.9808L64.5966 8.748C65.0173 8.49434 65.2446 8.01289 65.173 7.5269C65.1014 7.0409 64.745 6.64542 64.269 6.52385L45.8518 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
					</svg>
						<svg class="svg-right" xmlns="http://www.w3.org/2000/svg" width="67" height="49" viewBox="0 0 67 49" fill="none">
						<path d="M21.1155 1.81937C21.235 1.78886 21.3584 1.77665 21.4815 1.78317L43.7092 2.95928C44.3562 2.99352 44.8633 3.52816 44.8633 4.17612V6.0786L55.3693 3.00656C55.6403 2.9273 55.9305 2.94465 56.1901 3.05562L64.4462 6.58397C64.9531 6.80062 65.2514 7.33065 65.1736 7.87643L59.7755 45.7474C59.6988 46.2851 59.2756 46.7071 58.7378 46.7823C58.1999 46.8575 57.6773 46.5676 57.4561 46.0716L46.7574 22.0692L40.1265 23.7066C39.9207 23.7574 39.7052 23.7536 39.5013 23.6957L16.321 17.1094C16.217 17.0799 16.1174 17.0366 16.0248 16.9808L2.37064 8.748C1.94996 8.49434 1.72272 8.01289 1.79431 7.5269C1.8659 7.0409 2.22231 6.64542 2.69826 6.52385L21.1155 1.81937Z" fill="white" stroke="#00142D" stroke-width="2.43707" stroke-linejoin="round"/>
					</svg>
					<?php endif ?>
					<div class="tag" style="background: #<?php echo $slide->tag_color[0]->text ?>"><?php echo $slide->tag[0]->text ?></div>
					<div class="block">
						<div class="img-wrapper">
							<img class="preload-critical" data-preload-desktop="<?php echo $slide->image->url ?>" data-preload-mobile="<?php echo $slide->image->url ?>">
							<img class="preload" data-preload-desktop="<?php echo $slide->image_hover->url ?>" data-preload-mobile="<?php echo $slide->image_hover->url ?>">
						</div>
						<div class="block-inner">
							<p class="type"><?php echo $slide->type[0]->text ?></p>
							<p class="name"><?php echo $slide->name[0]->text ?></p>
							<div class="price"><?php echo RichText::asHtml($slide->price); ?></div>
							<button class="btn">
								<svg xmlns="http://www.w3.org/2000/svg" width="167" height="57" viewBox="0 0 167 57" fill="none">
									<path d="M7.44229 17.3088C5.69863 22.4301 1.39038 32.5543 2.1169 39.0576C7.05725 45.886 19.1878 54.5028 21.9728 55.3157H130.98C134.176 52.6331 138.366 54.198 140.061 55.3157L151.746 54.198C158.43 51.2715 163.733 44.5412 165.55 42.1025L163.37 30.5185H165.55L165.531 18.0201L150.382 5.41999L93.6232 4.30225L90.3538 7.65549L88.1742 4.30225L43.0701 5.41999C38.1298 7.85872 33.7464 6.43613 32.1723 5.41999H21.9728C19.0667 5.90774 11.0749 13.5491 7.44229 17.3088Z" fill="#C0E1FF"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M1.00677 39.385C0.906607 39.2466 0.845266 39.0911 0.827298 38.9303C0.442196 35.4832 1.38902 31.1734 2.59711 27.1764C3.40742 24.4955 4.3697 21.8548 5.17105 19.6558C5.56358 18.5787 5.91749 17.6075 6.19602 16.7894C6.24325 16.6507 6.32355 16.5213 6.43217 16.4089C8.26447 14.5125 11.1959 11.637 14.0447 9.16669C15.4672 7.93313 16.8894 6.7829 18.1563 5.90288C18.7894 5.46317 19.4032 5.07719 19.9738 4.77932C20.5241 4.49203 21.1241 4.2384 21.716 4.13905C21.8004 4.12489 21.8863 4.11775 21.9725 4.11775H32.1719C32.4597 4.11775 32.7392 4.19737 32.9664 4.34403C34.2045 5.14322 38.0112 6.43925 42.4083 4.26869C42.5972 4.17545 42.8116 4.12367 43.0312 4.11823L88.1352 3.00048C88.6247 2.98835 89.0805 3.20663 89.3131 3.56455L90.5699 5.49794L92.6167 3.39863C92.8693 3.13953 93.2523 2.9924 93.6535 3.0003L150.412 4.11805C150.745 4.12461 151.062 4.2375 151.298 4.43325L166.447 17.0333C166.689 17.2347 166.825 17.5075 166.826 17.7921L166.844 30.2906C166.844 30.5761 166.708 30.85 166.465 31.052C166.222 31.254 165.893 31.3675 165.549 31.3675H164.883L166.828 41.7097C166.876 41.9636 166.813 42.2232 166.65 42.4417C165.727 43.6815 163.909 46.0235 161.463 48.434C159.028 50.8326 155.904 53.3662 152.349 54.9228C152.207 54.9849 152.053 55.0246 151.893 55.0398L140.209 56.1576C139.868 56.1902 139.525 56.1089 139.256 55.9315C138.548 55.4646 137.286 54.8921 135.901 54.7288C134.573 54.5722 133.161 54.7875 131.899 55.8457C131.656 56.0498 131.325 56.1646 130.979 56.1646H21.9725C21.8263 56.1646 21.6811 56.1441 21.5432 56.1038C21.0435 55.958 20.4432 55.6757 19.8189 55.3402C19.1721 54.9925 18.4204 54.5439 17.5991 54.0178C15.9553 52.9648 13.9921 51.5752 11.9679 50.001C7.93864 46.8676 3.56879 42.9262 1.00677 39.385ZM163.37 30.2919H165.549L165.531 17.7934L150.382 5.19334L93.6228 4.07559L90.3535 7.42883L88.1738 4.07559L43.0698 5.19334C38.1294 7.63206 33.7461 6.20947 32.1719 5.19334H21.9725C19.0664 5.68108 11.0746 13.3224 7.44194 17.0821C7.15201 17.9337 6.79116 18.9236 6.39434 20.0122C4.40473 25.4703 1.51084 33.409 2.11656 38.8309C7.0569 45.6594 19.1874 54.2761 21.9725 55.0891H130.979C134.176 52.4065 138.366 53.9713 140.061 55.0891L151.745 53.9713C158.429 51.0448 163.733 44.3146 165.549 41.8758L163.37 30.2919Z" fill="#00142D"/>
									<path d="M2.25976 11.8488C0.512345 16.9529 1.53167 31.1918 2.25976 37.6732C7.21075 44.4787 14.0306 47.8004 16.8216 48.6106L129.707 48.6106C132.91 45.937 137.109 47.4966 138.808 48.6106H146.492C153.191 45.694 158.506 40.1037 160.326 37.6732L158.142 26.1282H160.326V13.6717L146.492 2.13143e-06L88.245 2.13143e-06L84.9686 3.34198L82.7843 2.13143e-06L41.608 2.13143e-06C36.657 2.43053 32.2641 1.01272 30.6866 2.13143e-06L16.8216 0C13.9092 0.486106 5.90022 8.10176 2.25976 11.8488Z" fill="url(#paint0_linear_858_6539)"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M1.15148 40.382C1.05048 40.2432 0.988585 40.0871 0.970441 39.9256C0.60415 36.6649 0.165017 31.4586 0.0368144 26.4197C-0.0272817 23.9005 -0.014009 21.4108 0.127112 19.2207C0.26703 17.0493 0.536167 15.1035 1.01422 13.7071C1.06184 13.568 1.14273 13.4383 1.25205 13.3258C3.08835 11.4357 6.02614 8.56986 8.88106 6.10785C10.3067 4.87841 11.732 3.73205 13.0016 2.85501C13.636 2.41678 14.251 2.03216 14.8227 1.73538C15.3742 1.44905 15.9747 1.19674 16.5664 1.09798C16.6504 1.08396 16.7358 1.0769 16.8215 1.0769L30.6865 1.07691C30.973 1.07691 31.2515 1.15587 31.4782 1.30143C32.7199 2.09853 36.5391 3.39147 40.9491 1.22652C41.1486 1.12857 41.3761 1.07691 41.6078 1.07691L82.7842 1.07691C83.2589 1.07691 83.6956 1.29271 83.9221 1.63928L85.1845 3.57082L87.2409 1.47328C87.4868 1.22247 87.8555 1.07691 88.2449 1.07691L146.492 1.07691C146.875 1.07691 147.237 1.21729 147.484 1.46042L161.317 15.1322C161.513 15.326 161.621 15.571 161.621 15.8242V28.2807C161.621 28.8747 161.041 29.3563 160.326 29.3563H159.656L161.605 39.6587C161.653 39.9137 161.59 40.1747 161.425 40.3939C159.542 42.9092 154.076 48.6755 147.093 51.7157C146.908 51.7965 146.702 51.8387 146.492 51.8387H138.808C138.517 51.8387 138.234 51.7572 138.005 51.6073C137.296 51.1419 136.03 50.5707 134.64 50.4078C133.306 50.2513 131.888 50.4669 130.624 51.5219C130.381 51.7247 130.051 51.8387 129.707 51.8387L16.8215 51.8387C16.676 51.8387 16.5316 51.8183 16.3943 51.7785C13.3281 50.8884 6.26322 47.4084 1.15148 40.382ZM158.142 28.2807H160.326V15.8242L146.492 2.15249H88.2449L84.9685 5.49447L82.7842 2.15249L41.6078 2.15249C36.6568 4.58302 32.264 3.16521 30.6865 2.15249L16.8215 2.15249C13.9091 2.6386 5.90009 10.2543 2.25964 14.0013C0.512222 19.1054 1.53155 33.3443 2.25964 39.8257C7.21063 46.6312 14.0304 49.9529 16.8215 50.7631L129.707 50.7631C132.91 48.0895 137.109 49.6491 138.808 50.7631H146.492C153.191 47.8464 158.506 42.2562 160.326 39.8257L158.142 28.2807Z" fill="#00142D"/>
									<path d="M129.722 48.89L131.067 55.0362C134.027 51.9072 138.13 54.1981 139.811 55.0362L138.13 48.89C135.439 45.7611 131.74 47.5863 129.722 48.89Z" fill="#98CDFF"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M130.756 56.08C130.261 55.9781 129.885 55.6448 129.793 55.2284L128.448 49.0823C128.362 48.6881 128.546 48.2868 128.927 48.0409C129.97 47.3669 131.606 46.4461 133.443 46.1693C134.388 46.0268 135.417 46.05 136.441 46.3863C137.467 46.7233 138.391 47.3433 139.183 48.2647C139.283 48.3808 139.354 48.5123 139.392 48.6515L141.074 54.7977C141.189 55.2178 140.991 55.6543 140.571 55.9071C140.151 56.1598 139.59 56.18 139.145 55.9583C139.067 55.9194 138.986 55.8788 138.903 55.8371C138.023 55.3947 136.88 54.8199 135.647 54.6C135 54.4846 134.39 54.4815 133.828 54.6259C133.278 54.7669 132.68 55.0718 132.085 55.7006C131.771 56.0333 131.25 56.1819 130.756 56.08ZM131.067 55.036C131.425 54.6578 131.799 54.3588 132.184 54.1268C134.239 52.888 136.592 53.5613 138.282 54.2984C138.774 54.5132 139.211 54.7334 139.567 54.9133C139.653 54.9568 139.735 54.9979 139.811 55.036L138.13 48.8899C135.439 45.7609 131.74 47.5861 129.722 48.8899L131.067 55.036Z" fill="#00142D"/>
									<path d="M146.873 48.6098L151.581 54.1972C160.662 49.1685 162.231 46.0023 165.034 42.743L159.989 37.9937C158.913 40.8991 151.581 46.9335 146.873 48.6098Z" fill="#99CCFD"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M152.299 55.0923C151.714 55.4165 150.924 55.293 150.521 54.8142L145.812 49.2267C145.589 48.9614 145.521 48.6266 145.628 48.3152C145.735 48.0037 146.005 47.7489 146.363 47.6213C148.499 46.8609 151.373 45.0418 153.887 42.9947C155.129 41.9829 156.249 40.9433 157.116 39.9932C158.002 39.0212 158.55 38.2204 158.751 37.6775C158.889 37.3055 159.258 37.0244 159.716 36.9424C160.174 36.8604 160.65 36.9903 160.96 37.2822L166.005 42.0315C166.403 42.4068 166.437 42.961 166.087 43.3683C165.68 43.8424 165.281 44.3388 164.867 44.8541C163.954 45.9907 162.967 47.2197 161.646 48.505C159.677 50.4216 156.919 52.5338 152.299 55.0923ZM165.034 42.7431C164.581 43.2694 164.161 43.7932 163.736 44.3228C161.528 47.0734 159.196 49.9806 151.581 54.1974L146.873 48.6099C147.249 48.476 147.642 48.3141 148.048 48.1283C152.148 46.2484 157.499 41.9106 159.408 39.0723C159.671 38.6808 159.869 38.3179 159.989 37.9938L165.034 42.7431Z" fill="#00142D"/>
									<path d="M158.306 25.7026L160.324 37.7156L165.705 42.4649L163.351 30.1726H165.705L160.324 25.7026H158.306Z" fill="#AFD8FF"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M159.381 38.4527C159.197 38.2904 159.079 38.0848 159.042 37.8641L157.024 25.8512C156.972 25.543 157.083 25.2312 157.329 24.9965C157.575 24.7617 157.931 24.627 158.306 24.627H160.324C160.667 24.627 160.997 24.7403 161.239 24.942L166.62 29.4119C166.991 29.7195 167.101 30.1822 166.901 30.5841C166.701 30.986 166.229 31.2481 165.705 31.2481H164.868L166.984 42.2958C167.073 42.7621 166.786 43.2222 166.276 43.4303C165.765 43.6384 165.151 43.5458 164.762 43.202L159.381 38.4527ZM163.351 30.1725H165.705L160.324 25.7025H158.306L160.324 37.7155L165.705 42.4648L163.351 30.1725Z" fill="#00142D"/>
									<defs>
										<linearGradient id="paint0_linear_858_6539" x1="0.835136" y1="-0.131794" x2="151.669" y2="67.3105" gradientUnits="userSpaceOnUse">
											<stop stop-color="#C1ECFF"/>
											<stop offset="0.48387" stop-color="#36BAE4"/>
											<stop offset="1" stop-color="white"/>
										</linearGradient>
									</defs>
								</svg>
								<span>Shop Now</span>
							</button>
						</div>
					</div>
				</span>
			</a>
		<?php } ?>
	</div>
</section>