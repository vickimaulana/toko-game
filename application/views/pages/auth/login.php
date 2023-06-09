<div class="container">
   <div class="row justify-content-center mt-5">
      <div class="col-5">
         <div class="card">
            <div class="card-body mb-4">
               <div class="row justify-content-center">
                  <div class="col-10">
                     <form action="<?= base_url('login/login') ?>" method="POST" class="form-signin">
                        <div class="text-center">
                           <img class="mb-4" src="<?= base_url() ?>/images/logo/logo.png" width="210" height="72">
                        </div>

                        <?php $this->load->view('layouts/_alert') ?>

                        <h1 class="h3 mb-3 font-weight-normal text-center">Silakan masuk</h1>

                        <div class="form-group">
                           <input type="email" class="form-control" name="email" placeholder="Email">
                           <?= form_error('email', '<small class="text-danger ml-2 mt-1">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                           <input type="password" class="form-control" name="password" placeholder="Kata Sandi">
                           <?= form_error('password', '<small class="text-danger ml-2 mt-1">', '</small>'); ?>
                        </div>

                        <button class="btn btn-lg btn-info btn-block" type="submit">Masuk</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>