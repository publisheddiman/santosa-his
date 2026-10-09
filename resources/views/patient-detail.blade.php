@extends('layouts.app')


@section('content')


<div class="card">


<h1 class="page-title">
Detail Pasien
</h1>




<table>


<tr>

<th>
No Rekam Medis
</th>

<td>
{{$patient['medical_record_no'] ?? '-'}}
</td>

</tr>



<tr>

<th>
Nama
</th>

<td>
{{$patient['name'] ?? '-'}}
</td>

</tr>



<tr>

<th>
Jenis Kelamin
</th>

<td>
{{$patient['gender'] ?? '-'}}
</td>

</tr>



<tr>

<th>
Tanggal Lahir
</th>

<td>
{{$patient['birth_date'] ?? '-'}}
</td>

</tr>



<tr>

<th>
Golongan Darah
</th>

<td>
{{$patient['blood_type'] ?? '-'}}
</td>

</tr>


</table>



<br>


<a class="btn" href="/patients">

Kembali

</a>


</div>


@endsection