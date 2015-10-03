<?php namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class MyHtml
{

    protected $app;

    // example Jeep and Engine ...
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $path
     * @param $name
     * @return string
     */
    public function link($path, $name)
    {
        return '<a class="link" href="' . url($path) . '">' . $name . '</a>';
    }

    /**
     * @param $name
     * @param $value
     * @return string
     */
    public function email($name, $value)
    {
        $attr = $this->getAttr('class.email');

        return sprintf('<div class="input-email"><label>%s: </label><input %s name="%s" type="email" value="%s"></div>', ucfirst($name), $attr, $name, $value);
    }

    /**
     * @param $value
     * @return string
     */
    public function content($value)
    {
        return '<div class="content"><label>Comment: </label><br><textarea name="content" cols="50" rows="10" id="content">' . $value . '</textarea></div>';
    }

    /**
     * @return string
     */
    public function submit()
    {
        return '<button type="submit" class="btn" >ok</button>';
    }

    /**
     * @return string
     */
    public function authorUrl()
    {
        return '<input type="hidden" name="authorUrl" value="' . $this->app->request->url() . '">';
    }

    /**
     * @return static
     */
    public function now()
    {
        return Carbon::now();
    }

    /**
     * @param $input
     * @return mixed
     */
    public function sanitize($input)
    {
        $test = (substr_count($input, 'http') > 0 || substr_count($input, 'href') > 0 || substr_count($input, 'url') > 0);

        if ($test) preg_replace('/[http|href|url]/', '', $input);

        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $name
     * @return string
     */
    private function getAttr($name)
    {
        $attr = isset($this->app['config']['myHtml'][$name]) ? $this->app['config']['myHtml'][$name] : '';

        $pos = strpos($name, '.');

        if ($pos != false) return substr($name, 0, $pos) . "=\"$attr\"";

        return $attr;

    }



}