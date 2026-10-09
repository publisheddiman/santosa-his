<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\SantosaApiService;



class VisitController extends Controller
{


    /**
     * Daftar Kunjungan
     */
    public function index(Request $request, SantosaApiService $api)
    {


        try {


            $response = $api->get('/visits',[


                'page' => $request->page ?? 1,


                'status' => $request->status,


                'unit' => $request->unit,


                'date_from' => $request->date_from,


                'date_to' => $request->date_to



            ]);



            $result = $response->json();



            return view('visits',[


                'visits'=>$result['data'] ?? [],


                'meta'=>$result['meta'] ?? []



            ]);



        } catch(\Exception $e){



            return view('visits',[


                'visits'=>[],


                'meta'=>[],


                'error'=>'Gagal mengambil data kunjungan'


            ]);


        }


    }








    /**
     * Halaman Tambah Visit
     */
    public function create(SantosaApiService $api)
    {



        try {



            // pasien

            $patients = $api->get('/patients',[

                'per_page'=>100

            ])->json();





            // unit

            $units = $api->get('/units',[

                'per_page'=>100

            ])->json();







            // diagnosis

            $diagnoses = $api->get('/diagnoses',[

                'per_page'=>100

            ])->json();







            return view('visits.create',[


                'patients'=>$patients['data'] ?? [],


                'units'=>$units['data'] ?? [],


                'diagnoses'=>$diagnoses['data'] ?? []



            ]);






        } catch(\Exception $e){



            return back()->with(

                'error',

                'Gagal mengambil master data'

            );



        }



    }









    /**
     * Ambil dokter berdasarkan unit
     */
    public function doctors(
        Request $request,
        SantosaApiService $api
    )
    {



        $response = $api->get('/doctors',[



            'unit_code'=>$request->unit_code,


            'is_active'=>true,


            'per_page'=>100



        ]);




        return response()->json(

            $response->json()

        );


    }









    /**
     * Simpan Visit
     */
    public function store(
        Request $request,
        SantosaApiService $api
    )
    {



        $response = $api->post('/visits',[



            'patient_medical_record_no'=>

            $request->patient_medical_record_no,




            'unit_code'=>

            $request->unit_code,




            'doctor_code'=>

            $request->doctor_code,




            'diagnosis_code'=>

            $request->diagnosis_code,




            'visit_date'=>

            $request->visit_date,




            'visit_type'=>

            $request->visit_type,




            'complaint'=>

            $request->complaint



        ]);








        if(!$response->successful()){



            $error = $response->json();



            return back()

            ->withInput()

            ->with(

                'error',

                $error['message']

                ??

                'Gagal membuat kunjungan'

            );



        }







        return redirect('/visits')

        ->with(

            'success',

            'Kunjungan berhasil dibuat'

        );



    }









    /**
     * Update Status Visit
     */
    public function updateStatus(
        Request $request,
        $visit_no,
        SantosaApiService $api
    )
    {



        $response = $api->patch(

            '/visits/'.$visit_no.'/status',

            [


                'status'=>$request->status


            ]

        );







        if(!$response->successful()){



            $error=$response->json();



            return back()->with(

                'error',

                $error['message']

                ??

                'Status tidak dapat diperbarui'


            );


        }







        return back()->with(

            'success',

            'Status kunjungan diperbarui'

        );



    }









    /**
     * Delete Visit
     */
    public function destroy(
        $visit_no,
        SantosaApiService $api
    )
    {



        $response=$api->delete(

            '/visits/'.$visit_no

        );








        if(!$response->successful()){



            $error=$response->json();



            return back()->with(

                'error',

                $error['message']

                ??

                'Visit tidak dapat dihapus'


            );



        }







        return back()->with(

            'success',

            'Visit berhasil dihapus'

        );



    }



}