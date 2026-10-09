<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\SantosaApiService;



class PatientController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    | List Patient
    |--------------------------------------------------------------------------
    */


    public function index(Request $request, SantosaApiService $api)
    {


        try {


            $response = $api->get('/patients',[


                'page' => $request->page ?? 1,

                'search' => $request->search,

                'gender' => $request->gender,

                'blood_type' => $request->blood_type


            ]);



            $result = $response->json();



            return view('patients',[


                'patients'=>$result['data'] ?? [],


                'meta'=>$result['meta'] ?? []


            ]);



        } catch(\Exception $e){


            return view('patients',[


                'patients'=>[],


                'meta'=>[],


                'error'=>'Gagal mengambil data pasien'


            ]);


        }



    }







    /*
    |--------------------------------------------------------------------------
    | Create Page
    |--------------------------------------------------------------------------
    */


    public function create()
    {


        return view('patients.create');


    }








    /*
    |--------------------------------------------------------------------------
    | Store Patient
    |--------------------------------------------------------------------------
    */


    public function store(Request $request, SantosaApiService $api)
    {



        $response = $api->post('/patients',[


            'name'=>$request->name,


            'gender'=>$request->gender,


            'birth_date'=>$request->birth_date,


            'blood_type'=>$request->blood_type


        ]);




        if(!$response->successful()){



            $error=$response->json();



            return back()

            ->withInput()

            ->with(
                'error',
                $error['message']
                ??
                'Gagal membuat pasien'
            );



        }





        return redirect('/patients')

        ->with(
            'success',
            'Pasien berhasil ditambahkan'
        );



    }









    /*
    |--------------------------------------------------------------------------
    | Detail Patient
    |--------------------------------------------------------------------------
    */


    public function show($medical_record_no, SantosaApiService $api)
    {



        $response=$api->get(

            '/patients/'.$medical_record_no

        );




        if(!$response->successful()){



            return redirect('/patients')

            ->with(

                'error',

                'Data pasien tidak ditemukan'

            );


        }



        $result=$response->json();



        return view('patients.show',[


            'patient'=>$result['data'] ?? []

        ]);



    }









    /*
    |--------------------------------------------------------------------------
    | Edit Page
    |--------------------------------------------------------------------------
    */


    public function edit($id, SantosaApiService $api)
    {



        $response=$api->get(

            '/patients/'.$id

        );



        $result=$response->json();




        return view('patients.edit',[


            'patient'=>$result['data'] ?? []


        ]);



    }









    /*
    |--------------------------------------------------------------------------
    | Update Patient
    |--------------------------------------------------------------------------
    */


    public function update(
        Request $request,
        $id,
        SantosaApiService $api
    )
    {



        $response=$api->put(

            '/patients/'.$id,


            [


            'name'=>$request->name,


            'gender'=>$request->gender,


            'birth_date'=>$request->birth_date,


            'blood_type'=>$request->blood_type



            ]

        );






        if(!$response->successful()){



            $error=$response->json();



            return back()

            ->withInput()

            ->with(

                'error',

                $error['message']
                ??
                'Gagal memperbarui pasien'


            );



        }






        return redirect('/patients')

        ->with(

            'success',

            'Data pasien berhasil diperbarui'

        );



    }









    /*
    |--------------------------------------------------------------------------
    | Delete Patient
    |--------------------------------------------------------------------------
    */


    public function destroy($id, SantosaApiService $api)
    {



        $response=$api->delete(

            '/patients/'.$id

        );






        if(!$response->successful()){



            $error=$response->json();



            return back()

            ->with(

                'error',

                $error['message']

                ??

                'Pasien tidak dapat dihapus'


            );


        }







        return redirect('/patients')

        ->with(

            'success',

            'Pasien berhasil dihapus'

        );




    }




}