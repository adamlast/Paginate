<?php

namespace AdamLast\Paginate;

use PHPUnit\Framework\TestCase;

class PaginationServiceTest extends TestCase
{
    public function testItemCount()
    {
        $service = new PaginationService(range(1, 100, 1), 10);
        $this->assertEquals(100, $service->itemCount());
    }

    public function testNumberOfPages()
    {
        $service = new PaginationService(range(1, 100, 1), 10);
        $this->assertEquals(10, $service->numberOfPages());
    }

    public function testGetPage()
    {
        $service = new PaginationService(range(1, 120, 1), 10);
        $page = $service->getPage(1);
        $this->assertInstanceOf(Page::class, $page);
        $this->assertEquals(10, $page->itemCount());
        $this->assertEquals(12, $page->numberOfPages());
    }

    public function testWithCollection()
    {
        $collection = new \ArrayObject(
            ['Dingo', 'Scorpion', 'Snake', 'Shark', 'Jellyfish',
                'Spider', 'Cassowary', 'Ant', 'Termite', 'Magpie',
                'Kangaroo', 'Dropbear', 'Emu', 'Crocodile', 'Mosquito']
        );
        $service = new PaginationService($collection, 5);
        $page2 = $service->getPage(2);
        $this->assertEquals('Spider', $page2[0]);
    }
}
