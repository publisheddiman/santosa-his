@extends('layouts.app')


@section('content')


<div class="card">


<h1 class="page-title">
Riwayat Kunjungan
</h1>




@if(count($visits)==0)

<p>
Belum ada riwayat kunjungan
</p>


@else



<table>


<tr>

<th>
Visit No
</th>


<th>
Pasien
</th>


<th>
Tanggal
</th>


<th>
Status
</th>


</tr>




@foreach($visits as $visit)



<tr>


<td>

{{$visit['visit_no'] ?? '-'}}

</td>


<td>

{{$visit['patient_medical_record_no'] ?? '-'}}

</td>


<td>

{{$visit['visit_date'] ?? '-'}}

</td>


<td>

{{$visit['status'] ?? '-'}}

</td>


</tr>



@endforeach



</table>



@endif



</div>


@endsection