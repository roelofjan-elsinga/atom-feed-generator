# Atom Feed Generator

[![Build status](https://travis-ci.com/roelofjan-elsinga/atom-feed-generator.svg)](https://travis-ci.com/roelofjan-elsinga/atom-feed-generator)
[![StyleCI Status](https://github.styleci.io/repos/202346461/shield)](https://github.styleci.io/repos/202346461)
[![Code coverage](https://codecov.io/gh/roelofjan-elsinga/atom-feed-generator/branch/master/graph/badge.svg)](https://codecov.io/gh/roelofjan-elsinga/atom-feed-generator)
[![Total Downloads](https://poser.pugx.org/roelofjan-elsinga/atom-feed-generator/downloads)](https://packagist.org/packages/roelofjan-elsinga/atom-feed-generator)
[![Latest Stable Version](https://poser.pugx.org/roelofjan-elsinga/atom-feed-generator/v/stable)](https://packagist.org/packages/roelofjan-elsinga/atom-feed-generator)
[![License](https://poser.pugx.org/roelofjan-elsinga/atom-feed-generator/license)](https://packagist.org/packages/roelofjan-elsinga/atom-feed-generator)

This package helps you to very easily generate an Atom Feed for your website.

## Installation

You can include this package through Composer using:

```bash
composer require roelofjan-elsinga/atom-feed-generator
```

## Usage

```php
use AtomFeedGenerator\AtomFeedGenerator;

/**@var \AtomFeedGenerator\FeedConfiguration $configuration*/

$generator = AtomFeedGenerator::withConfiguration($configuration);

// or

$generator = new AtomFeedGenerator($configuration);

/**@var \AtomFeedGenerator\FeedItem $feed_item*/

$generator->add($feed_item);

$atom_string = $generator->generate();

print $atom_string;

```

This will result in:

```xml
<?xml version="1.0" encoding="utf-8"?>

<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Feed title</title>
    <link href="https://example.com"/>
    <updated>2019-01-01T12:00:00+00:00</updated>
    <author>
        <name>Feed Author</name>
    </author>
    <id>https://example.com</id>
    <link rel="self" href='https://example.com/feed'/>
    <entry>
        <title>Article title</title>
        <link href="https://example.com/articles/test-article"/>
        <id>https://example.com/articles/test-article</id>
        <updated>2019-01-02T12:00:00+00:00</updated>
        <published>2019-01-01T12:00:00+00:00</published>
        <content>This is the content of the item</content>
        <summary>This is the summary</summary>
        <media:content xmlns:media="http://search.yahoo.com/mrss/" url="/images/test-image.jpg" medium="image" type="image/jpeg" width="1920" height="1080" />
    </entry>
</feed>
```

## Testing

You can run the included tests by running ``./vendor/bin/phpunit`` in your terminal.
