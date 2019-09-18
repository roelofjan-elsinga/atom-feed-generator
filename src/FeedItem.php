<?php

namespace AtomFeedGenerator;

use Carbon\Carbon;

interface FeedItem
{
    /**
     * Get the title of the feed item.
     *
     * @return string
     */
    public function title(): string;

    /**
     * Get the accessible url of the feed item.
     *
     * @return string
     */
    public function url(): string;

    /**
     * Get the content of the feed item.
     *
     * @return string
     */
    public function content(): string;

    /**
     * Get the summary of the feed item.
     *
     * @return string
     */
    public function summary(): string;

    /**
     * Determine whether this feed item has an image.
     *
     * @return bool
     */
    public function hasImage(): bool;

    /**
     * Get the URL of the image of the feed item.
     *
     * @return string
     */
    public function imageUrl(): string;

    /**
     * Get the mime type of the image of the feed item.
     *
     * @return string
     */
    public function imageMimeType(): string;

    /**
     * Get the width of the image of the feed item.
     *
     * @return int
     */
    public function imageWidth(): int;

    /**
     * Get the height of the image of the feed item.
     *
     * @return int
     */
    public function imageHeight(): int;

    /**
     * Get the date on which the feed item was created.
     *
     * @return Carbon
     */
    public function createdAt(): Carbon;

    /**
     * Get the date on which the feed item was last updated.
     *
     * @return Carbon
     */
    public function updatedAt(): Carbon;
}
