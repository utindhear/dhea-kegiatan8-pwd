<!-- <?php
    include "koneksi.php";
    ?>
    <h3>Form Pencarian Dengan PHP MAHASISWA</h3>
        <form action="" method="get">
            <label>Cari :</label>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form>
    <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
    ?>
        <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
    <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql="select * from mahasiswa where nama like'%".$cari."%'";
            $tampil = mysqli_query($con,$sql);
        }else{
            $sql="select * from mahasiswa";
            $tampil = mysqli_query($con,$sql);
        }
        $no = 1;
        while($r = mysqli_fetch_array($tampil)){
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nama']; ?></td>
        </tr>
    <?php
        } 
    ?>
    </table> -->
    
    
    <?php
        include 'koneksi.php';
    ?>
    
    <h3>Form Pencarian DATA KHS Dengan PHP </h3>
    <form action="" method="get">
        <label>Cari :</label>
        <input type="text" name="cari">
        <input type="submit" value="Cari">
    </form>
    
    <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
    ?>
    
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Nilai</th>
        </tr>
    
        <?php
                if(isset($_GET['cari'])){
                    $cari 	= $_GET['cari'];
                    $sql 	= "SELECT
                                mahasiswa.nim, nilai, mahasiswa.nama AS nama, kodemk, matakuliah.kode AS namamk FROM khs
                                INNER JOIN mahasiswa ON khs.nim=mahasiswa.nim
                                INNER JOIN matakuliah ON khs.kodemk=matakuliah.kode
                                WHERE mahasiswa.nim='$cari'";
                    $tampil = mysqli_query($con,$sql);
                }else{
                    $sql 	= "SELECT
                                mahasiswa.nim, nilai, mahasiswa.nama AS nama, kodemk, matakuliah.namamk AS namamk FROM khs
                                INNER JOIN mahasiswa ON khs.nim=mahasiswa.nim
                                INNER JOIN matakuliah ON khs.kodemk=matakuliah.kode";
                    $tampil = mysqli_query($con,$sql);
                }
    
                $no = 1;
                while($r = mysqli_fetch_array($tampil)){
            ?>
    
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['kodemk']; ?></td>
            <td><?php echo $r['namamk']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    
        <?php } ?>
    
    </table>