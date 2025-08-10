# Social Meta Tags

[![Latest Stable Version](https://poser.pugx.org/luisinder/social-metatags/v/stable)](https://packagist.org/packages/luisinder/social-metatags)
[![Total Downloads](https://poser.pugx.org/luisinder/social-metatags/downloads)](https://packagist.org/packages/luisinder/social-metatags)
[![License](https://poser.pugx.org/luisinder/social-metatags/license)](https://packagist.org/packages/luisinder/social-metatags)

Lightweight PHP (PSR-4) helper to generate the most common Twitter Card and Open Graph meta tags.

## Features

* Simple static API (a single final class).
* Escapes all values with `htmlspecialchars()` to avoid XSS injection.
* Correct Twitter description truncation (≤ 200 chars).
* PHP 8.2+ typed code, `strict_types=1`.
* Zero dependencies.

## Installation

Using Composer:

```bash
composer require luisinder/social-metatags
```

The library autoloads via PSR-4 (`Luisinder\\`).

## Quick Start

```php
<?php
use Luisinder\SocialMetaTags as SMT;

echo SMT::metaTitle('My Article');
echo SMT::metaDescription('Short summary for search engines.');

// Twitter
echo SMT::meta_twCard('summary_large_image');
echo SMT::meta_twSite('mySite');        // @ prefix auto-added
echo SMT::meta_twTitle('My Article');
echo SMT::meta_twDescription('A longer description that will be truncated to 200 characters automatically.');
echo SMT::meta_twCreator('authorHandle');
echo SMT::meta_twImage('https://example.com/img/article-cover.jpg');

// Open Graph
echo SMT::meta_ogTitle('My Article');
echo SMT::meta_ogType('article');
echo SMT::meta_ogUrl('https://example.com/articles/my-article');
echo SMT::meta_ogImage('https://example.com/img/article-cover.jpg');
echo SMT::meta_ogDescription('Same description (or a custom one) for Open Graph.');
echo SMT::meta_ogSiteName('Example Site');
echo SMT::meta_ogPublishedTime('2025-08-10T09:30:00+00:00');
```

You can place these tags inside the `<head>` section of any HTML page or template engine. The order of the tags is not strictly important, but conventional grouping (standard / Twitter / Open Graph) improves readability.

## API Reference

Standard:
* `metaTitle(string $title): string`
* `metaDescription(string $description): string`

Twitter:
* `meta_twCard(string $type)` – `summary`, `summary_large_image`, `app`, `player`.
* `meta_twSite(string $user)` – Pass without `@` (it will be added).
* `meta_twTitle(string $title)`
* `meta_twDescription(string $description, int $max = 200)` – Auto-truncates.
* `meta_twCreator(string $creator)` – Pass without `@`.
* `meta_twImage(string $image)` – URL to the image.

Open Graph / Facebook:
* `meta_ogTitle(string $title)`
* `meta_ogType(string $type)` – e.g. `website`, `article`, `product`.
* `meta_ogUrl(string $url)`
* `meta_ogImage(string $imageUrl)`
* `meta_ogSecureImage(string $imageUrl)` – HTTPS variant.
* `meta_ogDescription(string $description)`
* `meta_ogSiteName(string $siteName)`
* `meta_ogPublishedTime(string $date)` – ISO 8601 recommended.
* `meta_ogModifiedTime(string $date)`
* `meta_ogSection(string $section)`
* `meta_ogArticleTag(string $tag)` – Individual tag (call multiple times for several tags).
* `meta_ogAdmin(string $adminId)` – Facebook admin ID.
* `meta_ogAmount(string $amount)` – For commerce objects.
* `meta_ogCurrency(string $currency)` – ISO currency (e.g. `USD`).

## Security

All dynamic values are HTML-escaped. Still, always pass trusted canonical URLs and validated data.

## Versioning

Follows semantic versioning. Breaking changes (if any) will increment the major version.

## Contributing

Issues and pull requests are welcome. Please open an issue to discuss large changes first.

## License

MIT License – see the [LICENSE](LICENSE) file.

## Author

Created by Luis Cajigas.