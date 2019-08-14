<?php


namespace AtomFeedGenerator\Tests\Stubs;


use AtomFeedGenerator\FeedItem;
use Carbon\Carbon;

class TestFeedItemWithoutImage implements FeedItem
{

    /**
     * Get the title of the feed item
     *
     * @return string
     */
    public function title(): string
    {
        return "Article title without image";
    }

    /**
     * Get the accessible url of the feed item
     *
     * @return string
     */
    public function url(): string
    {
        return "articles/test-article-without-image";
    }

    /**
     * Get the description of the feed item
     *
     * @return string
     */
    public function content(): string
    {
        return "This is the description";
    }

    /**
     * Get the summary of the feed item
     *
     * @return string
     */
    public function summary(): string
    {
        return "This is the summary";
    }

    /**
     * Determine whether this feed item has an image
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        return false;
    }

    /**
     * Get the URL of the image of the feed item
     *
     * @return string
     */
    public function imageUrl(): string
    {
        return "";
    }

    /**
     * Get the mime type of the image of the feed item
     *
     * @return string
     */
    public function imageMimeType(): string
    {
        return "";
    }

    /**
     * Get the width of the image of the feed item
     *
     * @return int
     */
    public function imageWidth(): int
    {
        return 0;
    }

    /**
     * Get the height of the image of the feed item
     *
     * @return int
     */
    public function imageHeight(): int
    {
        return 0;
    }

    /**
     * Get the date on which the feed item was created
     *
     * @return Carbon
     */
    public function createdAt(): Carbon
    {
        return Carbon::now()->subDay();
    }

    /**
     * Get the date on which the feed item was last updated
     *
     * @return Carbon
     */
    public function updatedAt(): Carbon
    {
        return Carbon::now();
    }
}