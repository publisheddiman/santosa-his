@extends('layouts.app')


@section('content')


<div class="page-header">


<div>

<h1 class="page-title">
Tambah Pasien
</h1>

<p class="page-description">
Registrasi data pasien baru ke Hospital Information System
</p>

</div>


<a href="/patients" class="btn">
Kembali
</a>


</div>






<div class="card">


@if(session('error'))

<div class="alert alert-error">

{{session('error')}}

</div>

@endif





<form method="POST" action="/patients">


@csrf





<div class="form-group">


<label>
Nama Pasien
</label>


<input 
type="text"
name="name"
placeholder="Masukkan nama pasien"
value="{{old('name')}}"
required
>


</div>







<div class="form-group">


<label>
Jenis Kelamin
</label>


<select name="gender" required>


<option value="">
Pilih Gender
</option>


<option value="M">
Laki-laki
</option>


<option value="F">
Perempuan
</option>


</select>


</div>







<div class="form-group">


<label>
Tanggal Lahir
</label>


<input

type="date"

name="birth_date"

value="{{old('birth_date')}}"

required

>


</div>







<div class="form-group">


<label>
Golongan Darah
</label>



<select name="blood_type">


<option value="">
Pilih Golongan Darah
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


</div>







<div style="margin-top:25px;">


<button class="btn">

Simpan Pasien

</button>


</div>





</form>




</div>




@endsection