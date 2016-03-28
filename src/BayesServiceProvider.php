<?php 

namespace Bayes;

use Illuminate\Support\ServiceProvider;

class BayesServiceProvider  extends ServiceProvider
{
    
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * @return void
     */
    public function register()
    {
        $this->app['Bayes'] = $this->app->share(
            function($app)
            {
                return new BayesService();
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Bayes');
    }

}
