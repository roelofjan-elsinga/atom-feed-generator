<?php

namespace AtomFeedGenerator\Tests;

use AtomFeedGenerator\AtomFeedGenerator;
use AtomFeedGenerator\Tests\Stubs\TestFeedConfiguration;
use AtomFeedGenerator\Tests\Stubs\TestFeedItemWithImage;
use AtomFeedGenerator\Tests\Stubs\TestFeedItemWithoutImage;
use PHPUnit\Framework\TestCase;

class AtomFeedGeneratorTest extends TestCase
{
    public function testAnEmptyFeedCanBeGenerated()
    {
        $configuration = new TestFeedConfiguration();

        $atom_feed = AtomFeedGenerator::withConfiguration($configuration)->generate();

        $this->assertNotFalse(strpos($atom_feed, '<?xml version="1.0" encoding="utf-8"?>'));

        $this->assertNotFalse(strpos($atom_feed, '<feed xmlns="http://www.w3.org/2005/Atom">'));

        $this->assertNotFalse(strpos($atom_feed, '<title>Test feed</title>'));

        $this->assertNotFalse(strpos($atom_feed, '<link href="https://example.com"/>'));

        $this->assertNotFalse(strpos($atom_feed, '<name>Feed Author</name>'));

        $this->assertNotFalse(strpos($atom_feed, '<link rel="self" href=\'https://example.com/feed\'/>'));

        $this->assertNotFalse(strpos($atom_feed, '<id>https://example.com</id>'));
    }

    public function testFeedCanContainItems()
    {
        $configuration = new TestFeedConfiguration();

        $atom_feed = AtomFeedGenerator::withConfiguration($configuration)

            ->add(new TestFeedItemWithImage())

            ->add(new TestFeedItemWithoutImage())

            ->generate();

        $this->assertNotFalse(strpos($atom_feed, '<title><![CDATA[Article title]]></title>'));

        $this->assertNotFalse(strpos($atom_feed, '<link href="https://example.com/articles/test-article"/>'));

        $this->assertNotFalse(strpos($atom_feed, '<id>https://example.com/articles/test-article</id>'));

        $this->assertNotFalse(strpos($atom_feed, '<content:encoded><![CDATA[This is the description]]></content:encoded>'));

        $this->assertNotFalse(strpos($atom_feed, '<summary><![CDATA[This is the summary]]></summary>'));

        $this->assertNotFalse(strpos($atom_feed, '<media:content xmlns:media="http://search.yahoo.com/mrss/" url="/images/test-image.jpg" medium="image" type="image/jpeg" width="1920" height="1080" />'));

        $this->assertNotFalse(strpos($atom_feed, '<title><![CDATA[Article title without image]]></title>'));

        $this->assertNotFalse(strpos($atom_feed, '<link href="https://example.com/articles/test-article-without-image"/>'));

        $this->assertNotFalse(strpos($atom_feed, '<id>https://example.com/articles/test-article-without-image</id>'));
    }
}
