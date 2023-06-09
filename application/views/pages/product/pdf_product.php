<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
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

    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
    }

    .mt-3 {
      margin-top: 1rem !important;
    }

    .col {
      position: relative;
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
    }

    .col {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      min-width: 0;
      max-width: 100%;
    }

    .text-center {
      text-align: center !important;
    }

    h3 {
      font-family: Verdana;
    }
  </style>
  <h3>
    <center>LAPORAN DATA PRODUCT</center>
  </h3>
  <br />
  <div class="row mt-3">
    <div class="col">
      <table class="table-data text-center">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Edisi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $a = 1;
          foreach ($product as $b) { ?>
            <tr>
              <td scope="row"><?= $a++; ?></td>
              <td><?= $b['name']; ?></td>
              <td>Rp. <?= number_format($b['price'], 2, ',', '.'); ?></td>
              <td><?= $b['edition']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>