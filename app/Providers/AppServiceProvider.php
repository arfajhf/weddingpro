<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Payment; // <-- Asumsi model kamu namanya Payment
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('title', function ($expression) {
            $appName = config('app.name', 'Laravel App');
            return "<?php \$__env->startSection('title', {$expression} . ' | ' . '{$appName}'); ?>";
        });

        View::composer('layout.header', function ($view) {

        // Cek dulu udah login atau belum
        if (Auth::check()) {
            // Ambil data payment TERAKHIR punya user yang lagi login
            $latest_payment = Payment::where('user_id', Auth::user()->id)
                                    ->latest() // otomatis order by created_at desc
                                    ->first();

            // Kirim variabel $latest_payment ke view sidebar
            $view->with('latest_payment', $latest_payment);
        } else {
            // Kalo belum login, kirim null aja
            $view->with('latest_payment', null);
        }
    });
    }
}
