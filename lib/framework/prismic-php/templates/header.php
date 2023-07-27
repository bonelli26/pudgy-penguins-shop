<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
global $GLOBAL;
global $PAGE;
global $CONTENT;

/* ----- Namespace ----- */
$namespace = $PAGE["namespace"];

/* ----- Page Title ----- */
if(isset($PAGE["title"])){
	$title = ucwords($PAGE["title"]) . " | " . SITE_TITLE;
} else if(isset($PAGE["document"]->data->title) && $PAGE["document"]->data->title !== "Home" && $PAGE["document"]->data->title !== "Products" && $PAGE["document"]->data->title !== "Collections"){
	$title = ucwords($PAGE["document"]->data->title) . " | " . SITE_TITLE;
} else if($namespace == "account"){
	$title = "Account" . " | " . SITE_TITLE;
} else {
	$title = SITE_TITLE;
}

/* --- Alt Title --- */
if(isset($PAGE["document"]->data->meta_title) && $PAGE["document"]->data->meta_title !== ""){
	$title = ucwords($PAGE["document"]->data->meta_title) . " | " . SITE_TITLE;
}

/* ----- Description ----- */
if(isset($PAGE["description"]) && $PAGE["description"] != ""){
	$description = $PAGE["description"];
} else if(isset($PAGE["document"]->data->meta_description)){
	$description = $PAGE["document"]->data->meta_description;
} else {
	$description = SITE_DESCRIPTION;
}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://use.typekit.net/jzx8dyj.css">
	<style type="text/css"><?php $file = file_get_contents(FILE_CACHE . "../assets/code/_init.css"); echo $file; ?></style>


	<?php include(views_dir() . "/parts/site/site-meta.php"); ?>
	<?php include(views_dir() . "/parts/site/site-prefetch.php"); ?>
	<?php include(views_dir() . "/parts/site/site-scripts.php"); ?>
</head>
<body>
<?php $globalModules = $CONTENT->local->getContent("global-modules", "global_modules")->data; ?>
<?php include(views_dir() . "/parts/global-scope.php"); ?>
<?php include(views_dir() . "/parts/navigation.php"); ?>

<div class="mini-cart-backdrop" id="mini-cart-backdrop"></div>
<div class="mini-cart" id="mini-cart">
	<div class="top">
		<button id="nav-close" class="nav-close">
			<svg width="45" height="43" viewBox="0 0 45 43" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M11.9453 11.7129L32.2593 32.0268" stroke="#33336C" stroke-width="3" stroke-linecap="round"/>
				<path d="M12.6875 31.3198L33.0014 11.0059" stroke="#33336C" stroke-width="3" stroke-linecap="round"/>
			</svg>
		</button>
		<p>Cart</p>
	</div>
	<div class="shipping-bar" id="shipping-bar">
		<div class="shipping-messages">
			<p>Spend $25 to get FREE SHIPPING</p>
		</div>
		<div class="track"><span id="shipping-meter-bar" class="shipping-meter-bar"></span></div>
	</div>
	<div class="inner c-24 products-wrapper">
		<div class="product-tile line-item one-time" data-id="40901003706412" data-key="40901003706412:e63d5040a948b5a76b39455def94d0da" data-quantity="1">
			<div class="product-image">
				<img src="https://images.prismic.io/pudgypenguinsshop/30151d95-506d-4f94-a917-f058befbf4ea_summer-pengu.jpg?auto=compress,format">
			</div>
			<div class="product-info">
				<div class="left">
					<p class="line-item-title type">Figurine</p>
					<p class="name">Bowl Cut</p>
					<div class="increment-wrapper quantity">
						<button name="decrease item quantity" aria-label="decrease item quantity" type="button" class="increment decrease" data-type="minus">-</button>
						<span class="count">1</span>
						<button name="increase item quantity" aria-label="increase item quantity" type="button" class="increment increase" data-type="plus">+</button>
					</div>
				</div>
				<div class="right">
					<div class="price-wrapper">
						<p class="line-item-price" data-orig-price="2999">$29.99</p>
					</div>
					<button class="remove-btn remove">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
							<g filter="url(#filter0_d_1221_10272)">
								<path d="M3.94888 16.601L9.09662 11.4533L4.14687 6.50352L8.50265 2.14774L13.4524 7.09749L18.6001 1.94975L22.9559 6.30553L17.8082 11.4533L22.7579 16.403L18.4021 20.7588L13.4524 15.809L8.30466 20.9568L3.94888 16.601Z" fill="#FF8B8B"/>
								<path d="M3.59533 16.2474L3.24178 16.601L3.59533 16.9546L7.95111 21.3103L8.30466 21.6639L8.65822 21.3103L13.4524 16.5161L18.0486 21.1123L18.4021 21.4659L18.7557 21.1123L23.1115 16.7566L23.465 16.403L23.1115 16.0495L18.5153 11.4533L23.3095 6.65908L23.663 6.30553L23.3095 5.95197L18.9537 1.5962L18.6001 1.24264L18.2466 1.5962L13.4524 6.39038L8.85621 1.79419L8.50265 1.44063L8.1491 1.79419L3.79332 6.14996L3.43977 6.50352L3.79332 6.85707L8.38952 11.4533L3.59533 16.2474Z" stroke="#00142D"/>
							</g>
							<defs>
								<filter id="filter0_d_1221_10272" x="0.535156" y="0.535645" width="23.835" height="23.8354" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
									<feFlood flood-opacity="0" result="BackgroundImageFix"/>
									<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
									<feOffset dx="-2" dy="2"/>
									<feComposite in2="hardAlpha" operator="out"/>
									<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.0784314 0 0 0 0 0.176471 0 0 0 1 0"/>
									<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1221_10272"/>
									<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1221_10272" result="shape"/>
								</filter>
							</defs>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom c-24">
		<div class="subtotal bottom-line">
			<p>Subtotal</p>
			<p id="cart-subtotal">$29.99</p>
		</div>
		<form action="/cart" method="post">
			<button class="btn black checkout-btn" id="checkout-btn" name="checkout">
				Checkout
			</button>
		</form>
		<div class="bottom-benefits">
			<p>Or 4-interest free payments of <strong>$6.99</strong> with</p>
		</div>
	</div>
	<div class="empty-wrapper">
		<p>Your cart is <strong>empty</strong></p>
		<a class="btn black" href="/">Start Shopping</a>
	</div>
</div>

<header id="header">
	<div class="pencil-bar marquee gradiant-marquee">
		<div class="inner" data-dur="<?php echo $globalModules->header_marquee_duration[0]->text; ?>">
			<div class="group">
				<?php foreach ($globalModules->header_marquee_content as $group) { ?>
					<p><?php echo $group->text[0]->text ?></p>
				<?php } ?>
			</div>
			<div class="group" aria-hidden="true">
				<?php foreach ($globalModules->header_marquee_content as $group) { ?>
					<p><?php echo $group->text[0]->text ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	<nav id="nav">
		<div class="logo">
			<img class="preload-critical" data-preload-desktop="<?php echo $globalModules->nav_image->url ?>" data-preload-mobile="<?php echo $globalModules->nav_image->url ?>">
		</div>
		<div class="nav-mask"></div>
		<div class="nav-bar mw" id="nav-bar">
			<div class="left">
				<?php foreach ($globalModules->link_list as $group) { ?>
					<a class="link" href="<?php echo $group->url[0]->text ?>"><?php echo $group->text[0]->text ?></a>
				<?php } ?>
			</div>
			<div class="right">
				<a class="icon-link" href="<?php echo $globalModules->fav_url[0]->text ?>">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
							<path d="M9.57028 17.9599L9.50257 18L9.46207 17.975C-3.41332 10.3098 1.00526 2.9114 5.78429 3.0008C5.93697 3.0008 6.09165 3.01593 6.24499 3.03434C8.16809 3.26519 9.07424 4.32208 9.5025 5.2317C9.92935 4.32279 10.8368 3.26518 12.7607 3.04293C17.6871 2.44181 22.818 10.0519 9.57028 17.9599Z" fill="#33336C"/>
						</svg>
					</span>
				</a>
				<button class="icon-link cart">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
						<g clip-path="url(#clip0_901_144)">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M2.64735 5.90851H4.73146V4.75589C4.73146 2.13294 6.88891 0 9.51186 0C12.1348 0 14.2678 2.13313 14.2678 4.75589V5.90851H16.7682C17.4057 5.90851 17.9208 6.42358 17.9208 7.06112V14.0725C17.9208 16.7696 15.7143 19 12.9933 19H6.1288C3.35822 19 1.07822 16.72 1.07822 13.9494V7.47684C1.07822 6.61888 1.78923 5.90786 2.6472 5.90786L2.64735 5.90851ZM6.91342 5.90851H12.0866V4.75589C12.0866 3.35835 10.9094 2.18196 9.51262 2.18196C8.09059 2.18196 6.91418 3.35907 6.91418 4.75589V5.90851H6.91342Z" fill="#33336C"/>
						</g>
						<defs>
							<clipPath id="clip0_901_144">
								<rect width="19" height="19" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					</span>
				</button>
				<button class="icon-link search">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
						<g clip-path="url(#clip0_901_1989)">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.80316 0.950195C11.5883 0.950195 14.6572 4.01832 14.6572 7.80426C14.6572 9.07488 14.3114 10.2653 13.7087 11.2858L17.5488 15.1267C18.2153 15.7931 18.2153 16.8834 17.5488 17.5507C16.8823 18.2164 15.792 18.2164 15.1255 17.5507L11.2847 13.7083C10.2634 14.3117 9.07366 14.6583 7.80313 14.6583C4.01795 14.6583 0.949066 11.5894 0.949066 7.8035C0.949808 4.01908 4.01874 0.950195 7.80316 0.950195ZM7.80391 3.52033C5.4386 3.52033 3.51998 5.43895 3.51998 7.80502C3.51998 10.1718 5.4386 12.0889 7.80391 12.0889C8.35684 12.0889 8.88379 11.9843 9.36993 11.7936L9.37438 11.7921L9.46196 11.7557L9.47086 11.752H9.47235L9.52282 11.7297L9.56586 11.7104L9.57328 11.7075L9.62375 11.6845L9.66012 11.6674L9.77293 11.611L9.82192 11.585L9.84567 11.5724L9.8709 11.5583L9.91914 11.5316L9.96145 11.5078L9.96813 11.5048L10.0156 11.4774L10.0268 11.47L10.1002 11.4239L10.1099 11.4173L10.1151 11.4143L10.1559 11.3876L10.2019 11.3586V11.3579L10.2479 11.3267L10.2865 11.3L10.2932 11.2955L10.3377 11.2629L10.3392 11.2621L10.4246 11.1976H10.4253L10.4513 11.1768L10.4676 11.1634L10.5099 11.1286L10.553 11.0959L10.5953 11.0595H10.596L10.6361 11.0239L10.6769 10.9875L10.6873 10.9779L10.7177 10.9504L10.7578 10.9133L10.7623 10.9089L10.7972 10.8755L10.8714 10.8013L10.8743 10.7975L10.9077 10.7634L10.9122 10.7582L10.95 10.7189L10.9775 10.6877L10.9872 10.6773L11.0235 10.6372L11.0591 10.5957L11.0948 10.5534L11.1118 10.5318L11.1282 10.5111L11.1965 10.425L11.1972 10.4235L11.2618 10.3381L11.2625 10.3374L11.2952 10.2921L11.2996 10.2854L11.3256 10.2468L11.3575 10.2008L11.3879 10.1548L11.3946 10.1452L11.431 10.088L11.4696 10.0264L11.477 10.0145L11.5052 9.96703L11.5082 9.96035L11.5319 9.91805L11.5586 9.8698L11.5727 9.84531L11.5854 9.82156L11.6106 9.77258L11.621 9.75328L11.6232 9.74883L11.6611 9.67461L11.6677 9.66125L11.6848 9.62488L11.7078 9.57516L11.7108 9.56773L11.7301 9.52395L11.7516 9.47348L11.7524 9.47273L11.7731 9.42301L11.7917 9.37625L11.7939 9.37106C11.9839 8.8864 12.0893 8.35872 12.0893 7.80578C12.0886 5.43895 10.17 3.52033 7.80391 3.52033Z" fill="#33336C"/>
						</g>
						<defs>
							<clipPath id="clip0_901_1989">
								<rect width="19" height="19" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					</span>
				</button>
				<a class="icon-link account" href="<?php echo $globalModules->account_url[0]->text ?>">
					<img class="preload-critical" data-preload-desktop="<?php echo $globalModules->account_image->url ?>" data-preload-mobile="<?php echo $globalModules->account_image->url ?>">
				</a>
			</div>
		</div>
		<button class="icon-link hammy mobile" id="hammy">
			<svg width="45" height="40" viewBox="0 0 45 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M13 13H32" stroke="#33336C" stroke-width="3" stroke-linecap="round"/>
				<path d="M13 20H32" stroke="#33336C" stroke-width="3" stroke-linecap="round"/>
				<path d="M13 27H32" stroke="#33336C" stroke-width="3" stroke-linecap="round"/>
			</svg>
		</button>
		<button class="icon-link cart mobile">
			<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
				<g clip-path="url(#clip0_901_144)">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M2.64735 5.90851H4.73146V4.75589C4.73146 2.13294 6.88891 0 9.51186 0C12.1348 0 14.2678 2.13313 14.2678 4.75589V5.90851H16.7682C17.4057 5.90851 17.9208 6.42358 17.9208 7.06112V14.0725C17.9208 16.7696 15.7143 19 12.9933 19H6.1288C3.35822 19 1.07822 16.72 1.07822 13.9494V7.47684C1.07822 6.61888 1.78923 5.90786 2.6472 5.90786L2.64735 5.90851ZM6.91342 5.90851H12.0866V4.75589C12.0866 3.35835 10.9094 2.18196 9.51262 2.18196C8.09059 2.18196 6.91418 3.35907 6.91418 4.75589V5.90851H6.91342Z" fill="#33336C"/>
				</g>
				<defs>
					<clipPath id="clip0_901_144">
						<rect width="19" height="19" fill="white"/>
					</clipPath>
				</defs>
			</svg>
		</button>
	</nav>
</header>

<main id="main" data-router-wrapper>
	<div class="view-<?php echo $namespace; ?>" data-router-view="<?php echo $namespace; ?>">
