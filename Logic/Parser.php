<?php


namespace Logic;


class Parser
{
    protected $page;

    function __construct($url)
    {
        $this->page = file_get_contents($url);
    }

    function getPrice()
    {
        $page = preg_split('/itemprop="price" content="/', $this->page);
        $page = preg_split('/">/', $page[1]);
        $price = (int)$page[0];
        return $price;
    }

    function getName()
    {
        $page = preg_split('/class="title-info-title-text" itemprop="name">/', $this->page);
        $page = preg_split('/</', $page[1]);
        $name = $page[0];
        return $name;
    }
}