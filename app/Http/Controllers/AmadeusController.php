<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AmadeusController extends Controller
{
    
    /*
    * get amadeus access token
    * @param client key and secret
    * @env
    * return token
    */
    public function generateToken(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://test.api.amadeus.com/v1/security/oauth2/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "client_id=6tWUgreARQD1FRLJq4pJriQw0idk8Lhb&client_secret=QmlGkk2XqQXnKXe5&grant_type=client_credentials",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
         $res = json_decode($response, true);
        // echo $response;
        }
        return $res['access_token'];
    }

    /*
    * get airport name based on country names and user search
    * @param access token
    * request subtype ('AIRPORT', 'CITY')
    * return airpot details 
    */
    public function getAirPortListing(){

        $token = $this->generateToken();
       
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT,CITY&keyword=indi&page[limit]=10",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $token",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
         $res = json_decode($response, true);
        }
        $locationArray = array();
        if(!empty($res)){
            foreach ($res['data'] as $key => $value) {
                $locationArray[] = array(
                    'name' => $value['name'],
                    'iatacode' => $value['iataCode'],
                    'cityName' => $value['address']['cityName'],
                    'countryName' => $value['address']['countryName']

                );
            }
        }
        $data['locationArray'] = $locationArray;
        return view('frontend.index', $data);
    }

    /*
    * get fliht search detail's
    * @param Post request
    * return flight details
    */
    public function getFlightListing(Request $request){
//  dd($request->all());
        $return = '';
        $departure = Carbon::parse($request->departure)->format('Y-m-d');
        if($request->return){
            $return = Carbon::parse($request->return)->format('Y-m-d');
        }
        $adults = $request->adults;
        $from = $request->get('from');
        $to = $request->get('to');
        $token = $this->generateToken();

        if(empty($return)){
            $src= "https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$from&destination=$to&departureDate=$departure&adults=$adults";
        }else{
            $src= "https://test.api.amadeus.com/v1/shopping/flight-offers?origin=$from&destination=$to&departureDate=$departure&returnDate=$return&adults=$adults";
        }
         
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $src,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $token",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $res = json_decode($response, true);
        }

        if($res){
            $flights = array();
            $carriers = '' ; $currencies = ''; $aircraft = ''; $locations = ''; 
            foreach ($res['data'] as $key => $value) {
                // dd($value['offerItems'][0]['services'][0]['segments']);
                $flights[] = array(
                    'segments' => $value['offerItems'][0]['services'][0]['segments'],
                    'price' => $value['offerItems'][0]['price'],
                    'pricePerAdult' => $value['offerItems'][0]['pricePerAdult'],
                );
                $carriers = $res['dictionaries']['carriers'];
                $currencies = $res['dictionaries']['currencies'];
                $aircraft = $res['dictionaries']['aircraft'];
                $locations = $res['dictionaries']['locations'];
            }
        }

        $data['flights'] = $flights;
        $data['carriers'] = $carriers;
        $data['currencies'] = $currencies;
        $data['aircraft'] = $aircraft;
        $data['locations'] = $locations;

        return view('frontend.search_result', $data);
    }
}
