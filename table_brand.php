
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Foto Brand</th>
        <th>Nama Brand</th>
        <th>Negara Brand</th>
        <th>Tanggal Berdiri</th>
        <th>Action</th>
    </tr>
    <?php
        include ("config.php");
        $no = 1;
        $query = "SELECT * FROM brand_pakaian";
        $result = mysqli_query($config, $query) or die("ERROR QUERY : ".mysqli_connect_error());
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $no ?></td>
        <td><img src="fotoBrand/<?= $data["foto_brand"]; ?>" alt="" style="width: 200px; height: 120px"></td>
        <td><?= $data["nama_brand"]; ?></td>
        <td><?= $data["negara_brand"]; ?></td>
        <td><?= $data["tanggal_berdiri"]; ?></td>
        <td>
            <a href="brand_edit.php?id_brand=<?=$data['id_brand'];?>">EDIT</a>
            <a href="brand_delete.php?id_brand=<?=$data['id_brand'];?>">DELETE</a>
        </td>
    </tr>
    <?php $no++; } ?>
</table>