/*
TES PROGRAMMER
SANTOSA HOSPITAL INFORMATION SYSTEM

BAGIAN B - PENGETAHUAN SQL

Database : test_programmer
*/


--------------------------------------------------
-- SOAL 1
-- Menampilkan:
-- No Rekam Medis
-- Nama Pasien
-- Jenis Kelamin
-- Tanggal Lahir
-- Golongan Darah
-- Urut nama pasien A-Z
--------------------------------------------------

SELECT
    medical_record_no AS [No. Rekam Medis],
    name AS [Nama Pasien],
    gender AS [Jenis Kelamin],
    date_of_birth AS [Tanggal Lahir],
    blood_type AS [Golongan Darah]

FROM patients

ORDER BY name ASC;



--------------------------------------------------
-- SOAL 2
-- Menampilkan riwayat kunjungan:
-- Visit No
-- Tanggal Visit
-- No Rekam Medis
-- Nama Pasien
-- Nama Dokter
-- Nama Unit
-- Status
-- Keluhan
-- Urut kunjungan terbaru
--------------------------------------------------

SELECT

    v.visit_no AS [Visit No],

    v.visit_date AS [Tanggal Visit],

    p.medical_record_no AS [No. Rekam Medis],

    p.name AS [Nama Pasien],

    d.name AS [Nama Dokter],

    u.name AS [Nama Unit],

    v.status AS [Status],

    v.complaint AS [Keluhan]


FROM visits v


INNER JOIN patients p
ON v.patient_id = p.id


INNER JOIN doctors d
ON v.doctor_id = d.id


INNER JOIN units u
ON v.unit_id = u.id


ORDER BY v.visit_date DESC;



--------------------------------------------------
-- SOAL 3
-- Menampilkan jumlah visit per unit
-- Semua unit tetap tampil
--------------------------------------------------

SELECT

    u.code AS [Kode Unit],

    u.name AS [Nama Unit],

    COUNT(v.id) AS [Total Visit]


FROM units u


LEFT JOIN visits v
ON u.id = v.unit_id


GROUP BY

    u.code,
    u.name


ORDER BY COUNT(v.id) DESC;



--------------------------------------------------
-- SOAL 4
-- Menampilkan 5 diagnosis paling sering digunakan
--------------------------------------------------

SELECT TOP 5

    d.code AS [Kode Diagnosis],

    d.name AS [Nama Diagnosis],

    COUNT(vd.id) AS [Total Penggunaan]


FROM visit_diagnoses vd


INNER JOIN diagnoses d
ON vd.diagnosis_id = d.id


GROUP BY

    d.code,
    d.name


ORDER BY COUNT(vd.id) DESC;



--------------------------------------------------
-- SOAL 5
-- Menampilkan 10 pasien dengan jumlah
-- kunjungan COMPLETED terbanyak
--------------------------------------------------

SELECT TOP 10


    p.medical_record_no AS [No. Rekam Medis],

    p.name AS [Nama Pasien],

    COUNT(v.id) AS [Total Visit]


FROM patients p


INNER JOIN visits v
ON p.id = v.patient_id


WHERE v.status = 'COMPLETED'


GROUP BY

    p.medical_record_no,

    p.name


ORDER BY COUNT(v.id) DESC;



--------------------------------------------------
-- SOAL 6 BONUS
-- Dokter yang menangani kunjungan COMPLETED
-- pada unit IGD
--------------------------------------------------

SELECT


    d.doctor_code AS [Kode Dokter],

    d.name AS [Nama Dokter],

    COUNT(v.id) AS [Total Visit COMPLETED]


FROM doctors d


INNER JOIN visits v
ON d.id = v.doctor_id


INNER JOIN units u
ON v.unit_id = u.id


WHERE

    v.status = 'COMPLETED'

    AND u.code = 'IGD'


GROUP BY

    d.doctor_code,

    d.name


ORDER BY COUNT(v.id) DESC;



--------------------------------------------------
-- SOAL 7 BONUS
-- Pasien dengan lebih dari satu diagnosis
-- berbeda pada visit COMPLETED yang sama
--------------------------------------------------

SELECT


    v.visit_no AS [Visit No],


    p.medical_record_no AS [No. Rekam Medis],


    p.name AS [Nama Pasien],


    COUNT(DISTINCT vd.diagnosis_id)
    AS [Jumlah Diagnosis Berbeda]


FROM visits v


INNER JOIN patients p
ON v.patient_id = p.id


INNER JOIN visit_diagnoses vd
ON v.id = vd.visit_id


WHERE

    v.status = 'COMPLETED'


GROUP BY


    v.visit_no,

    p.medical_record_no,

    p.name


HAVING COUNT(DISTINCT vd.diagnosis_id) > 1;