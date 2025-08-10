<?php
declare(strict_types=1);

namespace Luisinder;

/**
 * Helper final class to generate common Social Media meta tags (Twitter Cards & Open Graph).
 *
 * All methods return ready-to-embed HTML strings.
 */
final class SocialMetaTags
{
	private const DEFAULT_TW_DESCRIPTION_MAX = 200;

	/** Escape helper (HTML, UTF-8). */
	private static function esc(string $value): string
	{
		return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	}

	/** Safely truncate respecting multi-byte strings. */
	private static function truncate(string $text, int $max): string
	{
		if ($max <= 0) {
			return $text;
		}
		// use mbstring if available
		if (function_exists('mb_strlen')) {
			if (mb_strlen($text) > $max) {
				return mb_substr($text, 0, $max);
			}
			return $text;
		}
		if (strlen($text) > $max) {
			return substr($text, 0, $max);
		}
		return $text;
	}

	// -----------------------------------------------------------------
	// Standard
	// -----------------------------------------------------------------

	public static function metaTitle(string $title): string
	{
		return '<title>' . self::esc($title) . '</title>';
	}

	public static function metaDescription(string $description): string
	{
		return '<meta name="description" content="' . self::esc($description) . '" />';
	}

	// -----------------------------------------------------------------
	// Twitter (https://developer.twitter.com/en/docs/tweets/optimize-with-cards)
	// -----------------------------------------------------------------

	/** Card type: summary | summary_large_image | app | player */
	public static function meta_twCard(string $type): string
	{
		return '<meta name="twitter:card" content="' . self::esc($type) . '">';
	}

	public static function meta_twSite(string $user): string
	{
		return '<meta name="twitter:site" content="@' . self::esc(ltrim($user, '@')) . '">';
	}

	public static function meta_twTitle(string $title): string
	{
		return '<meta name="twitter:title" content="' . self::esc($title) . '">';
	}

	/** Truncate to <= 200 characters (original code incorrectly removed first 200). */
	public static function meta_twDescription(string $description, int $max = self::DEFAULT_TW_DESCRIPTION_MAX): string
	{
		$final = self::truncate($description, $max);
		return '<meta name="twitter:description" content="' . self::esc($final) . '">';
	}

	public static function meta_twCreator(string $creator): string
	{
		return '<meta name="twitter:creator" content="@' . self::esc(ltrim($creator, '@')) . '">';
	}

	public static function meta_twImage(string $image): string
	{
		return '<meta name="twitter:image" content="' . self::esc($image) . '">';
	}

	// -----------------------------------------------------------------
	// Open Graph (https://developers.facebook.com/docs/sharing/webmasters)
	// -----------------------------------------------------------------

	public static function meta_ogTitle(string $title): string
	{
		return '<meta property="og:title" content="' . self::esc($title) . '" />';
	}

	public static function meta_ogType(string $type): string
	{
		return '<meta property="og:type" content="' . self::esc($type) . '" />';
	}

	public static function meta_ogUrl(string $url): string
	{
		return '<meta property="og:url" content="' . self::esc($url) . '" />';
	}

	public static function meta_ogImage(string $imageUrl): string
	{
		return '<meta property="og:image" content="' . self::esc($imageUrl) . '" />';
	}

	public static function meta_ogSecureImage(string $imageUrl): string
	{
		return '<meta property="og:image:secure_url" content="' . self::esc($imageUrl) . '" />';
	}

	public static function meta_ogDescription(string $description): string
	{
		return '<meta property="og:description" content="' . self::esc($description) . '" />';
	}

	public static function meta_ogSiteName(string $siteName): string
	{
		return '<meta property="og:site_name" content="' . self::esc($siteName) . '" />';
	}

	public static function meta_ogPublishedTime(string $date): string
	{
		return '<meta property="article:published_time" content="' . self::esc($date) . '" />';
	}

	public static function meta_ogModifiedTime(string $date): string
	{
		return '<meta property="article:modified_time" content="' . self::esc($date) . '" />';
	}

	public static function meta_ogSection(string $section): string
	{
		return '<meta property="article:section" content="' . self::esc($section) . '" />';
	}

	public static function meta_ogArticleTag(string $tag): string
	{
		return '<meta property="article:tag" content="' . self::esc($tag) . '" />';
	}

	public static function meta_ogAdmin(string $adminId): string
	{
		return '<meta property="fb:admins" content="' . self::esc($adminId) . '" />';
	}

	public static function meta_ogAmount(string $amount): string
	{
		return '<meta property="og:price:amount" content="' . self::esc($amount) . '" />';
	}

	public static function meta_ogCurrency(string $currency): string
	{
		return '<meta property="og:price:currency" content="' . self::esc($currency) . '" />';
	}
}