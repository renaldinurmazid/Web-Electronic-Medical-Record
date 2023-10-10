    <!DOCTYPE html>
    <head>
        <title>Surat Izin Siswa</title>
        <meta charset="utf-8">
        <style>
            #judul{
                text-align:center;
            }

            #halaman{
                width: auto; 
                height: auto; 
                position: absolute; 
                padding-top: 30px; 
                padding-left: 30px; 
                padding-right: 30px; 
                padding-bottom: 80px;
            }

        </style>
    </head>

    <body>
        <div id=halaman>
            <h3 id="judul">UNIT KESEHATAN SEKOLAH</h3>
            <img src="{{ asset('emr.png')}}" alt="">
            <h3 id=judul>SMK NEGERI 1 SUBANG</h3>
            <hr>
            <h5 id=judul>SURAT KETERANGAN SAKIT</h5>
            <p>Dengan ini menerangkan bahwa siswa yang bersangkutan tidak dapat mengikuti mata perlajaran yang sedang berlangsung karena sakit.</p>

            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $s->nama_lengkap}}</td>
                </tr>
                <br>
                <tr>
                    <td style="width: 30%;">Kelas</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $s->class->namakelas}}</td>
                </tr>
                <br>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Gejala</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $s->sakit}}</td>
                </tr>
            
            </table>

            <p>Diberikan istirahat sakit max . 2 jam pelajaran*</p>

            <p style="padding-left:50px;">Demikian surat keterangan ini diberikan untuk diketahui & dipergunakan seperlunya.</p>
            <br><br><br><br><br>
            <div class="footer">
                <span>Petugas Piket UKS</span>
                <span style="float: right;">Guru yang bersangkutan</span>
            </div>
            <br><br><br><br>
            <div class="footer">
                <span>...............................</span>
                <span style="float: right;">.......................................</span>
            </div>
            <br><br><br><br>
        </div>
    </body>

    </html>