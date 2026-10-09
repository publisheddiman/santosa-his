@extends('layouts.app')


@section('content')


<div class="page-header">

    <div>
        <h1 class="page-title">
            Registrasi Kunjungan
        </h1>

        <p class="page-description">
            Membuat data kunjungan pasien baru pada Santosa Hospital Information System
        </p>
    </div>


    <a href="/visits" class="btn">
        Kembali
    </a>

</div>





@if(session('error'))

<div class="alert alert-error">

    {{ session('error') }}

</div>

@endif






<form method="POST" action="/visits" id="visitForm">

@csrf



<div class="visit-layout">



<!-- LEFT -->

<div>



<div class="card">


<div class="section-header">
Informasi Pasien
</div>



<div class="form-group">

<label>
Pasien
</label>


<select 
name="patient_medical_record_no"
required
>


<option value="">
Pilih pasien
</option>


@foreach($patients as $patient)


<option value="{{ $patient['medical_record_no'] }}">


{{ $patient['medical_record_no'] }}

-

{{ $patient['name'] }}


</option>


@endforeach


</select>


</div>


</div>









<div class="card">


<div class="section-header">
Informasi Pelayanan
</div>



<div class="form-group">

<label>
Unit Pelayanan
</label>



<select 
name="unit_code"
id="unit"
required
>


<option value="">
Pilih unit
</option>



@foreach($units as $unit)


<option value="{{ $unit['code'] }}">


{{ $unit['name'] }}


</option>



@endforeach


</select>


</div>








<div class="form-group">


<label>
Dokter Pemeriksa
</label>



<select 
name="doctor_code"
id="doctor"
required
>


<option value="">
Pilih unit terlebih dahulu
</option>


</select>



</div>









<div class="form-group">


<label>
Tanggal Visit
</label>


<input 
type="date"
name="visit_date"
value="{{ date('Y-m-d') }}"
required
>


</div>







<div class="form-group">


<label>
Visit Type
</label>


<select name="visit_type">


<option value="NEW">
NEW
</option>


<option value="OLD">
OLD
</option>


</select>



<div class="helper-text">

NEW untuk pasien tanpa riwayat completed visit.
Gunakan OLD jika pasien memiliki riwayat kunjungan sebelumnya.

</div>



</div>



</div>



</div>










<!-- RIGHT -->


<div>


<div class="card">


<div class="section-header">
Diagnosis
</div>



<div class="form-group">


<label>
Kode Diagnosis
</label>



<select name="diagnosis_code"
required
>


<option value="">
Pilih diagnosis
</option>



@foreach($diagnoses as $diagnosis)


<option value="{{ $diagnosis['code'] }}">


{{ $diagnosis['code'] }}

-

{{ $diagnosis['name'] }}


</option>


@endforeach



</select>



</div>



</div>








<div class="card">


<div class="section-header">

Keluhan Pasien

</div>



<div class="form-group">


<label>
Complaint
</label>


<textarea

name="complaint"

rows="8"

placeholder="Masukkan keluhan pasien"

></textarea>



</div>



</div>






<div class="card information-card">


<h3>
Aturan Kunjungan
</h3>



<ul>

<li>
Dokter harus sesuai dengan unit pelayanan.
</li>


<li>
Status awal kunjungan adalah REGISTERED.
</li>


<li>
Visit NEW/OLD mengikuti riwayat pasien.
</li>


<li>
Validasi bisnis akan mengikuti API Hospital Information System.
</li>


</ul>



</div>




</div>





</div>







<div class="submit-area">


<button class="btn submit-button">

Simpan Kunjungan

</button>


</div>





</form>







<style>


.visit-layout{


display:grid;

grid-template-columns:1fr 1fr;

gap:25px;


}





.section-header{


font-size:17px;

font-weight:700;

color:#0f172a;

padding-bottom:15px;

margin-bottom:20px;

border-bottom:1px solid #e2e8f0;


}







.helper-text{


font-size:12px;

color:#64748b;

margin-top:8px;

line-height:1.5;


}





.information-card{


background:#f8fafc;

border:1px solid #e2e8f0;


}




.information-card h3{


margin-top:0;

font-size:16px;


}




.information-card ul{


padding-left:20px;

color:#475569;

line-height:1.8;


}





.submit-area{


display:flex;

justify-content:flex-end;

margin-top:25px;


}




.submit-button{


padding:14px 40px;

font-size:15px;

}




@media(max-width:1000px){


.visit-layout{


grid-template-columns:1fr;


}


}



</style>









<script>


document
.getElementById('unit')
.addEventListener('change',function(){



let unitCode=this.value;


let doctor=document.getElementById('doctor');



doctor.innerHTML=
'<option>Loading dokter...</option>';





fetch('/api/doctors?unit_code='+unitCode)


.then(response=>response.json())


.then(result=>{



doctor.innerHTML='';



if(!result.data || result.data.length===0){


doctor.innerHTML=
'<option>Tidak ada dokter tersedia</option>';


return;


}




result.data.forEach(function(item){



doctor.innerHTML +=

`
<option value="${item.doctor_code}">
${item.name}
</option>
`;



});



})



.catch(function(){


doctor.innerHTML=
'<option>Gagal mengambil data dokter</option>';


});



});



</script>



@endsection