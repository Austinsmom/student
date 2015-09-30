<?php namespace App\Helpers;

class MyHtml
{

    protected $app;

    // example Jeep and Engine ...
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function link($path, $name)
    {
        return '<a class="link" href="'.url($path).'">'.$name.'</a>';
    }

}