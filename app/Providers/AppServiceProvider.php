<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // private $cat;
    // private $brand;

    // public function __construct(Category $category, Brand $brand){
    //     $this->cat = $category;
    //     $this->brand = $brand;
    // }
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
        Paginator::useBootstrapThree();

        // share data Category
        $Category = Category::orderBy('category_id','DESC')->get();
        View::share('ShareCategory', $Category);

        // Share data Brand
        $Brand = Brand::orderBy('brand_id','DESC')->get();
        View::share('ShareBrand', $Brand);
    }
}
