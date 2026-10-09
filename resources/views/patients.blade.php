@extends('layouts.app')


@section('content')


<div class="page-header">


<div>

<h1 class="page-title">
Patient Management
</h1>

<p class="page-description">
Daftar seluruh data pasien Hospital Information System
</p>

</div>


<a href="/patients/create" class="btn">
Tambah Pasien
</a>


</div>





<div class="card">



<form method="GET">


<div style="
display:grid;
grid-template-columns:2fr 1fr 1fr auto;
gap:15px;
">



<input 
type="text"
name="search"
placeholder="Cari nama pasien / nomor rekam medis"
value="{{request('search')}}"
>




<select name="gender">


<option value="">
Semua Gender
</option>


<option value="M"
{{request('gender')=='M'?'selected':''}}>
Laki-laki
</option>


<option value="F"
{{request('gender')=='F'?'selected':''}}>
Perempuan
</option>


</select>





<select name="blood_type">


<option value="">
Semua Golongan Darah
</option>


<option value="A">
A
</option>


<option value="B">
B
</option>


<option value="AB">
AB
</option>


<option value="O">
O
</option>


</select>




<button class="btn">
Filter
</button>



</div>


</form>







@if(session('success'))

<div class="alert alert-success"
style="margin-top:20px">

{{session('success')}}

</div>

@endif




@if(session('error'))

<div class="alert alert-error"
style="margin-top:20px">

{{session('error')}}

</div>

@endif






<div class="table-wrapper">


<table>


<thead>

<tr>


<th>
Medical Record No
</th>


<th>
Nama Pasien
</th>


<th>
Gender
</th>


<th>
Tanggal Lahir
</th>


<th>
Blood Type
</th>


<th>
Action
</th>


</tr>


</thead>



<tbody>



@if(count($patients)==0)


<tr>

<td colspan="6" style="text-align:center">

Tidak ada data pasien

</td>

</tr>



@else



@foreach($patients as $patient)



<tr>



<td>

<strong>
{{$patient['medical_record_no'] ?? '-'}}
</strong>


</td>




<td>

{{$patient['name'] ?? '-'}}

</td>




<td>


@if(($patient['gender'] ?? '')=='M')


<span class="badge badge-info">
Male
</span>


@elseif(($patient['gender'] ?? '')=='F')


<span class="badge badge-success">
Female
</span>


@else

-

@endif


</td>





<td>

{{$patient['birth_date'] ?? '-'}}

</td>





<td>

{{$patient['blood_type'] ?? '-'}}

</td>





<td>


<a class="btn"

href="/patients/{{$patient['medical_record_no']}}">

Detail

</a>


</td>





</tr>




@endforeach



@endif



</tbody>



</table>


</div>







</div>



@endsection