<?php

namespace AdamLast\Paginate;

use Traversable;

/**
 * Class PaginationService
 *
 * Accepts Traversable collections (including arrays)
 * Returns Page objects that contain a subset of the items passed in and
 * metadata about the page in the context of the original collection (i.e. Page 4 of 20)
 *
 * @package AdamLast\Paginate
 */
class PaginationService
{
    private Traversable|array $input;
    private int $items_per_page;
    private int $total_number_of_pages;

    /**
     * PaginationService constructor.
     * @param Traversable|array $input
     * @param int $items_per_page
     */
    public function __construct(Traversable|array $input, int $items_per_page) {
        $this->input = $input;
        $this->items_per_page = $items_per_page;
        $this->total_number_of_pages = ceil($this->itemCount() / $this->items_per_page );
    }

    /**
     * Number of items passed in
     * @return int
     */
    public function itemCount() : int {
        return count($this->input);
    }

    /**
     * For the specified input array and items per page how many pages do we get
     * @return int
     */
    public function numberOfPages() : int {
        return $this->total_number_of_pages;
    }

    /**
     * @param int $page_number
     * @return Page
     */
    public function getPage(int $page_number) : Page {
        $start_index = ($page_number - 1 ) * $this->items_per_page;
        $end_index = ($page_number) * $this->items_per_page - 1;
        $end_index = ($end_index > $this->itemCount()) ? $this->itemCount() - 1: $end_index;
        $page_items = [];
        $i = 0;
        foreach ($this->input as $item) {
            if (($i >= $start_index) && ($i <= $end_index)) {
                $page_items[] = $item;
            }
            $i++;
        }
        return new Page($page_items, $page_number, $this->total_number_of_pages);
    }
}