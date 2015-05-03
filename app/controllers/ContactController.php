<?php

class ContactController extends \BaseController {

    protected $layout = "layout.main";

    public function contactus()
    {
        $this->layout->content = View::make("backend.home.contactus")->render();
    }

    public function send()
    {
        $input = Input::all();

        if ($input['type'] == 1)
        {
            Mail::queueOn(
                Config::get('confide::email_queue'),
                'emails.contactus',
                $input,
                function ($message)
                {
                    $message->to('consumer@kao.co.id', 'Solusi ibu attack')->subject('Contact Us');
                });
        } elseif ($input['type'] == 2)
        {
            Mail::queueOn(
                Config::get('confide::email_queue'),
                'emails.contactus',
                $input,
                function ($message)
                {
                    $message->to('konsumen@solusiibuattack.com', 'Solusi ibu attack')->subject('Contact Us');
                });
        }

        return Redirect::back()->with("success", "Thank you for contacting us!");
    }

}
