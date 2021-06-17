<?php

namespace AdamLast\Paginate;

use Exception;
use Traversable;

class Page implements PageInterface, \Iterator, \Countable, \ArrayAccess
{
    /**
     * @var array
     */
    private array $items_on_page = array();

    private int $page_number;

    private int $number_of_pages;

    /**
     * Support the iterator functionality
     */

    /**
     * @var int
     */
    private int $iterator_position = 0;

    /**
     * Page constructor.
     * @param array $items
     * @param int $page_number
     * @param int $number_of_pages
     */
    public function __construct(array $items, int $page_number, int $number_of_pages)
    {
        $this->items_on_page = $items;
        $this->page_number = $page_number;
        $this->number_of_pages = $number_of_pages;
        $this->iterator_position = 0;
    }

    public function currentPageNumber(): int
    {
        return $this->page_number;
    }

    public function numberOfPages(): int
    {
        return $this->number_of_pages;
    }

    public function itemCount(): int
    {
        return $this->count();
    }

    public function count()
    {
        return count($this->items_on_page);
    }

    /**
     * Iterator functions
     */

    /**
     * @return mixed
     */
    public function current() : mixed
    {
        return $this->items_on_page[$this->iterator_position];
    }

    /**
     * Move to next position
     */
    public function next() : void
    {
        $this->iterator_position++;
    }

    /**
     * @return int
     */
    public function key() : int
    {
        return $this->iterator_position;
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return isset($this->items_on_page[$this->iterator_position]);
    }

    /**
     * Reset to zero position
     */
    public function rewind()
    {
        $this->iterator_position = 0;
    }

    /**
     * ArrayAccess methods
     */

    public function offsetExists($offset)  : bool
    {
        return isset($this->items_on_page[$offset]);
    }

    public function offsetGet($offset) : mixed
    {
        return $this->items_on_page[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new Exception("Cannot write values to Page object");
    }

    public function offsetUnset($offset)
    {
        throw new Exception("Cannot unset values on Page object");
    }
}
   
