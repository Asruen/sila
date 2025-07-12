<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Temperatur Freezer</title>
  <style>
    @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 8pt;
            margin: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }
        td, th {
            border: 1px solid #000;
            text-align: center;
            padding: 4px;
            height: 10px;
            width: 10px;
        }
        .no-border td {
            border: none;
            padding: 2px 5px;
        }
        .no-border {
            margin-bottom: 5px;
        }
        .warna-ayam {
            background-color: yellow;
        }
        .warna-ikan {
            background-color: #00B0F0;
            color: black;
        }
        .warna-daging {
            background-color: red;
            color: black;
        }
        .header {
            background-color: #C4FF33;
            font-weight: bold;
        }
        .suhu-col td {
            height: 20px;
        }
        .label {
            text-align: left;
            border: none;
        }
  </style>
</head>
<body>
  <!-- Jadwal Pembersihan Freezer -->
  <table>
     <tr class="header"> 
        <td colspan="31">Jadwal Pembersihan Freezer</td>
     </tr> 
     <tr> <!-- Angka tanggal 1–30 --> 
        <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td> 
        <td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td> 
        <td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td> 
        <td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td> 
    </tr> 
    <tr> <!-- Blok warna A-I-D sesuai gambar --> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td class="warna-ayam">A</td> <td class="warna-ikan">I</td> 
        <td class="warna-daging">D</td> <td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td class="warna-ayam">A</td> <td class="warna-ikan">I</td> 
        <td class="warna-daging">D</td> <td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td class="warna-ayam">A</td> <td class="warna-ikan">I</td> <td class="warna-daging">D</td> <td></td> 
    </tr> 
    <tr> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr> 
    <tr> 
        <td class="warna-ayam">A</td><td colspan="4" class="warna-ayam" style="text-align:left;">:Ayam</td>
        <td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr> 
    <tr> 
        <td class="warna-ikan">I</td><td colspan="4" class="warna-ikan" style="text-align:left;">:Ikan</td>
        <td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr> 
    <tr> 
        <td class="warna-daging">D</td><td colspan="4" class="warna-daging" style="text-align:left;">:Daging</td>
        <td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr> 
    <tr> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr> 
    <tr> 
        <td colspan="31" style="background-color:yellow;height:5px;"></td> 
    </tr> 
    <tr class="header"> 
        <td colspan="31">Temperatur Freezer</td> 
    </tr> 
    <tr style="font-weight:bold;"> 
        <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td> 
        <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td> 
        <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td> 
    </tr>

    <tr class="suhu-col">
        
        <td>15</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>10</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>5</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>0</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-5</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-10</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-15</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-20</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-25</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-30</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-35</td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr class="suhu-col">
        <td>-40</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> </td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
    </tr>
    <tr>
        <td colspan="4" style="text-align:left;">Tanggal</td>
        <td colspan="27" style="text-align:left;">:</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:left;">Penanggung Jawab</td>
        <td colspan="27" style="text-align:left;">:</td>
    </tr>
  </table>

  

</body>
</html>
