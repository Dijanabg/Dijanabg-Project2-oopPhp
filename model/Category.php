<?php




class Category
{
    protected $catname;

    public function __construct($catname)
    {
        $this->catname = $catname;
    }

    public function getCatname()
    {
        return $this->catname;
    }

    public function setCatname($catname)
    {
        $this->catname = $catname;
    }
}
