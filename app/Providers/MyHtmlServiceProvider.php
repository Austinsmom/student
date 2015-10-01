<?php

namespace App\Providers;

use Blade;
use App\Helpers\MyHtml;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class MyHtmlServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('break', function ($expression) {

            return "<?php  break ; ?>";
        });

        Blade::extend(function ($value) {

            return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);

        });

        // add rules for Form Request
        Validator::extend('spam_email', function ($attribute, $value, $parameters) {

            \Akismet::setCommentAuthorEmail($value);
            if (\Akismet::isSpam()) {
                return false;
            }

            return true;
        });

        Validator::extend('spam_content', function ($attribute, $value, $parameters) {

            \Akismet::setCommentContent($value);
            if (\Akismet::isSpam()) {
                return false;
            }

            return true;
        });

        Validator::extend('spam_author', function ($attribute, $value, $parameters) {

            \Akismet::setCommentAuthorUrl($value);
            if (\Akismet::isSpam()) {
                return false;
            }

            return true;
        });

        Validator::extend('spam_test', function ($attribute, $value, $parameters) {

           return false;
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('myHtml', function ($app) {
            return new MyHtml($app);
        });
    }


}