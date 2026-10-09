@extends('layouts.app')


@section('content')



<div class="page-header">


<div>

<h1 class="page-title">
Visit Management
</h1>


<p class="page-description">
Monitoring seluruh aktivitas kunjungan pasien
</p>


</div>



<a href="/visits/create" class="btn">
Tambah Kunjungan
</a>


</div>







<div class="visit-summary">



<div class="summary-card">

<span>Total Visit</span>

<strong>
{{count($visits)}}
</strong>

</div>




<div class="summary-card">

<span>Registered</span>

<strong class="blue-text">
-
</strong>

</div>





<div class="summary-card">

<span>In Progress</span>

<strong class="orange-text">
-
</strong>

</div>





<div class="summary-card">

<span>Completed</span>

<strong class="green-text">
-
</strong>

</div>




</div>









<div class="card">



<h3>
Filter Kunjungan
</h3>




<form method="GET">



<div class="filter-grid">



<div>

<label>
Status
</label>


<select name="status">


<option value="">
Semua Status
</option>


<option value="REGISTERED">
REGISTERED
</option>


<option value="IN_PROGRESS">
IN_PROGRESS
</option>


<option value="COMPLETED">
COMPLETED
</option>


<option value="CANCELLED">
CANCELLED
</option>



</select>


</div>







<div>


<label>
Unit
</label>


<input

name="unit"

value="{{request('unit')}}"

placeholder="Kode unit"

>


</div>







<div>


<label>
Tanggal Awal
</label>


<input

type="date"

name="date_from"

value="{{request('date_from')}}"


>


</div>







<div>


<label>
Tanggal Akhir
</label>


<input

type="date"

name="date_to"

value="{{request('date_to')}}"


>


</div>







<div style="display:flex;align-items:end;">


<button class="btn">

Filter

</button>


</div>



</div>




</form>




</div>









<div class="card" style="margin-top:25px;">



<div class="table-wrapper">


<table>



<thead>


<tr>


<th>
Visit No
</th>


<th>
Medical Record
</th>


<th>
Tanggal Visit
</th>


<th>
Unit
</th>


<th>
Dokter
</th>


<th>
Status
</th>


<th>
Action
</th>


</tr>


</thead>





<tbody>



@if(count($visits)==0)


<tr>


<td colspan="7" style="text-align:center">

Tidak ada data kunjungan

</td>


</tr>



@else



@foreach($visits as $visit)



<tr>



<td>

<strong>

{{$visit['visit_no'] ?? '-'}}

</strong>


</td>





<td>

{{$visit['patient_medical_record_no'] ?? '-'}}

</td>





<td>

{{$visit['visit_date'] ?? '-'}}

</td>





<td>

{{$visit['unit']['name'] ?? $visit['unit_code'] ?? '-'}}

</td>





<td>

{{$visit['doctor']['name'] ?? '-'}}

</td>





<td>



@if(($visit['status'] ?? '')=="COMPLETED")


<span class="badge badge-success">

COMPLETED

</span>



@elseif(($visit['status'] ?? '')=="IN_PROGRESS")


<span class="badge badge-warning">

IN_PROGRESS

</span>




@elseif(($visit['status'] ?? '')=="REGISTERED")


<span class="badge badge-info">

REGISTERED

</span>




@else


<span class="badge badge-danger">

{{$visit['status'] ?? '-'}}

</span>



@endif



</td>







<td>


<form method="POST"

action="/visits/{{$visit['visit_no']}}/status">


@csrf

@method('PATCH')



<select name="status"
style="width:140px;">


<option value="IN_PROGRESS">
IN_PROGRESS
</option>


<option value="COMPLETED">
COMPLETED
</option>


<option value="CANCELLED">
CANCELLED
</option>


</select>




<button class="btn"
style="margin-top:8px;">

Update

</button>



</form>



</td>





</tr>





@endforeach



@endif



</tbody>


</table>



</div>


</div>








<style>


.visit-summary{


display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

margin-bottom:25px;


}





.summary-card{


background:white;

padding:22px;

border-radius:16px;

box-shadow:
0 5px 20px rgba(15,23,42,.05);


}




.summary-card span{


display:block;

color:#64748b;

font-size:14px;


}



.summary-card strong{


font-size:30px;

margin-top:10px;

display:block;


}





.blue-text{

color:#2563eb;

}


.orange-text{

color:#f97316;

}


.green-text{

color:#16a34a;

}






.filter-grid{


display:grid;

grid-template-columns:repeat(5,1fr);

gap:15px;


}





@media(max-width:1200px){


.filter-grid{

grid-template-columns:repeat(2,1fr);

}


.visit-summary{

grid-template-columns:repeat(2,1fr);

}


}



</style>



@endsection