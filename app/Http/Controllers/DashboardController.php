<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\SantosaApiService;


class DashboardController extends Controller
{


    public function index(Request $request, SantosaApiService $api)
    {


        try {


            $response = $api->get('/dashboard/summary',[

                'date_from'=>$request->date_from,

                'date_to'=>$request->date_to

            ]);



            $result = $response->json();



            return view('dashboard',[


                'summary'=>$result['data'] ?? [],

                'error'=>null


            ]);



        } catch(\Exception $e){



            return view('dashboard',[


                'summary'=>[],

                'error'=>'Gagal mengambil data dashboard API'


            ]);



        }


    }


}