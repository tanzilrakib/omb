<?php

namespace App\Http\Controllers;
use ShopifyApp;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $scriptTags = 'main-script';

    public function index()
    {


        $scriptTagRoutes = explode(',' , $this->scriptTags);

        $shop = ShopifyApp::shop();
        $api = $shop->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));

        // GET SCRIPT TAGS
        $res = $api->rest('GET', '/admin/script_tags.json');


        // //TEMP SCRIPTTAGS DELETION FOR DEV ENVIRONMENT 
        // foreach ($scriptTagRoutes as $scriptTag) {
        //     foreach ($res->body->script_tags as $existingTags) {
        //         // echo "<pre>";
        //         //   var_dump($existingTags->src);
        //         // echo "</pre>";
        //         if( strpos($existingTags->src, $scriptTag) !== -1 ){
        //             // DELETE SCRIPT TAG
        //             $res = $api->rest('DELETE', '/admin/script_tags/'.$existingTags->id.'.json');
        //         }
        //       }  
        // }

        //IF FOREACH SCRIPT TAGS, SCRIPT TAG DOES NOT EXIST
        // WRITE SCRIPT TAGS
        // $params['script_tag']['event']= 'onload';
        // $params['script_tag']['src']= env('APP_URL').'/main-script';
        // $res = $api->rest('POST', '/admin/script_tags.json',$params);
        //END IF

        return view('welcome');
    }

     public function mainScript()
    {
        //

        // $public_path = public_path('img/'.'magnifying-glass-search-button.png');

        $buttonHtml = '<span style="background: url({{asset(\'img/magnifying-glass-search-button.png\')}}) no-repeat center center; background-size: contain; cursor: pointer; display: inline-block; height: 24px; width: 24px;"></span>';

        Session::put('test-data','session data is ok');
        $pageData = [
            'name' => ShopifyApp::shop()->shopify_domain,
            'buttonHtml' => $buttonHtml,
        ];
        $contents = view('main-script')->with('pageData', $pageData);
        return response($contents)->header('Content-Type', 'application/javascript');
        // return view('welcome');
    }

}
