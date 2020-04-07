<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Routing\UrlGenerator; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // if(\App::environment('production')) {
        //     $url->forceScheme('https');
        //     }
        \Blade::directive('role', function($roles) {

            $user = auth()->user();
    
            $userRole = $user->roleOn($user->currentTeam);
    
            return "<?php if((is_array(with{$roles})) ? in_array('$userRole', with{$roles}) : with{$roles} == '$userRole') : ?>";
    });
    
    \Blade::directive('endrole', function() {
    
            return "<?php endif; ?>";
    });
        Schema::defaultStringLength(191);
        if(\App::environment('production')) {

}
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * 
     */

    public function register()
    {
        //for glu application redirect to public_html for public folder
        
        // $this->app->bind('path.public', function() {
        //     return base_path().'../../public_html';
        // });
    }
    
}
