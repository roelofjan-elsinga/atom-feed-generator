<?php

namespace AtomFeedGenerator;

class AtomFeedGenerator
{
    /** @var array|FeedItem[] */
    private $links = [];
    /**
     * @var FeedConfiguration
     */
    private $configuration;

    /**
     * AtomFeedGenerator constructor.
     *
     * @param FeedConfiguration $configuration
     */
    public function __construct(FeedConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Create a new instance for the given domain.
     *
     * @param FeedConfiguration $configuration
     *
     * @return AtomFeedGenerator
     */
    public static function withConfiguration(FeedConfiguration $configuration): self
    {
        return new static($configuration);
    }

    /**
     * Add a FeedItem to the links list.
     *
     * @param FeedItem $item
     *
     * @return AtomFeedGenerator
     */
    public function add(FeedItem $item): self
    {
        $this->links[] = $item;

        return $this;
    }

    /**
     * Generate the atom string.
     *
     * @return string
     */
    public function generate(): string
    {
        $atom_string = $this->generateAtomHeader();

        $atom_string .= $this->generateMetaInformation();

        $atom_string .= $this->generateLinks();

        $atom_string .= $this->generateAtomFooter();

        return $atom_string;
    }

    /**
     * Generate the Atom File Header.
     *
     * @return string
     */
    private function generateAtomHeader(): string
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<feed xmlns=\"http://www.w3.org/2005/Atom\">\n";
    }

    /**
     * Generate the meta information of the Atom feed.
     *
     * @return string
     */
    private function generateMetaInformation(): string
    {
        return "<title>{$this->configuration->title()}</title>
              <link href=\"{$this->configuration->siteUrl()}\"/>
              <updated>{$this->configuration->lastModified()->toAtomString()}</updated>
              <author>
                <name>{$this->configuration->author()}</name>
              </author>
              <id>{$this->configuration->identifier()}</id>
              <link rel=\"self\" href='{$this->configuration->feedUrl()}'/>\n";
    }

    /**
     * Generate the links of the Atom feed.
     *
     * @return string
     */
    private function generateLinks(): string
    {
        $entries = array_map(function (FeedItem $item): string {
            $image_string = '';

            if ($item->hasImage()) {
                $image_string = '<media:content xmlns:media="http://search.yahoo.com/mrss/" ';
                $image_string .= "url=\"{$item->imageUrl()}\" medium=\"image\" ";
                $image_string .= "type=\"{$item->imageMimeType()}\" width=\"{$item->imageWidth()}\" ";
                $image_string .= "height=\"{$item->imageHeight()}\" />";
            }

            return "<entry>
                    <title>{$this->wrapContent($item->title())}</title>
                    <link href=\"{$this->configuration->siteUrl()}/{$item->url()}\"/>
                    <id>{$this->configuration->siteUrl()}/{$item->url()}</id>
                    <updated>{$item->updatedAt()->toAtomString()}</updated>
                    <published>{$item->createdAt()->toAtomString()}</published>
                    <content:encoded>{$this->wrapContent($item->content())}</content:encoded>
                    <summary>{$this->wrapContent($item->summary())}</summary>
                    {$image_string}
                  </entry>\n";
        }, $this->links);

        return implode('', $entries);
    }

    /**
     * Wrap content in CDATA to escape any entity parsing
     *
     * @param string $content
     * @return string
     */
    private function wrapContent(string $content): string
    {
        return "<![CDATA[{$content}]]>";
    }

    /**
     * Generate the footer of the Atom feed.
     *
     * @return string
     */
    private function generateAtomFooter(): string
    {
        return "\n</feed>";
    }
}
