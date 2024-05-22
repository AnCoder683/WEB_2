<?php
class UserController extends BaseController
{
    private $acountmodel;
    public function __construct()
    {
        $this->acountmodel = $this->model("AcountModel");
    }
}
