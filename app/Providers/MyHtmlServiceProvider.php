<?php

namespace App\Providers;

use Blade;
use App\Helpers\MyHtml;
use Illuminate\Support\ServiceProvider;


class MyHtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('break', function($expression){

            return "<?php  break ; ?>";
        });

        Blade::extend(function($value){

            return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('myHtml', function($app){
            return new MyHtml($app);
        });
    }
}