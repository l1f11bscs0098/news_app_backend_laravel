<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{

    public function search_articles(Request $request){
        $your_api_key =env('NEWS_API_KEY');
        $newsapi = new NewsApi($your_api_key);

        $language = "en";
        $country = "us";
        $q = null;
        if($request->q != null || $request->q != '' || $request->q != "false")
            $q = $request->q;

        $page_size = 10;
        $page = 1;

        $sources = 'CNN, bbc-news';
        // $category = '';
       
        $all_articles = $newsapi->getEverything($q, $sources=null, $domains=null, $exclude_domains=null, $from=null,
         $to=null, $language, $sort_by=null,  $page_size, $page);


        return response()->json(['data' => $all_articles, 'message' => 'Successfully logged out from news controller']);
        
    }

}
