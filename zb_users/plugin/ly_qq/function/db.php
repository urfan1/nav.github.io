<?php

class ly_qq extends Base
{
    public function __construct()
    {
        global $zbp;
        parent::__construct($zbp->table['ly_qq'], $zbp->datainfo['ly_qq'], __CLASS__);
    }
}
