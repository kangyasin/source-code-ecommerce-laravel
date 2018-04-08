<?php

namespace App\Providers;
use App\CategoryProduct;
use App\Menu;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('front.master', function ($view) {
            $category = CategoryProduct::all();
            //$category = 'Test';
            $view->with('category', $category);
        });

        view()->composer('backend.dashboardmaster', function ($view) {
            $menu = Menu::where([
                        ['type', 'B'],
                        ['parent_number', '0'],
                        ['publish', '1']
                    ])
                    ->orderBy('sort','ASC')
                    ->get();
            //$category = 'Test';
            $datamenu = array();
            foreach ($menu as $menus) {
              $sub = Menu::where([['parent_number', $menus->id],['publish', 1]])->get();
              // array_push($datamenu, $sub);
              if(count($sub) == 0){
                $datamenu[$menus->id]=[];
              }else{
                $datamenu[$menus->id]=$sub;
              }
            }
            $view->with('menu', $menu);
            $view->with('submenu', $datamenu);

            //Get Utility

            $utility = Menu::where([
                        ['type', 'SA'],
                        ['parent_number', '7'],
                        ['publish', '1']
                    ])
                    ->orderBy('sort','ASC')
                    ->get();
            // $datasubutility = array();
            // foreach ($utility as $utilitys) {
            //   $subutility = Menu::where('parent_number', $utility->id)->get();
            //   // array_push($datamenu, $sub);
            //   if(count($subutility) == 0){
            //     $datasubutility[$utility->id]=[];
            //   }else{
            //     $datasubutility[$utility->id]=$datasubutility;
            //   }
            // }
            $view->with('utility', $utility);
            // $view->with('subutility', $subutility);

        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
