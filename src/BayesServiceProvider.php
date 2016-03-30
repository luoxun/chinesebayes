<?php 

namespace Bayes;

use Illuminate\Support\ServiceProvider;

class BayesServiceProvider  extends ServiceProvider
{
     /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    public function boot() {

        $this->handleConfigs();
        // $this->handleMigrations();
        // $this->handleViews();
        // $this->handleTranslations();
        // $this->handleRoutes();
    }    
    
    /**
     * @return void
     */
    public function register()
    {


        $this->app['Bayes'] = $this->app->share(
            function($app)
            {
                $bayesConfig  = $this->app['config']->get('bayes');
       
                switch ($bayesConfig['driver']) {
                    case 'sqlite':
                        
                        return new BayesService(new Storage\SqliteStorage($bayesConfig['sqlite']['file']));
                        break;
                    
                    default:
                        
                        break;
                }
                return null;
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['Bayes'];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/bayes.php';

        $this->publishes([$configPath => config_path('bayes.php')]);

        $this->mergeConfigFrom($configPath, 'bayes');
    }

}
