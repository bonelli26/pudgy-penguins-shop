<?php $document = $PAGE["document"];
  use Prismic\Dom\RichText;
  $data = $document->data;
?>

<section class="hero mw">
	<div class="coin">
		<img class="preload" style="transform: translateZ(-100px);" data-preload-desktop="<?php echo $data->coin_1->url ?>" data-preload-mobile="<?php echo $data->coin_1->url ?>">
	</div>
	<div class="coin">
		<?php foreach ($data->group_image_1 as $group) { ?>
			<img class="preload" style="transform: translateZ(100px);" data-preload-desktop="<?php echo $group->image->url ?>" data-preload-mobile="<?php echo $group->image->url ?>">
		<?php } ?>
	</div>
	<div class="coin">
		<?php foreach ($data->group_image_2 as $group) { ?>
			<img class="preload" style="transform: translateZ(100px);" data-preload-desktop="<?php echo $group->image->url ?>" data-preload-mobile="<?php echo $group->image->url ?>">
		<?php } ?>
	</div>
	<div class="right">
		<h1 data-entrance="split-copy" data-orig-text="<?php echo RichText::asHtml($data->hero_heading); ?>" data-offset=".75" data-offset-mobile=".95" ><?php echo RichText::asHtml($data->hero_heading); ?></h1>
		<p class="copy"><?php echo $data->hero_copy[0]->text ?></p>
		<div class="inner-coin">
			<img class="preload" data-preload-desktop="<?php echo $data->heading_coin->url ?>" data-preload-mobile="<?php echo $data->heading_coin->url ?>">
		</div>
	</div>
</section>

<div class="clients-section mw">
	<h2><?php echo $data->clients_eyebrow[0]->text ?></h2>
	<div class="header" data-entrance="split-copy" data-orig-text="<?php echo RichText::asHtml($data->clients_heading) ?>" data-offset=".75" data-offset-mobile=".95"><?php echo RichText::asHtml($data->clients_heading) ?></div>
	<div class="inner">
		<span class="coin-container"
			  data-from="{&quot;yPercent&quot;: &quot;0&quot;, &quot;rotate&quot;: &quot;180&quot;}"
			  data-mobile-from="{&quot;yPercent&quot;: &quot;0&quot;, &quot;rotate&quot;: &quot;180&quot;}"
			  data-to="{&quot;yPercent&quot;: &quot;-55&quot;, &quot;rotate&quot;: &quot;0&quot;}"
			  data-mobile-to="{&quot;yPercent&quot;: &quot;-70&quot;, &quot;rotate&quot;: &quot;0&quot;}"
			  data-dur="0.35">
			<img class="preload coin" data-preload-desktop="<?php echo $data->clients_coin->url ?>" data-preload-mobile="<?php echo $data->clients_coin->url ?>">
		</span>
		<?php foreach ($data->clients_tiles as $tile) { ?>
			<div class="tile">
				<img class="preload" data-preload-desktop="<?php echo $tile->client_image->url ?>" data-preload-mobile="<?php echo $tile->client_image->url ?>">
			</div>
		<?php } ?>
	</div>
</div>


<div class="services-section mw" id="services-section">
	<h3><?php echo $data->services_eyebrow[0]->text ?></h3>
	<div class="header" data-entrance="split-copy" data-orig-text="<?php echo RichText::asHtml($data->services_heading) ?>" data-offset=".75" data-offset-mobile=".75"><?php echo RichText::asHtml($data->services_heading) ?></div>
	<div class="inner">
		<?php foreach ($data->services_repeater as $service) { ?>
			<div class="block">
				<?php if(isset($service->coin->url)) { ?>
					<span class="coin-container"
						  data-from="{ &quot;rotate&quot;: &quot;-20&quot;}"
						  data-to="{&quot;rotate&quot;: &quot;10&quot;}"
						  data-dur="0.6">
						<img class="preload coin" data-preload-desktop="<?php echo $service->coin->url ?>" data-preload-mobile="<?php echo $service->coin->url ?>">
					</span>
				<?php } ?>
				<div class="scale-wrapper" data-entrance="scale-fade" data-offset=".95" data-offset-mobile=".85">
					<p class="title scale-el"><?php echo $service->title[0]->text ?></p>
					<p class="copy scale-el"><?php echo $service->copy[0]->text ?></p>
					<span class="block-border"></span>
				</div>
			</div>
		<?php } ?>
		<div class="block">
			<div class="scale-wrapper" data-entrance="scale-fade" data-offset=".80" data-offset-mobile=".85">
				<span class="block-border scale-el"></span>
			</div>
		</div>
	</div>
</div>

<section class="case-section mw">
	<div class="c-99">
		<p class="eyebrow"><?php echo $data->case_eyebrow[0]->text ?></p>
		<div class="header" data-entrance="split-copy" data-orig-text="<?php echo RichText::asHtml($data->case_heading) ?>" data-offset=".75" data-offset-mobile=".95"><?php echo RichText::asHtml($data->case_heading) ?></div>
		<div class="tile-group">
			<?php foreach ($data->case_tile as $tile) { ?>
				<div class="tile">
					<div class="left">
						<div class="top">
							<div class="header"><?php echo $tile->title[0]->text ?></div>
							<p><?php echo $tile->subtitle[0]->text ?></p>
							<div class="list"><?php echo RichText::asHtml($tile->list); ?></div>
						</div>
						<div class="bottom">
							<p class="eyebrow"><?php echo $tile->outcome[0]->text ?></p>
							<div><?php echo RichText::asHtml($tile->outcome_copy); ?></div>
						</div>
					</div>
					<div class="right">
						<div class="video-wrapper">
							<div class="cover-image">
								<img class="preload" data-preload-desktop="<?php echo $tile->cover_image->url ?>" data-preload-mobile="<?php echo $tile->cover_image->url ?>">
								<button>+ play</button>
							</div>
							<video class="preload auto" muted preload loop autoplay playsinline webkit-playsinline data-preload-desktop="<?php echo $tile->video->url ?>" data-preload-mobile="<?php echo $tile->video->url ?>"></video>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<div class="testimonials-section slider no-drag-free" data-align="start">
	<h5><?php echo $data->testimonials_eyebrow[0]->text ?></h5>
	<div class="header" data-entrance="split-copy" data-orig-text="<?php echo RichText::asHtml($data->testimonials_heading) ?>" data-offset=".75" data-offset-mobile=".95"><?php echo RichText::asHtml($data->testimonials_heading) ?></div>
	<div class="slides">
		<div class="inner">
			<?php foreach ($data->testimonials_repeater as $testimonial) { ?>
				<div class="slide">
					<div class="left">
						<img class="preload bg" src="<?php echo $testimonial->image->url ?>" data-preload-mobile="<?php echo $testimonial->image->url ?>">
						<div class="content">
							<p><?php echo $testimonial->name[0]->text ?></p>
							<p class="job-title"><?php echo $testimonial->job_title[0]->text ?></p>
						</div>
						<div class="image-wrapper">
							<img class="preload" src="<?php echo $testimonial->company_image->url ?>" data-preload-mobile="<?php echo $testimonial->company_image->url ?>">
						</div>
					</div>
					<div class="right">
						<svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 36H22.1014V16.2198H11.4888V16.1209C11.4888 11.3736 13.5335 9.4945 17.2333 9.4945H22.1014V0H17.3306C6.23124 0 0 5.24176 0 16.6154V36ZM48 9.4945V0H43.2292C32.1298 0 25.8986 5.24176 25.8986 16.6154V36H48V16.2198H37.3874V16.1209C37.3874 11.3736 39.432 9.4945 43.1318 9.4945H48Z" fill="#5126EC"/>
						</svg>
						<p><?php echo $testimonial->copy[0]->text ?></p>
						<div class="image-wrapper">
							<img class="preload" src="<?php echo $testimonial->company_image->url ?>" data-preload-mobile="<?php echo $testimonial->company_image->url ?>">
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="dots mobile-only">
		<?php foreach ($data->testimonials_repeater as $key => $testimonial) { ?>
			<button class="dot<?php if ($key === 0) { echo " active"; } ?>"></button>
		<?php } ?>
	</div>
</div>
