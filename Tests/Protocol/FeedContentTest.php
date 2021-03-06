<?php

namespace Debril\RssAtomBundle\Protocol;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-26 at 23:10:14.
 */
class FeedContentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FeedContent
     */
    protected $object;

    const title = 'feed title';

    const subtitle = 'feed subtitle';

    const id = 'feed id';

    const link = 'http://example.com';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new FeedContent;

        $this->object->setId(self::id);
        $this->object->setLink(self::link);
        $this->object->setTitle(self::title);
        $this->object->setSubtitle(self::subtitle);
        $this->object->setLastModified(new \DateTime);

        for( $i = 0; $i < 5; $i++ )
        {
            $item = new Item();
            $item->setId($i);
            $this->object->addItem($item);
        }

        $lastModified = new \DateTime();

         $this->headers = array(
            'Last-Modified' => $lastModified->format(\DateTime::RFC2822),
            'Content-Lenght' => '110',
        );

        $this->object->setHeaders($this->headers);

        $this->object->setLastModified($lastModified);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getLastModified
     * @todo   Implement testGetLastModified().
     */
    public function testGetLastModified()
    {
        $this->assertInstanceOf("\DateTime", $this->object->getLastModified());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setLastModified
     * @todo   Implement testSetLastModified().
     */
    public function testSetLastModified()
    {
        $lastModified = \DateTime::createFromFormat('j-M-Y', '15-Feb-2013');

        $this->object->setLastModified($lastModified);

        $this->assertEquals($lastModified, $this->object->getLastModified());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getHeaders
     * @todo   Implement testGetHeaders().
     */
    public function testGetHeaders()
    {
        $this->assertInternalType('array', $this->object->getHeaders());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setHeaders
     * @todo   Implement testSetHeaders().
     */
    public function testSetHeaders()
    {
        $this->headers['Content-Type'] = 'Content-Type: text/html; charset=utf-8';

        $this->object->setHeaders($this->headers);

        $this->assertEquals($this->headers, $this->object->getHeaders());
    }


    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getTitle
     * @todo   Implement testGetTitle().
     */
    public function testGetTitle()
    {
        $this->assertEquals(self::title, $this->object->getTitle());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setTitle
     * @todo   Implement testSetTitle().
     */
    public function testSetTitle()
    {
        $newTitle = 'new Feed Title';

        $this->object->setTitle($newTitle);

        $this->assertEquals($newTitle, $this->object->getTitle());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getSubtitle
     * @todo   Implement testGetSubtitle().
     */
    public function testGetSubtitle()
    {
        $this->assertEquals(self::subtitle, $this->object->getSubtitle());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setSubtitle
     * @todo   Implement testSetSubtitle().
     */
    public function testSetSubtitle()
    {
        $newSubTitle = 'new subtitle';

        $this->object->setSubtitle($newSubTitle);

        $this->assertEquals($newSubTitle, $this->object->getSubtitle());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getLink
     * @todo   Implement testGetLink().
     */
    public function testGetLink()
    {
        $this->assertEquals(self::link, $this->object->getLink());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setLink
     * @todo   Implement testSetLink().
     */
    public function testSetLink()
    {
        $newLink = 'http://newlink.com';

        $this->object->setLink($newLink);

        $this->assertEquals($newLink, $this->object->getLink());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getId
     * @todo   Implement testGetId().
     */
    public function testGetId()
    {
        $this->assertEquals(self::id, $this->object->getId());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::setId
     * @todo   Implement testSetId().
     */
    public function testSetId()
    {
        $newId = '5';

        $this->object->setId($newId);

        $this->assertEquals($newId, $this->object->getId());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::getItemsCount
     * @todo   Implement testGetItemsCount().
     */
    public function testGetItemsCount()
    {
        $count = 0;

        foreach( $this->object as $item )
        {
            $count++;
        }

        $this->assertEquals($count, $this->object->getItemsCount());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::addItem
     * @todo   Implement testAddItem().
     */
    public function testAddItem()
    {
        $count = $this->object->getItemsCount();

        $ret = $this->object->addItem(new Item());

        $this->assertInstanceOf("Debril\RssAtomBundle\Protocol\FeedContent", $ret);
        $this->assertEquals($count+1, $this->object->getItemsCount());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::addAcceptableItem
     */
    public function testAddAcceptableItem()
    {
        $count = $this->object->getItemsCount();

        $item = new Item();
        $item->setUpdated(\DateTime::createFromFormat('j-M-Y', '17-Feb-2012'));
        $ret = $this->object->addAcceptableItem($item, \DateTime::createFromFormat('j-M-Y', '16-Feb-2012'));

        $this->assertInstanceOf("Debril\RssAtomBundle\Protocol\FeedContent", $ret);
        $this->assertEquals($count+1, $this->object->getItemsCount());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::addAcceptableItem
     * @expectedException Debril\RssAtomBundle\Protocol\FeedContentException
     */
    public function testAddAcceptableItemException()
    {
        $item = new Item();
        $this->object->addAcceptableItem($item, \DateTime::createFromFormat('j-M-Y', '16-Feb-2012'));
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::current
     * @todo   Implement testCurrent().
     */
    public function testCurrent()
    {
        $item = $this->object->current();

        $this->assertEquals(0, $item->getId());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::key
     * @todo   Implement testKey().
     */
    public function testKey()
    {
        $keyBefore = $this->object->key();
        $this->assertEquals(0, $keyBefore);

        $this->object->next();

        $keyAfter = $this->object->key();
        $this->assertEquals(1, $keyAfter);
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::next
     * @todo   Implement testNext().
     */
    public function testNext()
    {
        $this->object->rewind();

        $count = 0;
        $ids = array();

        foreach( $this->object as $item )
        {
            $count++;
            $this->assertArrayNotHasKey($item->getId(), $ids);
            $ids[] = $item->getId();
        }

        $this->assertEquals($count, $this->object->getItemsCount());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::rewind
     * @todo   Implement testRewind().
     */
    public function testRewind()
    {
        $this->object->rewind();

        $this->assertEquals(0, $this->object->key());

        $this->object->next();
        $this->object->rewind();

        $this->assertEquals(0, $this->object->key());
    }

    /**
     * @covers Debril\RssAtomBundle\Protocol\FeedContent::valid
     * @todo   Implement testValid().
     */
    public function testValid()
    {
        $item = $this->object->current();

        $this->assertInstanceOf("Debril\RssAtomBundle\Protocol\Item", $item);

        $this->assertTrue($this->object->valid());

        $count = $this->object->getItemsCount();

        for ( $i = 0; $i < $count; $i++ )
        {
            $this->object->next();
        }

        $this->assertFalse($this->object->valid());
    }

}
