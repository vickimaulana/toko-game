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

    .text-light {
      color: #f8f9fa !important;
    }

    a {
      color: #007bff;
      text-decoration: none;
      background-color: transparent;
    }

    .badge {
      display: inline-block;
      padding: 0.25em 0.4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: 0.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .badge-primary {
      color: #fff;
      background-color: #007bff;
    }

    .badge-warning {
      color: #212529;
      background-color: #ffc107;
    }

    .badge-info {
      color: #fff;
      background-color: #17a2b8;
    }

    .badge-danger {
      color: #fff;
      background-color: #dc3545;
    }

    h3 {
      font-family: Verdana;
    }
  </style>
  <h3>
    <center>LAPORAN DATA ORDER</center>
  </h3>
  <br />
  <div class="row mt-3">
    <div class="col">
      <table class="table-data text-center">
        <thead class="thead-dark">
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
              <td><a><strong><?= $b['invoice'] ?></strong></a></td>
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
    </div>
  </div>
</body>

</html>