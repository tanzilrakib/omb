<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use ShopifyApp;

class LiquidController extends Controller
{
	//

	public function __construct(){
    }

	public function getLiquidContents($assetKey){

		
        $shop = ShopifyApp::shop();
        $api = ShopifyApp::shop()->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));  

        $params['role'] = 'main';

        $res = $api->rest('GET', '/admin/themes.json', $params);
		
		$activeThemeId = $res->body->themes[0]->id;

		// GET ACTIVE THEME ASSETS
        $res = $api->rest('GET', '/admin/themes/'.$activeThemeId.'/assets.json');

        // GET SPECIFIC ASSET
        $params['asset[key]']= $assetKey;
        $params['theme_id']=$activeThemeId;

        $res = $api->rest('GET', '/admin/themes/'.$activeThemeId.'/assets.json', $params);

        return [
        	'content' => $res->body->asset->value,
        	'id' => $activeThemeId
        ];
		
		 
	}


	public function embedElementInLiquid($dom, $embedElement, $refTag, $refAttr, $refAttrValue, $refPos){

		$elements = $dom->getElementsByTagName($refTag);

		foreach ($elements as $element) {
			if($element->getAttribute($refAttr) == $refAttrValue){
				if($refPos == 'before')
					$element->parentNode->insertBefore($embedElement,$element);
			}
		}

		return $dom->saveHTML();	
	}

	public function alterLiquidContents(){

		$shop = ShopifyApp::shop();
        $api = $shop->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));

        $liquid = $this->getLiquidContents('snippets/search-bar.liquid');

        $html = $liquid['content'];
        $activeThemeId = $liquid['id'];

		$dom = new \DOMDocument();
		// Ensure UTF-8 is respected by using 'mb_convert_encoding'

		$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

		$btn = $dom->createElement("button");
		$btn->nodeValue = "S";
		$btn->setAttribute("type","button");
		$btn->setAttribute("class", env('APP_NAME')."-element");
		$btn->setAttribute("id","myBtn");
		$btn->setAttribute("style","position:absolute;right:45px;top:50%;transform:translateY(-50%);");

		$html = $this->embedElementInLiquid($dom, $btn, 'button', 'type', 'submit', 'before');

  		$params['asset']['key']='snippets/search-bar.liquid';
  		$params['asset']['value'] = $html;

		// UPDATE ACTIVE THEME ASSETS
        $res = $api->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $params);

		echo "<pre>";
		dd($res->body);
		echo "</pre>";
		die();
		 
	}


	public function restoreOriginalSearchBar(){
		$this->restoreLiquidContents('snippets/search-bar.liquid');
	}

	public function restoreLiquidContents($key){
		$liquid = $this->getLiquidContents($key);

		$html = $liquid['content'];
		$activeThemeId = $liquid['id'];

		$dom = new \DOMDocument();
		// Ensure UTF-8 is respected by using 'mb_convert_encoding'

		@$dom->loadHTML($html);

		$finder = new \DomXPath($dom);
		$classname = env('APP_NAME')."-element";
		$nodes = $finder->query("//*[contains(@class, '$classname')]");

		foreach ($nodes as $node) {
			 $node->parentNode->removeChild($node);
		}

		$shop = ShopifyApp::shop();
        $api = $shop->api()->setApiKey(env('SHOPIFY_API_KEY'))->setApiKey(env('SHOPIFY_API_SECRET'));

  		$params['asset']['key'] = $key;
  		$params['asset']['value'] = $dom->saveHTML();
		// UPDATE ACTIVE THEME ASSETS
        $res = $api->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $params);

		echo "<pre>";
		dd($res->body);
		echo "</pre>";
		die();
	}

}
