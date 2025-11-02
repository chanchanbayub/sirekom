<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekomtek</title>
  <link href="/assets/images/logo.png" rel="icon">
  <link href="/assets/images/logo.png" rel="apple-touch-icon">
</head>
<style>
  * {
    margin: -10px auto;
    font-family: sans-serif;

  }

  header {
    box-sizing: border-box;
  }

  #kopSurat {
    /* margin-top: -20px; */
    width: 100%;
    box-sizing: border-box;
  }

  hr {
    margin-top: -2px;
    box-sizing: border-box;
  }

  .logo {
    margin-top: -20px;
    width: 70px;
  }

  #p1 {
    font-size: 18px;
    text-transform: uppercase;
    line-height: 15px;
    letter-spacing: 1px;
    font-style: normal;
    /* font-weight: bold; */
    /* border: 1px solid black; */
  }

  #dishub {
    font-size: 18px;
    text-transform: uppercase;
    line-height: 15px;
    letter-spacing: 1px;
    font-style: normal;
    font-weight: bold;
    /* border: 1px solid black; */
  }

  #p2 {
    font-size: 24px;
    text-transform: uppercase;
    line-height: 15px;
    letter-spacing: 1px;
    font-weight: 900;
  }

  #p3 {
    font-size: 16px;
    letter-spacing: 1px;
    line-height: 15px;
  }

  #p4 {
    font-size: 16px;
    line-height: 15px;
    letter-spacing: 0px;
    font-style: normal;
  }

  #p5 {
    font-size: 16px;
    text-transform: capitalize;
  }

  #td {
    text-align: right;
  }

  .noSurat {
    width: 100%;
    margin: -8px 0 auto;
    box-sizing: border-box;
  }

  #noSuratKend {
    width: 100%;


  }

  #noSuratKend,
  td {
    font-size: 14px;
    font-family: 'Arial';
  }

  .content-data {
    box-sizing: border-box;
    width: 100%;
    margin: 0 auto;
    font-size: 14px;
    /* border: 1px solid black; */
  }

  #content {
    font-family: 'Arial';
    /* padding-left: 100px; */
    line-height: 20px;
    margin: 0 auto;
    text-align: justify;
    font-size: 16px;
  }
</style>


<body>
  <!-- <div class="kop">
    <h2>PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</h2>
    <h3>DINAS PERHUBUNGAN</h3>
    <p>Gedung Graha Lestari, Jalan Kesehatan No.48, Kelurahan Petojo Selatan, Kecamatan Gambir, Kota Administrasi Jakarta Pusat</p>
    <p>Website: www.dishub.jakarta.go.id &nbsp;&nbsp; E-mail: dishub@jakarta.go.id</p>
    <p><strong>J A K A R T A</strong></p>
  </div> -->

  <table id="kopSurat">
    <tr>
      <td>
        <img class="logo" src="assets/images/logo.png" alt="logo" />
      </td>
      <td align="center">
        <p id="p1">pemerintah daerah khusus ibu kota jakarta</p>
        <p id="dishub">dinas perhubungan</p>
        <p>Gedung Graha Lestari, Jalan Kesehatan No.48, Kelurahan Petojo Selatan, Kecamatan Gambir, Kota Administrasi Jakarta Pusat</p>
        <p>Website: www.dishub.jakarta.go.id &nbsp;&nbsp; E-mail: dishub@jakarta.go.id</p>
        <p id="p4">J A K A R T A</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" align="right" id="p5">
        Kode Pos : 10160
      </td>
    </tr>
  </table>

  <hr id="devine">

  <div class="noSurat">
    <table id="noSuratKend">
      <tr>
        <td style="width:13%"> Nomor</td>
        <td style="width: 2%;">:</td>
        <td style="text-transform: uppercase;">${NOMOR}</td>
        <td style="width: 10%;"></td>
        <td colspan="14" align="center">
          &nbsp;&nbsp;&nbsp;&nbsp; ${TANGGAL}
        </td>
        <!-- <td colspan="">&nbsp;</td> -->
      </tr>
      <tr>
        <td style="width:1%"> Perihal</td>
        <td style="width: 2%;">:</td>
        <td>Penting</td>
        <td style="width: 10%;"></td>
        <td colspan="14"></td>
      </tr>
      <tr>
        <td style="width:13%"> Lampiran</td>
        <td style="width: 2%;">:</td>
        <td>1 (satu) berkas</td>
        <td style="width:10%;text-align:right">Yth.</td>
        <td colspan="14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada</td>
      </tr>
      <tr>
        <td style="width:13%;vertical-align:top;"> Hal</td>
        <td style="width:2%;vertical-align:top;">:</td>
        <td style="width:35%; text-align:justify">Penyempurnaan Data Kendaraan Pada Izin Penyelenggaraan Angkutan Orang Dengan Kendaraan Bermotor Umum Dalam Trayek Koperasi Komilet Jaya</td>
        <td style="width: 10%;"></td>
        <td colspan="14" style="padding-left: 21px;vertical-align:top; text-align:justify">Kepala Unit Pengelola Penanaman Modal dan Pelayanan Terpadu Satu Pintu Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</td>
      </tr>
      <tr>
        <td style="width:13%;vertical-align:top;"> </td>
        <td style="width:2%;vertical-align:top;"></td>
        <td style="width:35%;"></td>
        <td style="width:10%;"></td>
        <td colspan="14" style="padding-left: 33px;vertical-align:top;">di</td>
      </tr>
      <tr>
        <td style="width:13%;vertical-align:top;"> </td>
        <td style="width:2%;vertical-align:top;"></td>
        <td style="width:35%;"></td>
        <td style="width:10%;"></td>
        <td colspan="14" style="padding-left: 75px;vertical-align:top;">Jakarta </td>
      </tr>

    </table>
  </div>
  <br><br>
  <div class="content-data">
    <table id="content">
      <tr>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sehubungan dengan Surat Kepala Unit Pengelola Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) DKI Jakarta Nomor 1/TM.13.02/e/2025 tanggal 24 September 2025 Hal Permohonan Rekomendasi Teknis, dengan ini saya sampaikan hal-hal sebagai berikut: <br><br>
        </td>
      </tr>
      <tr>
        <td>1. Berdasarkan Keputusan Kepala Unit Pengelola Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Administrasi Jakarta Timur Koperasi Komilet Jaya Nomor 23/N.2a.7/31.75.07.1007.36.K-3.b/2/TM.13.02/e/2025 tanggal 02 September 2025 tentang Izin Penyelenggaraan Angkutan Orang Dengan Kendaraan Bermotor Umum Dalam Trayek sebanyak 689 (enam ratus delapan puluh sembilan) unit;</td>
      </tr>
      <tr>
        <td>2. Saat ini Koperasi Komilet Jaya mengajukan permohonan penyempurnaan data kendaraan pada Izin Penyelenggaraan Angkutan (IPA) sebanyak 45 (empat puluh lima) unit kepada Kepala Unit Pengelola Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Administrasi Jakarta Timur;</td>
      </tr>
      <tr>
        <td>3. Terhadap 45 (empat puluh lima) unit kendaraan yang dimaksud telah dilakukan penelitian administrasi dengan hasil memenuhi persyaratan berkas administrasi untuk dilakukan penyempurnaan data sebanyak 40 (empat puluh) unit dan yang tidak dilakukan penyempurnaan data dikarenakan sudah sesuai dengan Izin Penyelenggaraan Angkutan (IPA) sebanyak 5 (lima) unit, sehingga jumlah keseluruhan unit Koperasi Komilet Jaya adalah sebagai berikut:</td>
      </tr>
    </table>
  </div>


</body>

</html>