<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(
            'recaptcha',
            'App\\Validators\\ReCaptcha@validate'
        );
        // TODO: tofiXed(2) in template Laravel (currency format in laravel)
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
    }
}
