<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOA - Generate Letter</title>

    <style>
        .letter{
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 30px;
            margin-right: 30px;
            font-size: 12px
        }
        table td.font-bold, table td span.font-bold {
            font-weight: bold;
        }
        table, th, td {
            /* border: 1px black solid; */
            border: none;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        } 
        table td.right {
            text-align: right;
        }
        table td.center {
            text-align: center;
        }
        hr.division{
            border: none;
            height: 1px;
            background-color: black
        } 
        table td.seven_pixel {
            padding-top: 7px;
            padding-bottom: 7px;
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
        .logo-footer {
            border: 1px solid black
        }
    </style>
</head>
<body>
    <table class="letter">
        <tr>
            <td style="width: 100px" rowspan="2">
                <img src="{{ public_path('assets/images/logo kerajaan malaysia.jpg') }}" height="80px">
            </td>
            <td style="padding-left: 20px; width: 300px" rowspan="2">
                <span class="font-bold">JABATAN PERTANIAN MALAYSIA</span><br>
                <span class="font-bold" style="font-style: italic">DEPARTMENT OF ARGICULTURE</span><br>
                Bahagian Kawalan Racun Perosak dan Baja<br>
                <span style="font-style: italic">Pesticides and Fertilizers Control Division</span><br>
                Wisma Tani, Tingkat 4-6<br>
                Jalan Sultan Salahuddin<br>
                50632 KUALA LUMPUR<br>
                MALAYSIA<br>
            </td>
            <td class="center" style="padding-left: 20px">
                <img src="{{ public_path('assets/images/jabatan_pertanian.png') }}" height="60px">
            </td>
        </tr>
        <tr>
            <td style="padding-left: 20px;">
                Tel: 603-20301400<br>
                Faks: 603-26917551<br>
                Laman Web: <a href="">www.doa.gov.my</a>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top: 10px; padding-bottom: 10px;">
                <hr class="division">
            </td>
        </tr>
    </table>

    <table class="letter">
        <tr>
            <td style="width: 300px; vertical-align: top">
            </td>
            <td></td>
            <td>Ruj: Kami: JP/KRP.207/12/171/{{ $rujukan_1 }}<br>
            <span style="font-style:italic">(Our Ref.) {{ $rujukan_2 }} <br><br>
            Tarikh: {{ $surat_tarikh }}<br>
            <span style="font-style:italic">(Date)</span>
        </td>
        </tr>
        <tr>
            <td style="width: 300px;padding-bottom: 30px">
                {{ $syarikat_nama }}<br>
                Lot 14, Jalan Bursa 23/4 <br>
                40300 Shah Alam, <br>
                Selangor. <br>
                (u/p: Miss Tan Ann Nye)
            </td>
            <td></td>
            <td>
            </td>
        </tr>
        <tr>
            <td  class="seven_pixel" colspan="3">Tuan/Puan,</td>
        </tr>
        <tr>
            <td class="seven_pixel" colspan="3"><span class="font-bold" style="text-decoration: underline">Sijil Pendaftaran Semula Racun Makhluk Perosak</span></td>
        </tr>
        <tr>
            <td class="seven_pixel" colspan="3">Bersama ini disertakan Sijil Pendaftaran Semula Racun Makhluk Perosak seperti berikut;</td>
        </tr>
    </table>

    <table class="letter">
        <tr>
            <td style="width: 150px" class="seven_pixel left alignLabel"><span>Nama Dagangan</span></td>
            <td class="font-bold seven_pixel" style="padding-left: 25px">{{ $nama_dagangan }}</td>
        </tr>
        <tr>
            <td style="width: 150px" class="seven_pixel left alignLabel"><span>No. Pendaftaran</span> </td>
            <td class="font-bold seven_pixel" style="padding-left: 25px">{{ $no_pendaftaran }} </td>
        </tr>
        <tr>
            <td style="width: 150px" class="seven_pixel left alignLabel"><span>No. Resit Bayaran</span></td>
            <td class="font-bold seven_pixel" style="padding-left: 25px">{{ $resit_bayaran }}</td>
        </tr>
        <tr>
            <td style="padding-top: 7px; padding-bottom: 30px" colspan="2">Sekian, terima kasih.</td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px" class="font-bold" colspan="2">{{ $slogan_1 }}</td>
        </tr>
        <tr>
            <td class="font-bold seven_pixel" colspan="2">{{ $slogan_2 }}</td>
        </tr>
        <tr>
            <td class="seven_pixel" style="padding-bottom: 50px" colspan="2">Saya yang menjalankan amanah,</td>
        </tr>
        <tr>
            <td class="font-bold" colspan="2">(ROHAYA BINTI MAT NOR)</td>
        </tr>
        <tr>
            <td style="padding-bottom: 30px" colspan="2">
            Ketua Unit Dokumentasi dan Penyelarasan<br>
            b/p Setiausaha<br>
            Lembaga Racun Makhluk Perosak
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top: 10px; padding-bottom: 10px;">
                <hr class="division">
            </td>
        </tr>
        <tr>
            <td class="center" colspan="3">
                <img class="logo-footer" src="{{ public_path('assets/images/logo_sirim.jpg') }}" height="50px">
            </td>
        </tr>
        <tr>
            <td class="center" style="font-size: 8px" colspan="3">CERTIFIED TO ISO 9001:2008<br>CERT NO : AR5677</td>
        </tr>
    </table>
    
</body>
</html>
