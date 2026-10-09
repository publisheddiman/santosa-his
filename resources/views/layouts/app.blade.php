<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Santosa Hospital Information System
</title>


<style>


*{
    box-sizing:border-box;
}



body{

    margin:0;

    font-family:
    "Inter",
    "Segoe UI",
    Arial,
    sans-serif;

    background:#f4f7fb;

    color:#1e293b;

}





/* SIDEBAR */

.sidebar{


    position:fixed;

    left:0;

    top:0;

    bottom:0;

    width:260px;

    background:#0b2545;

    color:white;

    padding:25px 20px;


}




.brand{


    font-size:22px;

    font-weight:700;

    padding-bottom:25px;

    border-bottom:1px solid rgba(255,255,255,.15);


}



.brand span{


    display:block;

    font-size:12px;

    font-weight:400;

    color:#cbd5e1;

    margin-top:8px;


}






.menu{


    margin-top:30px;


}




.menu-title{


    font-size:11px;

    text-transform:uppercase;

    color:#94a3b8;

    margin:20px 12px 10px;


}




.menu a{


    display:flex;

    align-items:center;

    gap:12px;

    padding:13px 15px;

    color:#e2e8f0;

    text-decoration:none;

    border-radius:10px;

    margin-bottom:5px;

    font-size:14px;


}





.menu a:hover{


    background:#163a63;

    color:white;


}





.menu a.active{


    background:#2563eb;

    color:white;


}








/* MAIN */

.main{


    margin-left:260px;


}






.topbar{


    height:75px;

    background:white;

    border-bottom:1px solid #e2e8f0;

    display:flex;

    align-items:center;

    justify-content:space-between;

    padding:0 35px;


}




.search-box{


    width:350px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    padding:12px 18px;

    border-radius:12px;

    color:#64748b;


}




.profile{


    display:flex;

    align-items:center;

    gap:12px;


}




.avatar{


    width:40px;

    height:40px;

    border-radius:50%;

    background:#dbeafe;

    color:#1d4ed8;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;


}





.content{


    padding:35px;


}







/* GLOBAL CARD */


.card{


    background:white;

    border-radius:18px;

    padding:25px;

    box-shadow:

    0 5px 20px rgba(15,23,42,.06);


}






.page-header{


    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:25px;


}




.page-title{


    margin:0;

    font-size:28px;

    color:#0f172a;


}




.page-description{


    margin-top:8px;

    color:#64748b;


}








/* BUTTON */


.btn{


    background:#2563eb;

    color:white;

    padding:11px 20px;

    border-radius:10px;

    text-decoration:none;

    border:none;

    cursor:pointer;

    font-size:14px;


}




.btn:hover{


    background:#1d4ed8;


}





.btn-danger{


    background:#dc2626;


}








/* TABLE */


.table-wrapper{


    overflow:auto;


}



table{


    width:100%;

    border-collapse:collapse;

    margin-top:20px;


}



thead{


    background:#f8fafc;


}



th{


    text-align:left;

    padding:14px;

    color:#475569;

    font-size:13px;


}



td{


    padding:14px;

    border-top:1px solid #e2e8f0;

    font-size:14px;


}



tr:hover{


    background:#f8fafc;


}






/* FORM */


.form-group{


    margin-bottom:18px;


}




label{


    display:block;

    font-weight:600;

    margin-bottom:7px;

    color:#334155;


}



input,
select,
textarea{


    width:100%;

    padding:12px 14px;

    border:1px solid #cbd5e1;

    border-radius:10px;

    font-size:14px;


}




input:focus,
select:focus,
textarea:focus{


    outline:none;

    border-color:#2563eb;


}







/* BADGE STATUS */


.badge{


    padding:6px 12px;

    border-radius:20px;

    font-size:12px;

    font-weight:600;


}



.badge-success{


    background:#dcfce7;

    color:#166534;


}



.badge-warning{


    background:#fef3c7;

    color:#92400e;


}



.badge-info{


    background:#dbeafe;

    color:#1d4ed8;


}



.badge-danger{


    background:#fee2e2;

    color:#991b1b;


}






.alert{


    padding:15px;

    border-radius:12px;

    margin-bottom:20px;


}



.alert-success{


    background:#dcfce7;

    color:#166534;


}



.alert-error{


    background:#fee2e2;

    color:#991b1b;


}




</style>


</head>




<body>




<div class="sidebar">



<div class="brand">

Santosa HIS

<span>
Hospital Information System
</span>


</div>




<div class="menu">



<div class="menu-title">
Main
</div>



<a href="/">
Dashboard
</a>




<div class="menu-title">
Patient Management
</div>



<a href="/patients">
Daftar Pasien
</a>



<a href="/patients/create">
Tambah Pasien
</a>





<div class="menu-title">
Visit Management
</div>



<a href="/visits">
Daftar Kunjungan
</a>




<a href="/visits/create">
Tambah Kunjungan
</a>






<div class="menu-title">
Master Data
</div>



<a href="#">
Unit
</a>


<a href="#">
Dokter
</a>


<a href="#">
Diagnosis
</a>



</div>


</div>







<div class="main">



<div class="topbar">



<div class="search-box">

Search patient, visit, medical record...

</div>





<div class="profile">


<div class="avatar">

DF

</div>


<div>

<strong>
Diman Fathurohman
</strong>


</div>



</div>


</div>





<div class="content">


@yield('content')


</div>



</div>





</body>


</html>