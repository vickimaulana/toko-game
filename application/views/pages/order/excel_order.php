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

  .text {
    mso-number-format: "\@";
    /*force text*/
  }

  h3 {
    font-family: Verdana;
  }
</style>
<h3>
  <center>LAPORAN DATA ORDER</center>
</h3>
<br />
<table class="table-data">
  <thead>
    <tr>
      <th>Invoice</th>
      <th>Date</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $a = 1;
    foreach ($orders as $b) { ?>
      <tr>
        <td class="text"><a><strong><?= $b['invoice'] ?></strong></a></td>
        <td><?= $b['date'] ?></td>
        <td>Rp. <?= number_format($b['total'], 2, ',', '.') ?></td>
        <td>
          <?php if ($b['status'] == 'waiting') : ?>
            <span class="badge badge-primary"><?= $b['status'] ?></span>
          <?php elseif ($b['status'] == 'paid') : ?>
            <span class="badge badge-warning text-light"><?= $b['status'] ?></span>
          <?php elseif ($b['status'] == 'cancel') : ?>
            <span class="badge badge-danger"><?= $b['status'] ?></span>
          <?php endif; ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>