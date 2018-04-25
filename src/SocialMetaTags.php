<?php
namespace Luisinder;

Class SocialMetaTags{

	// Standard
	public static function metaTitle(string $title){
		return "<title>" . $title .  "</title>";
	}

	public static function metaDescription(string $description){
		return '<meta name="description" content="' . $description . '" />';
	}

	// Twitter
	// https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started

	public static function meta_twCard(string $type){
		// The card type, which will be one of “summary”, “summary_large_image”, “app”, or “player”.
		return '<meta name="twitter:card" content="' . $type . '">';
	}

	public static function meta_twSite(string $user){
		return '<meta name="twitter:site" content="@' . $user . '">';
	}

	public static function meta_twTitle(string $title){
		return '<meta name="twitter:title" content="' . $title . '">';
	}

	public static function meta_twDescription (string $description){
		// Page description less than 200 characters
		$finalDescription = substr($description, 200);
		return '<meta name="twitter:description" content="' . $finalDescription . '">';
	}

	public static function meta_twCreator(string $creator){
		return '<meta name="twitter:creator" content="@' . $creator . '">';
	}

	public static function meta_twImage(string $image){
		// Twitter Summary card images must be at least 200x200px
		return '<meta name="twitter:image" content="' . $image  . '">';
	}

	// Open Graph
	// https://developers.facebook.com/docs/sharing/webmasters

	public static function meta_ogTitle(string $title){
		return '<meta property="og:title" content="' . $title . '" />';
	}

	public static function meta_ogType(string $type){
		// https://developers.facebook.com/docs/reference/opengraph#object-type
		return '<meta property="og:type" content="' . $type . '" />';
	}

	public static function meta_ogUrl(string $url){
		return '<meta property="og:url" content="' . $url . '" />';
	}

	public static function meta_ogImage(string $imageUrl){
		// https://developers.facebook.com/docs/sharing/webmasters#images
		return '<meta property="og:image" content="' . $imageUrl . '" />';
	}

	public static function meta_ogDescription(string $description){
		return '<meta property="og:description" content="' . $description . '" />';
	}

	public static function meta_ogSiteName(string $siteName){
		return '<meta property="og:site_name" content=" ' . $siteName . '" />';
	}

	public static function meta_ogPublishedTime(string $date){
		return '<meta property="article:published_time" content="' . $date . '" />';
	}

	public static function meta_ogModifiedTime(string $date){
		return '<meta property="article:modified_time" content="' . $date . '" />';
	}

	public static function meta_ogSection(string $section){
		return '<meta property="article:section" content="' . $section . '" />';
	}

	public static function meta_ogArticleTag(string $tag){
		return '<meta property="article:tag" content="' . $tag . '" />';
	}

	public static function meta_ogAdmin(string $adminId){
		return '<meta property="fb:admins" content="' . $adminId . '" />';
	}

	public static function meta_ogAmount(string $amount){
		return '<meta property="og:price:amount" content="' . $amount . '" />';
	}

	public static function meta_ogCurrency(string $currency){
		return '<meta property="og:price:currency" content="' . $currency . '" />';
	}

}