<div class="container">
  <div class="row mt-4 mb-3">
    <div class="col-11">
      <h2>Daftar Game</h2>
    </div>
    <div class="col float-right">
      <a href="<?= base_url('data_product/add') ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        Game
      </a>
    </div>
  </div>

  <?php $this->load->view('layouts/_alert') ?>

  <div class="row mt-3">
    <div class="col">
      <table class="table table-light text-center">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Edisi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($product as $p) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td>
                <picture>
                  <source srcset="" type="image/svg+xml">
                  <img src="<?= base_url('images/game/') . $p['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:100px;height:120px;">
                </picture>
              </td>
              <td><?= $p['name'] ?></td>
              <td>Rp<?= number_format($p['price'], 2, ',', '.'); ?></td>
              <td><?= ucfirst($p['edition']) ?></td>
              <td>
                <a href="<?= base_url('data_product/edit/' . $p['id']) ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit text-light"></i>
                </a>
                <a href="<?= base_url('data_product/delete/' . $p['id']) ?>" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>