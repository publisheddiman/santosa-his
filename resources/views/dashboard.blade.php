@extends('layouts.app')


@section('content')


<div class="page-header">

<div>

<h1 class="page-title">
Dashboard
</h1>

<p class="page-description">
Ringkasan aktivitas Hospital Information System
</p>

</div>


</div>





@if(isset($error) && $error)


<div class="alert alert-error">

{{ $error }}

</div>


@endif





<div class="summary-grid">



<div class="summary-card">

<div class="summary-title">
Total Pasien
</div>


<div class="summary-value">

{{ $summary['total_patients'] ?? 0 }}

</div>


<p>
Registered patient records
</p>


</div>






<div class="summary-card">

<div class="summary-title">
Total Kunjungan
</div>


<div class="summary-value">

{{ $summary['total_visits'] ?? 0 }}

</div>


<p>
Hospital visit records
</p>


</div>







<div class="summary-card">

<div class="summary-title">
Kunjungan Hari Ini
</div>


<div class="summary-value">

{{ $summary['today_visits'] ?? 0 }}

</div>


<p>
Today's activity
</p>


</div>







<div class="summary-card">

<div class="summary-title">
Completed Visit
</div>


<div class="summary-value">

{{ $summary['completed_visits'] ?? 0 }}

</div>


<p>
Completed services
</p>


</div>




</div>








<div class="dashboard-layout">





<div class="card">


<div class="card-header">


<h3>
Visit Status Overview
</h3>


</div>





<div class="status-row">


<span>
REGISTERED
</span>


<strong>

{{ $summary['registered'] ?? 0 }}

</strong>


</div>





<div class="status-row">


<span>
IN_PROGRESS
</span>


<strong>

{{ $summary['in_progress'] ?? 0 }}

</strong>


</div>





<div class="status-row">


<span>
COMPLETED
</span>


<strong>

{{ $summary['completed'] ?? 0 }}

</strong>


</div>





<div class="status-row">


<span>
CANCELLED
</span>


<strong>

{{ $summary['cancelled'] ?? 0 }}

</strong>


</div>



</div>









<div class="card">


<h3>
Quick Access
</h3>



<div class="quick-list">


<a href="/patients/create">

Tambah Pasien

</a>


<a href="/patients">

Daftar Pasien

</a>



<a href="/visits/create">

Tambah Kunjungan

</a>



<a href="/visits">

Monitoring Kunjungan

</a>



</div>



</div>






</div>








<style>


.summary-grid{


display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

margin-bottom:25px;


}





.summary-card{


background:white;

padding:25px;

border-radius:18px;

box-shadow:
0 5px 20px rgba(15,23,42,.06);


}





.summary-title{


font-size:14px;

color:#64748b;


}





.summary-value{


font-size:36px;

font-weight:700;

color:#0f172a;

margin:15px 0;


}





.summary-card p{


margin:0;

font-size:13px;

color:#94a3b8;


}





.dashboard-layout{


display:grid;

grid-template-columns:2fr 1fr;

gap:25px;


}







.card-header{


border-bottom:1px solid #e2e8f0;

padding-bottom:15px;

margin-bottom:15px;


}





.status-row{


display:flex;

justify-content:space-between;

padding:16px 0;

border-bottom:1px solid #e2e8f0;


}





.status-row:last-child{


border-bottom:none;


}





.status-row span{


color:#475569;

font-weight:500;


}





.status-row strong{


color:#2563eb;


}





.quick-list{


display:flex;

flex-direction:column;

gap:12px;


}




.quick-list a{


text-decoration:none;

background:#f8fafc;

padding:15px;

border-radius:10px;

color:#1e293b;

font-weight:600;


}



.quick-list a:hover{


background:#eff6ff;

color:#2563eb;


}






@media(max-width:1000px){


.summary-grid{

grid-template-columns:repeat(2,1fr);

}


.dashboard-layout{

grid-template-columns:1fr;

}


}



</style>


@endsection