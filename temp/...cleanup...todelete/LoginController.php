<?php

namespace App\Http\Controllers\API\Authentication;

use App\Http\classes\API\BaseResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function login_(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
            'password' => 'required'
        ]);

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $req;

        try {

            $response = Http::post('http://localhost/IIE/login.php', [
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($response->ok()) { // API response status code is 200

                $result = json_decode($response->body());

                if ($result->responseCode == '000') { // API responseCode is 000

                    $result_data = $result->data;

                    if ($result_data->c_type == 'C') {
                        return  $base_response->api_response('900', 'This is a corporate user, Use our corporate platform instead',  NULL);
                    }

                    // return $result_data->user_id;


                    /*

                    // return $result_data->user_id;
                    try {
                        $id = DB::table('users')->insert([
                            'email' => $result_data->email,
                            'user_id' => $result_data->user_id,
                            'customer_no' => $result_data->customer_no,
                            'f_login' => $result_data->f_login,
                            'c_type' => $result_data->c_type,
                        ]);
                        // dd($id);
                    } catch (\Exception $th) {
                        //  return $th->getMessage();
                         DB::table('tb_error_logs')->insert([
                            'platform' => 'ONLINE_INTERNET_BANKING',
                            'user_id' => 'AUTH',
                            'message' => (string) $th->getMessage()
                        ]);

                         return $th->getMessage();
                    }

                    */

                    $id = DB::table('users')->insertGetId([
                        'email' => $result_data->email,
                        'user_id' => $result_data->user_id,
                        'customer_no' => $result_data->customer_no,
                        'f_login' => $result_data->f_login,
                        'c_type' => $result_data->c_type,
                    ]);
                    // return $id;

                    $user = User::where('id', $id)->first();
                    // return json_encode($user);
                    Auth::login($user);

                    // return redirect()->route('home');

                    return Auth::user();


                    return  $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE

                } else {  // API responseCode is not 000

                    return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE

                }
            } else { // API response status code not 200

                DB::table('tb_error_logs')->insert([
                    'platform' => 'ONLINE_INTERNET_BANKING',
                    'user_id' => 'AUTH',
                    'code' => $response->status(),
                    'message' => $response->body()
                ]);

                return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE

            }
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE



        }
    }
}
