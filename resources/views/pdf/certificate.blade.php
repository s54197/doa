<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>DOA - Generate Certificate</title>

        <style>
            .cert{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px
            }
            .no_siri{
                float: right;
            }
            .no_siri .no {
                font-family: Arial, Helvetica, sans-serif;
            }
            table, th, td {
                /* border: 1px black solid; */
                border: none;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table td.two_pixel {
                padding: 2px;
            } 
            table td.five_pixel {
                padding: 7px;
            } 
            table td.right {
                text-align: right;
            }
            table td.center {
                text-align: center;
            }
            table td.left {
                text-align: left;
            }
            table td.font-bold, table td span.font-bold {
                font-weight: bold;
            }
            .alignLabel span {
                display: inline-block;
                width: 100%;
                position: relative;
                padding-right: 10px; /* Ensures colon does not overlay the text */
            }
            .alignLabel span::after {
                content: ":";
                position: absolute;
                right: 5px;
            }
            .page-break {
                page-break-after: always;
            }
            .syarat li {
                margin: 30px;
            }
            .pembekal li {
                margin: 10px;
            }
            /* .syarat li::before {
                content: "";
                width: 20px;
                display: inline-block;
            } */
        </style>

    </head>

    <body>

        <table class="cert">
            <tr>
                <td class="right font-bold" colspan="3">NO SIRI: <span style="font-family: font-family: 'Courier New', Courier, monospace">{{ $no_siri }}</span> </th>
            </tr>
            <tr>
                <td class="center" colspan="3"><img src="{{ public_path('assets/images/logo kerajaan malaysia.jpg') }}" height="100px"></td>
            </tr>
            <tr>
                <td class="center font-bold" style="font-size:12px; padding-bottom: 7px" colspan="3">KERAJAAN MALAYSIA</td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" colspan="3">AKTA RACUN MAKHLUK PEROSAK 1974</td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" colspan="3">KAEDAH-KEADAH RACUN MAKHLUK PEROSAK (PENDAFTARAN) 2005</td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" colspan="3">Borang {{$jenis_borang}}</td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" style="font-style:italic" colspan="3">(Kaedah 5)</td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" style="padding-bottom: 20px" colspan="3">PERAKUAN PENDAFTARAN {{ $jenis_pendaftaran }} RACUN MAKHLUK PEROSAK</td>
            </tr>
            <tr>
                <td class="center five_pixel" style="font-size:12px; padding-bottom: 3px" colspan="3">Adalah dengan ini diperakui bahawa racun makhluk perosak yang butir-butirnya dinyatakan di bawah ini telah didaftarkan <br> di bawah subseksyen 9(1) Akta Racun Makhluk Perosak 1974 [<span style="font-style: italic">Akta 149</span>] oleh Lembaga Racun Makhluk Perosak <br> selama tempoh lima tahun, tertakluk kepada syarat-syarat yang dinyatakan di bawah ini, dan telah diberikan</td>
            </tr>
            <tr>
                <td class="center five_pixel" style="padding-bottom: 15px" colspan="3">nombor pendaftaran <span class="font-bold">{{ $no_pendaftaran }}</span></td>
            </tr>
            <tr>
                <td class="center font-bold five_pixel" style="padding-bottom: 15px" colspan="3">BUTIR-BUTIR RACUN MAKHLUK PEROSAK</td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Pendaftar</span> </td>
                <td class="font-bold five_pixel" colspan="2">{{ $pendaftar }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Nama Dagangan</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $nama_dagangan }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Perawis Aktif</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $perawis_aktif }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Kepekatan</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $kepekatan }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Perumusan</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $perumusan }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Kelas</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $kelas }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Penggunaan</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $penggunaan }} </td>
            </tr>
            <tr>
                <td class="font-bold five_pixel left alignLabel" style="padding-left: 100px" colspan="1"><span>Tempoh Sah</span></td>
                <td class="font-bold five_pixel" colspan="2">{{ $tempoh_sah }} </td>
            </tr>
        </table>

        <table class="cert" style="margin-top: 80px">
            <tr>
                <td style="width: 190px; padding-top: 10px"><img src="{{ public_path('assets/images/cop_cert.jpg') }}" height="180px"></td>
                <td style="vertical-align: top"><span style="font-weight: bold">{{$pengerusi}}</span><br><br>Pengerusi<br>Lembaga Racun Makhluk Perosak<br><br> Tarikh: {{ $tarikh_sign }}</td>
                <td style="vertical-align: top"><span style="font-weight: bold">{{$setiausaha}}</span><br><br>Setiausaha<br>Lembaga Racun Makhluk Perosak</td>
            </tr>
            <tr><td class="right" style="font-size:12px; font-style: italic" colspan="3">*Sila rujuk syarat-syarat pendaftaran di sebelah</td></tr>
        </table>

        <div class="page-break"></div>

        <table class="cert" style="margin-top: 70px">
            <tr style="padding-bottom: 30px">
                <td class="center font-bold">
                    SYARAT-SYARAT
                </td>
            </tr>
            <tr>
                <td class="font-bold">
                    <ol class="syarat">
                        <li>Mestilah mematuhi syarat-syarat dan pekeliling yang dikeluarkan dari masa ke semasa oleh Lembaga Racun Makhluk Perosak.</li>
                        <li>Racun Makhluk Perosak ini tidak boleh diiklankan di mana-mana media tanpa kelulusan daripada Lembaga Racun Makhluk Perosak.</li>
                        <li>Racun Makhluk Perosak ini mestilah menggunakan label terkini yang diluluskan oleh Lembaga Racun Makhluk Perosak.</li>
                        <li>Racun Makhluk Perosak ini mestilah dibekalkan oleh pembekal-pembekal berikut:
                            <ol type="a" class="pembekal">
                                @foreach(explode(',',$pembekal) as $data_pembekal)
                                    <li>{{ $data_pembekal }}</li>
                                @endforeach
                            </ol>
                        </li>
                    </ol>
                </td>
            </tr>
        </table>
            
        </body>
    </html>
