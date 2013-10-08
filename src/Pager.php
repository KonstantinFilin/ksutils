<?php

namespace KsUtils;

/**
 * Simple pagination model for abstract list
 */
class Pager
{
    /**
     * Total items on all pages
     * @var int
     */
    protected $itemsTotal;

    /**
     * Items of current page
     * @var array
     */
    protected $items;

    /**
     * Total number of pages
     * @var int
     */
    protected $pagesTotal;

    /**
     * Current page num
     * @var int
     */
    protected $curPage;

    /**
     * Maximum number of items on page
     * @var int
     */
    protected $onpage;

    public function __construct()
    {
        $this->curPage = 1;
        $this->pagesTotal = 1;
    }

    /**
     * Returns maximum number of items on page
     * @return int
     */
    public function getOnpage()
    {
        return $this->onpage;
    }

    /**
     * Sets maximum number of items on page
     * @param int $onpage
     */
    public function setOnpage($onpage)
    {
        $this->onpage = $onpage;
    }

    /**
     * Returns total items amount on all pages
     * @return int
     */
    public function getItemsTotal()
    {
        return $this->itemsTotal;
    }

    /**
     * Returns array of items
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns total number of pages
     * @return int
     */
    public function getPagesTotal()
    {
        return $this->pagesTotal;
    }

    /**
     * Returns current page number
     * @return int
     */
    public function getCurPage()
    {
        return $this->curPage;
    }

    /**
     * Sets total items amount
     * @param int $itemsTotal Total items amount
     */
    public function setItemsTotal($itemsTotal)
    {
        $this->itemsTotal = $itemsTotal;
    }

    /**
     * Sets array of items
     * @param array $items Array of items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Sets total number of pages
     * @param int $pagesTotal Total number of pages
     */
    public function setPagesTotal($pagesTotal)
    {
        $this->pagesTotal = $pagesTotal;
    }

    /**
     * Sets current page number
     * @param int $curPage Current page number
     */
    public function setCurPage($curPage)
    {
        $this->curPage = $curPage;
    }
}
