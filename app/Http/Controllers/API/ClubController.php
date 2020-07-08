<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Club;
use Validator;


class ClubController extends BaseController
{

public function club_list()
{
    
    $list = Club::paginate(15);
    if(count($list) > 0)
    {
        return $this->sendResponse($list, 'Club List Found successfully.');
    }
    else{
        $error =  "Empty List";
        return $this->sendError($error,$list);
    }
}

public function club_detail(Request $request)
{
    $validator = Validator::make($request->all(), [
        'club_id'    =>  'required',
    ]);

    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }
    $club_id = $request->club_id;
    $data = Club::find($club_id);
    if($data)
    {
        return $this->sendResponse($data, 'Club  Found successfully.');
    }
    else{
        $error =  "No data exist";
        return $this->sendError($error, $data);
    }
}

public function save_data(){
    $url = 'https://fut.best/api/clubs?page=1&limit=5';
// Collection object

        // Initializes a new cURL session
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
        ]);
        // Execute cURL request with all previous settings
        $response = curl_exec($curl);
        // Close cURL session
        curl_close($curl);
        $data =  json_encode($response);
     
          return $this->sendResponse($data, 'Club  Found successfully.');
      
      

}

public function data_db($data_array)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://fut.best/api/clubs?page=1&limit=5");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_array );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec ($ch);
    curl_close ($ch);
}


}
