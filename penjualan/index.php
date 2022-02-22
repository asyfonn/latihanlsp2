<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
    <h4>Pilih Data Barang</h4>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <table>
        <tr>
            <td>Pilih Barang</td>
            <td>:</td>
            <td>
                <select name="id">
                    <?php
                    include "koneksi.php";
                    $sql = "select id,namabarang from barang";
                    $hasil = mysqli_query($kon,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                        $ket="";
                        if (isset($_GET['id'])){
                            $id = $trim($_GET['id']);

                            if($id==$data['id'])
                            {
                                $ket="selected";
                            }
                        }
                    ?>
                    <option <?php echo $ket;?>
                    value="<?php echo $data['id']?>">
                    <?php echo $data['id'];?> - <?php echo $data['namabarang'];?>
                    </option>
                    
                <?php
                    }
                ?>
                </select>
            </td>
            <td><input type="submit" name="submit" value="Pilih"></td>
        </tr>
    </table>
    <h2>Detail Harga Barang</h2>
    <?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM barang where id=$id";
        $hasil = mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    ?>
    <form method="post">
    <table>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input type="text" name="id" value="<?php echo $data['id'];?>"></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><input type="text" name="namabarang" value="<?php echo $data['namabarang'];?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" name="harga" value="<?php echo $data['harga'];?>"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><input type="text" name="stok" value="<?php echo $data['stok'];?>"></td>
        </tr>
    </table>
</body>
</html>