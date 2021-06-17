# Paginate

Simple Pagination library designed to work on any [Traversable](https://www.php.net/manual/en/class.traversable.php) PHP collection. This can be an array or any class that implement the Iterator and Countable interfaces.

## Installation

You can install Paginate using Composer. To do that simply require the package in your `composer.json` file:

```json
{
    "require": {
        "adamlast/Paginate": "^0.1.0"
    }
}
```

Then run `composer update` to install the package.

## Summary

There are two component classes:

* `PaginatorService` that takes the collection as a construction parameter and which returns a specified;
* `Page` object that contains the items in the collection that should be on the 'Page' and relevant information about the Page that allows constructions like 'Page 1 of 25', etc/

## Simple Example

```php
use AdamLast\Paginate\PaginationService;

$array = ['Dingo', 'Scorpion', 'Snake', 'Shark', 'Jellyfish',
'Spider', 'Cassowary', 'Ant', 'Termite', 'Magpie',
'Kangaroo', 'Dropbear', 'Emu', 'Crocodile', 'Mosquito'];

$service = new PaginationService($array, 5);

$page = $service->getPage(2);

print ("Page ".  $page->currentPageNumber() . " of " . $page->numberOfPages(). "\n");

foreach ($page as $k => $item) {
    print("Item {$k}: {$item} \n");
}
```

## Current To-do list
1. PaginationService should support array_slice if possible.
2. Parameter checking
3. Exceptions and unit testing of exceptions
4. Extend Page class with functions to support `Next Page` / `Prev Page` functionality
6. More examples in documentation
7. Support passing of closures to enable lazy loading of particular slice of collection if supported.
