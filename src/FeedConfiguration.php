<?php

namespace AtomFeedGenerator;

use Carbon\Carbon;

interface FeedConfiguration
{
    /**
     * The title of the Atom Feed.
     *
     * @return string
     */
    public function title(): string;

    /**
     * The URL of the website for which this Atom Feed is generated.
     *
     * @return string
     */
    public function siteUrl(): string;

    /**
     * The URL at which this feed can be accessed.
     *
     * @return string
     */
    public function feedUrl(): string;

    /**
     * The date at which this Atom feed is last modified.
     *
     * @return Carbon
     */
    public function lastModified(): Carbon;

    /**
     * The author of the Atom feed.
     *
     * @return string
     */
    public function author(): string;

    /**
     * The identifier for this Atom feed.
     *
     * @return string
     */
    public function identifier(): string;
}
