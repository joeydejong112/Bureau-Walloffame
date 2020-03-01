<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('role', function($roles) {

            $user = auth()->user();
    
            $userRole = $user->roleOn($user->currentTeam);
    
            return "<?php if((is_array(with{$roles})) ? in_array('$userRole', with{$roles}) : with{$roles} == '$userRole') : ?>";
    });
    
    \Blade::directive('endrole', function() {
    
            return "<?php endif; ?>";
    });
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * 
     */

    public function register()
    {
        //

    }
    
}
