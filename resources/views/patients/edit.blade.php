@extends('layouts.app')


@section('content')


<div class="card">


<h1 class="page-title">
Edit Pasien
</h1>




<form method="POST" action="/patients/{{$patient['id']}}">

@csrf

@method('PUT')



<label>
Nama Pasien
</label>


<input 
name="name"
value="{{$patient['name'] ?? ''}}">



<label>
Gender
</label>


<select name="gender">


<option value="M">
Laki-laki
</option>


<option value="F">
Perempuan
</option>


</select>




<label>
Golongan Darah
</label>


<input 
name="blood_type"
value="{{$patient['blood_type'] ?? ''}}">





<button>
Update
</button>



</form>



</div>


@endsection