<?php

namespace AtomFeedGenerator\Tests\Stubs;

use AtomFeedGenerator\FeedConfiguration;
use Carbon\Carbon;

class TestFeedConfiguration implements FeedConfiguration
{
    /**
     * The title of the Atom Feed.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Test feed';
    }

    /**
     * The URL of the website for which this Atom Feed is generated.
     *
     * @return string
     */
    public function siteUrl(): string
    {
        return 'https://example.com';
    }

    /**
     * The URL at which this feed can be accessed.
     *
     * @return string
     */
    public function feedUrl(): string
    {
        return 'https://example.com/feed';
    }

    /**
     * The date at which this Atom feed is last modified.
     *
     * @return Carbon
     */
    public function lastModified(): Carbon
    {
        return Carbon::now();
    }

    /**
     * The author of the Atom feed.
     *
     * @return string
     */
    public function author(): string
    {
        return 'Feed Author';
    }

    /**
     * The identifier for this Atom feed.
     *
     * @return string
     */
    public function identifier(): string
    {
        return $this->siteUrl();
    }
}
