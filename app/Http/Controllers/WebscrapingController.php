<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteData;
use Goutte\Client;

class WebscrapingController extends Controller
{
    //

    private $h1_results = array();
    private $h2_results = array();
    private $h3_results = array();
    private $h4_results = array();
    private $h5_results = array();
    private $h6_results = array();
    private $image_data = array();


    /*
        To get the website url from the user..
    */

    public function website_url()
    {
           return view('website.get_url');
    }

    /*
        To store the data to database..
    */

    public function get_website_data(Request $request)
    {
           $request->validate([
                'url' => 'required|max:250',
           ],[
                'url.required' => 'Url of any website must required',
                'url.max' => 'Url must be of less than 250 charecters long'
           ]);

           $client = new Client();
           $url = $request->url;
           $page = $client->request('GET', $url);

           // for h1 results..

           $page->filter('h1')->each(function($item){
            $this->h1_results[$item->filter('h1')->text()] = $item->text();
           });

           $data_1 = $this->h1_results; // data for h1 tag..


           // for h1 results..
           
           $page->filter('h2')->each(function($item){
            $this->h2_results[$item->filter('h2')->text()] = $item->text();
           });

           $data_2 = $this->h2_results; // data for h1 tag..

           // for h3 results..
           
           $page->filter('h3')->each(function($item){
            $this->h3_results[$item->filter('h3')->text()] = $item->text();
           });

           $data_3 = $this->h3_results; // data for h1 tag..

           // for h4 results..
           
           $page->filter('h4')->each(function($item){
            $this->h4_results[$item->filter('h4')->text()] = $item->text();
           });

           $data_4 = $this->h4_results; // data for h1 tag..

           // for h5 results..
           
           $page->filter('h5')->each(function($item){
            $this->h5_results[$item->filter('h5')->text()] = $item->text();
           });

           $data_5 = $this->h5_results; // data for h1 tag..

           // for h6 results..
           
           $page->filter('h6')->each(function($item){
            $this->h6_results[$item->filter('h6')->text()] = $item->text();
           });

           $data_6 = $this->h6_results; // data for h1 tag..


           // Image results..
           
           $page->filter('img')->each(function($item){
            $img_link = $item->attr('src');

            $image_data = [
                "images" => $img_link
            ];

            $this->image_data[] = $image_data;
           });

           $data_7 = $this->image_data; // data for h1 tag..
        
           // check, if the array is empty then null will entered into database else the value of array..

           if(sizeof($data_1)){
                 $data_1 = $data_1;
           }else{
                 $data_1 = "No Data Found";
           }

           // check, if the array is empty then null will entered into database else the value of array..

           if(sizeof($data_2)){
                    $data_2 = $data_2;
            }else{
                    $data_2 = "No Data Found";
            }

            // check, if the array is empty then null will entered into database else the value of array..

            if(sizeof($data_3)){
                        $data_3 = $data_3;
                }else{
                        $data_3 = "No Data Found";
                }

           // check, if the array is empty then null will entered into database else the value of array..

            if(sizeof($data_4)){
                    $data_4 = $data_4;
            }else{
                    $data_4 = "No Data Found";
            }

            // check, if the array is empty then null will entered into database else the value of array..

            if(sizeof($data_5)){
                $data_5 = $data_5;
            }else{
                    $data_5 = "No Data Found";
            }

            // check, if the array is empty then null will entered into database else the value of array..

            if(sizeof($data_6)){
                $data_6 = $data_6;
                }else{
                        $data_6 = "No Data Found";
                }

            // check, if the array is empty then null will entered into database else the value of array..

            if(sizeof($data_7)){
                $data_7 = $data_7;
            }else{
                    $data_7 = "No Data Found";
            }

            ///// Store the scraping data into database ...

            $save_data = WebsiteData::create([
                    'url' => $url,
                    'h1_data' => json_encode($data_1),
                    'h2_data' => json_encode($data_2),
                    'h3_data' => json_encode($data_3),
                    'h4_data' => json_encode($data_4),
                    'h5_data' => json_encode($data_5),
                    'h6_data' => json_encode($data_6),
                    'image_data' => json_encode($data_7)
            ]);

            return redirect()->back();
    }
}