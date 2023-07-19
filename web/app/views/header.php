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
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
						<path d="M9.57028 17.9599L9.50257 18L9.46207 17.975C-3.41332 10.3098 1.00526 2.9114 5.78429 3.0008C5.93697 3.0008 6.09165 3.01593 6.24499 3.03434C8.16809 3.26519 9.07424 4.32208 9.5025 5.2317C9.92935 4.32279 10.8368 3.26518 12.7607 3.04293C17.6871 2.44181 22.818 10.0519 9.57028 17.9599Z" fill="#33336C"/>
					</svg>
				</a>
				<button class="icon-link cart">
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
				<button class="icon-link search">
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
