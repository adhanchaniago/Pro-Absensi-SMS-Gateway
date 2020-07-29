<?php

require 'assets/SMSGateway/vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

$dAbsensi = $db->getOneAbsensi($_GET['idAbs']);
$dMhs = $db->getOneMahasiswa($_GET['id']);

$tgl = $dAbsensi->absensi_tgl;
$mhs = $dMhs->mahasiswa_nama;
$pesan = 'Yth Bapak/Ibu, Kami dari AMIK Dapernas Menginformasikan bahwa Mahasiswa bernama ' . $mhs . ' Tidak Hadir pada ' . tgl_indo($tgl);

$array_fields['phone_number'] = $dMhs->mahasiswa_nohp_ortu; // set nohp
$array_fields['message'] = $pesan; // set pesan
$array_fields['device_id'] = 118848; // set device id. cek di dashboard web smsgateway.me


// token didapat dari smsgateway.me
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU5NDI2MzkwOCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjgxNTI2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.zWsGH-Mot2sDi3MZEZhHvwnF_rWj9ZB4dupkh5mWk4Q";

$curl = curl_init();

curl_setopt_array($curl, array(
     CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
     CURLOPT_HTTPHEADER => array(
          "authorization: $token",
          "cache-control: no-cache"
     ),
));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
     echo "cURL Error #:" . $err;
} else {
     echo $response;
}

echo "<script>
alert('Mohon tunggu SMS akan di Kirim');
location='index.php?page=pages/abensi/index';
</script>";
