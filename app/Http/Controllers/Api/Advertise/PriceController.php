<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function list(Request $request)
    {
        //        $connectionDetail = array("perPage"=>"AF001@site.com","activePage"=>"Af001@gent1080");
        $ch = curl_init();
        //        $post = json_encode($post);
        $authorization = "Authorization: Bearer 6dbd1f6b4abddca354b2eb0bff6f26826f82870a";
        curl_setopt($ch, CURLOPT_URL, 'http://91.92.185.233/api/priceList');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json' , $authorization]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
}
