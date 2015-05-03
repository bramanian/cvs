<?php

class ContactController extends \BaseController {

    protected $layout = "layout.main";

    public function contactus()
    {
        $this->layout->content = View::make("backend.home.contactus")->render();
    }


}
