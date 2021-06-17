<?php

namespace AdamLast\Paginate;

use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    /**
     * @var Page
     */
    protected $page;

    protected function setUp(): void
    {
        $items = ['Dingo', 'Scorpion', 'Snake', 'Shark', 'Jellyfish',
            'Spider', 'Cassowary', 'Ant', 'Termite', 'Magpie',
            'Kangaroo', 'Dropbear', 'Emu', 'Crocodile', 'Mosquito'];
        $this->page = new Page(array_slice($items, 5, 5), 10, 100);
    }

    public function testCount()
    {
        $this->assertEquals(5, $this->page->itemCount());
    }

    public function testCurrentPageNumber()
    {
        $this->assertEquals(10, $this->page->currentPageNumber());
    }

    public function testNumberOfPages()
    {
        $this->assertEquals(100, $this->page->numberOfPages());
    }

    public function testArrayAccess()
    {
        $this->assertEquals('Cassowary', $this->page[1]);

        // Not allowed to set items on page
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cannot write values to Page object');
        $this->page[2] = 'Foo';
    }

    public function testArrayUnsetThrowsException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cannot unset values on Page object');
        unset($this->page[2]);
    }
}
