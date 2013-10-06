<?php

    namespace KsUtils;

    class Pager
    {
        protected $itemsTotal;
        protected $items;
        protected $pagesTotal;
        protected $curPage;
        protected $onpage;

        function __construct()
        {
            $this->curPage = 1;
            $this->pagesTotal = 1;
        }

        public function getOnpage()
        {
            return $this->onpage;
        }

        public function setOnpage($onpage)
        {
            $this->onpage = $onpage;
        }

        public function getItemsTotal()
        {
            return $this->itemsTotal;
        }

        public function getItems()
        {
            return $this->items;
        }

        public function getPagesTotal()
        {
            return $this->pagesTotal;
        }

        public function getCurPage()
        {
            return $this->curPage;
        }

        public function setItemsTotal($itemsTotal)
        {
            $this->itemsTotal = $itemsTotal;
        }

        public function setItems($items)
        {
            $this->items = $items;
        }

        public function setPagesTotal($pagesTotal)
        {
            $this->pagesTotal = $pagesTotal;
        }

        public function setCurPage($curPage)
        {
            $this->curPage = $curPage;
        }
    }
