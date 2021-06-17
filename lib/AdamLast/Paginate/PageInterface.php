<?php

namespace AdamLast\Paginate;

interface PageInterface extends \Traversable
{
    /**
     *  These functions allow the page to display information like:
     *    Page 3/16
     *
     *  Extra functionality could be added here such as:
     *    * Next Page
     *    * Previous Page
     *    * First Page
     *    * Last Page
     */
    /**
     * @return int
     */
    public function currentPageNumber(): int;

    /**
     * @return int
     */
    public function numberOfPages(): int;

    /**
     * Return how many items are on the current page
     * @return int
     */
    public function itemCount(): int;

}
