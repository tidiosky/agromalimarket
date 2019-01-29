<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/05/2018
 * Time: 11:45
 */

if (!function_exists('page_title')){
    function page_title($titre){
        $base_title = "MarketPlace - Mali";
        if ($titre === ''){
            return $base_title ;
        }else{
            return $titre. ' | ' . $base_title;
        }
    }
}
/**
 *  SetactiveClass
 */
if (!function_exists('set_active_route')){
    function set_active_route($route){
        return Route::is($route) ? 'active' : '';
    }
}

function getStockLevel($quantity) {
    if ($quantity >= 10) {
        $stockLevel = '<div class="badge badge-success"> Stock disponible  ' .'<p>' .$quantity.'</p>'.' </div>';
    }elseif ( $quantity > 1) {
        $stockLevel = '<div class="badge badge-warning"> Stock faible  ' .$quantity.' </div>';
    } else {
        $stockLevel = '<div class="badge badge-danger"> Stock inssuffisant  ' .$quantity.' </div>';
    }
    return $stockLevel;
}