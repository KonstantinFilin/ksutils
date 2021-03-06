<?php

namespace KsUtils;

/**
 * Simple pagination model for abstract pages list
 */
class Pager
{
    /**
     * Total amount of pages
     * @var integer
     */
    protected $pagesTotal;

    /**
     * Number of the current page
     * @var integer
     */
    protected $curPage;

    /**
     * Maximum items amount on one page
     * @var integer
     */
    protected $showBy;

    /**
     * Maximum value for $showBy variable
     * @var integer
     */
    protected $showByMax;

    /**
     * Total amount of items on all pages
     * @var integer
     */
    protected $itemsTotal;

    /**
     * Items on the current page
     * @var array
     */
    protected $items;

    /**
     * Class's constructor
     * @param string $curPage Current page number
     * @param string $showBy  Maximum items amount on the page
     */
    public function __construct($curPage = 1, $showBy = 10)
    {
        $this->curPage = $curPage;
        $this->showBy = $showBy;
        $this->setDefaults();
    }

    /**
     * Sets default values for the class members
     */
    protected function setDefaults()
    {
        $this->pagesTotal = 1;
        $this->showByMax = 100;
        $this->itemsTotal = 0;
        $this->items = array();
    }

    /**
     * Sets maximum value for showBy parameter
     * @param integer $showByMax Maximum value for showBy parameter
     */
    public function setShowByMax($showByMax)
    {
        $this->showByMax = intval($showByMax);
    }

    /**
     * Returns showBy value
     * @return integer Maximum items amount on one page
     */
    public function getShowBy()
    {
        return $this->showBy > $this->showByMax ? $this->showByMax : $this->showBy;
    }

    /**
     * Sets showBy value
     * @param integer $showBy Maximum items amount on one page
     */
    public function setShowBy($showBy)
    {
        $this->showBy = intval($showBy);
    }

    /**
     * Returns total items amount on all pages
     * @return integer Total items amount on all pages
     */
    public function getItemsTotal()
    {
        return $this->itemsTotal;
    }

    /**
     * Returns items on the current page
     * @return array Items on the current page
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns total pages amount
     * @return integer Number of pages
     */
    public function getPagesTotal()
    {
        return $this->pagesTotal;
    }

    /**
     * Returns current page number
     * @return integer Current page number
     */
    public function getCurPage()
    {
        return $this->curPage > $this->pagesTotal ? $this->pagesTotal : $this->curPage;
    }

    /**
     * Sets items amount on all pages
     * @param integer $itemsTotal Items amount on all pages
     */
    public function setItemsTotal($itemsTotal)
    {
        $this->itemsTotal = $itemsTotal;
    }

    /**
     * Sets items on the current page
     * @param array $items Items on the current page
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Sets total number of pages
     * @param integer $pagesTotal Total number of pages
     */
    public function setPagesTotal($pagesTotal)
    {
        $this->pagesTotal = $pagesTotal;
    }

    /**
     * Sets current page number
     * @param integer $curPage Current page number
     */
    public function setCurPage($curPage)
    {
        $this->curPage = $curPage;
    }

    /**
     * Returns number of the first item on current page
     * @return integer Number of the first item on current page. 1-index based
     * (1 for first page, 11 for second, 21 for third - if 10 items for each page)
     */
    public function getFrom()
    {
        return ($this->getCurPage() - 1) * $this->getShowBy() + 1;
    }
}
