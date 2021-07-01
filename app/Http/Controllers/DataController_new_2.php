<?php

use DB;
use File;
use Response;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\API\ApiResponse;
use App\Models\API\TransLogApi;
use App\Models\Datak;

class DataController extends Controller
{
    public function storeData(Request $request)
    {
        //$isTokenValid = $this->checkToken($request->header('token'));
        $isTokenValid = true;
		if ($isTokenValid)
		{
			try{
                $checkData = DB::table('data')
                    ->where('id', $request->id)
                    ->first();
                if ($checkData != null) {
                    $response = array(
                        'status' => Data::SUKSES,
                        'message' => Data::MESSAGE_SUKSES,
                    );
                    return \Response::json($response);
                }
                
                DB::beginTransaction();
                $data                        = new Data;
                $data->nama                  = $request->nama;
                $data->no_telepon            = $request->no_telepon;
                $data->created_at		    = date("Y-m-d H:i:s");
				$data->updated_at		    = date("Y-m-d H:i:s");
                $data->save();
				DB::commit();

                $response = array(
					'status' => Data::SUKSES,
					'message' => Data::MESSAGE_SUKSES,
                );
			}
			catch (\Exception $e)
			{
				DB::rollback();
				$response = array(
					'warning' => $e->getMessage(),
					'message' => Data::MESSAGE_GAGAL,
					'status' => Data::GAGAL,
				);
			}

			return \Response::json($response);
		}
		else
		{
			$response = array(
				'status' => '401',
				'message' => 'Token salah, silahkan cek token anda.',
			);

			return \Response::json($response);
		}
    }

    public function getData()
    {
        //$isTokenValid = $this->checkToken($request->header('token'));
        $isTokenValid = true;
        if ($isTokenValid) {
            try{
                $employee = $request->sd_employee_id;

                //get schedule
                $schedule = DB::select('select * from data');

                $response = array(
                    'status' => 10,
                    'data' => $schedule,
                );

                return $response;

            } catch (\Exception $e) {
                $response = array(
                    'status' => '404',
                    'message' => $e->getMessage(),
                );
            }

            return \Response::json($response);
        } else {
            $response = array(
                'status' => '401',
                'message' => 'Token salah, silahkan cek token anda.',
            );

            return \Response::json($response);
        }
    }
}
