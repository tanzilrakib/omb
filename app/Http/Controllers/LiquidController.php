<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use ShopifyApp;

class LiquidController extends Controller
{
    //


	public function getLiquidContents(){

        $shop = ShopifyApp::shop();
        $api = $shop->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));

        // GET SCRIPT TAGS
        $params['role'] = 'main';

        $res = $api->rest('GET', '/admin/themes.json', $params);
		
		$active_theme_id = $res->body->themes[0]->id;

		// GET ACTIVE THEME ASSETS
        $res = $api->rest('GET', '/admin/themes/'.$active_theme_id.'/assets.json');

        // GET SPECIFIC ASSET
        $params['asset[key]']='snippets/search-bar.liquid';
        $params['theme_id']=$active_theme_id;

        $res = $api->rest('GET', '/admin/themes/'.$active_theme_id.'/assets.json', $params);

		echo "<pre>";
		var_dump($res);
		echo "</pre>";
		die();
	}


}
