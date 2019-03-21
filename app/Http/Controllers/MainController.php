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
    private $scriptTags = 'main-script,other-script';

    public function index()
    {


        $scriptTagRoutes = explode(',' , $this->scriptTags);

        $shop = ShopifyApp::shop();
        $api = $shop->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));

        // GET SCRIPT TAGS
        $res = $api->rest('GET', '/admin/script_tags.json');
        // echo "<pre>";
        // dd($res->body);
        // echo "</pre>";
        

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
        Session::put('test-data','test data is ok');
        $contents = view('main-script')->with('name', ShopifyApp::shop()->shopify_domain);
        return response($contents)->header('Content-Type', 'application/javascript');
        // return view('welcome');
    }

}
