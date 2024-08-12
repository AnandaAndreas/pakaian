<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Foto Pakaian</th>
        <th>Jenis</th>
        <th>Nama</th>
        <th>Tanggal Rilis</th>
        <th>Deskripsi</th>
        <th>Gender Pakaian</th>
        <th>Brand</th>
        <th>Action</th>
    </tr>
    <?php 
        include ("config.php");
        $no = 1;
        $query = "SELECT * FROM pakaian
                INNER JOIN brand_pakaian ON  pakaian.id_brand = brand_pakaian.id_brand";
        $result = mysqli_query($config, $query) or die("ERROR QUERY : ".mysqli_connect_error());
        while ($data = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?= $no ?></td>
        <td><img src="fotoPakaian/<?= $data["foto_pakaian"]; ?>" alt="" style="width: 200px; height: 120px"></td>
        <td><?= $data["jenis_pakaian"]; ?></td>
        <td><?= $data["nama_pakaian"]; ?></td>
        <td><?= $data["tanggal_rilis"]; ?></td>
        <td><?= $data["deskripsi_pakaian"]; ?></td>
        <td><?= $data["gender_pakaian"]; ?></td>
        <td><?= $data["nama_brand"]; ?></td>
        <td>
            <a href="pakaian_edit.php?id_pakaian=<?=$data['id_pakaian'];?>">EDIT</a>
            <a href="pakaian_delete.php?id_pakaian=<?=$data['id_pakaian'];?>">DELETE</a>
        </td>
    </tr>
    <?php $no++; } ?>
</table>