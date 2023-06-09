<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style type="text/css">
  .table-data {
    width: 100%;
    border-collapse: collapse;
  }

  .table-data tr th,
  .table-data tr td {
    border: 1px solid black;
    font-size: 11pt;
    font-family: Verdana;
    padding: 10px 10px 10px 10px;
  }

  .table-data th {
    color: #fff;
    background-color: #343a40;
    border-color: #454d55;
  }

  h3 {
    font-family: Verdana;
  }
</style>
<h3>
  <center>LAPORAN DATA USER</center>
</h3>
<br />
<table class="table-data">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $a = 1;
    foreach ($users as $b) { ?>
      <tr>
        <td><?= $a++ ?></td>
        <td><?= $b['name'] ?></td>
        <td><?= $b['email'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>