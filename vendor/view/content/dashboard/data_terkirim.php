<!DOCTYPE html>
<html>
<?php Vendor::View('layout.dashboard.head'); ?>
<body>

<?php require Vendor::Path('view/layout/dashboard/navbar.php'); ?>

<?php $_menu['data_terkirim'] = "class='active'"; ?>

<?php Vendor::View('layout.dashboard.leftbar', compact('_menu')); ?>

<?php require Vendor::Path('libs/MonoAlpha.php'); ?>
<?php $ma = new MonoAlpha(); ?>

  <div class="content-app">
    <h2 class="content-header"> Data telah terkirim</h2>
    <?php if(Guard::extraExists('pesan')): ?>
    <div class="message">
      <?php Guard::putExtra('pesan'); ?>
    </div>  
    <?php endif; ?>
    <div class="card">  
      <!-- <button class="open-modal" data-target="#modal" data-close="#closeModal">Coba Ya</button>     -->
      <div class="row">
        <div class="col-md-12">
          <table id="hor-minimalist-b">
            <thead>
                <tr>
                    <th scope="col">No Resi</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Tujuan Pengiriman</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
              <?php while($d = $data->fetch()): ?>
                <tr>
                    <td><?php echo $d["id"]; ?></td>
                    <td><?php echo $ma->decrypt($d["nama"]); ?></td>
                    <td><?php echo $ma->decrypt($d["nama_kecamatan"]); ?></td>
                    <td>

                      <span class="dropdown">
                        <button>Opsi</button>
                        <label>
                          <input type="checkbox">
                          <ul id="<?php echo $d["id"]; ?>">
                            <li class="detail">Detail</li>
                          </ul>
                        </label>
                      </span>

                    </td>
                </tr>
              <?php endwhile; ?>
              <?php if($data->rowCount()==0): ?> <tr><td colspan="4">Tidak ada data</td></tr><?php endif; ?>
            </tbody>
          </table>          
        </div>
      </div>
    </div>  
  </div>

  <!-- This section used for parsing php value into javascript -->
  <input type="hidden" id="token" value="<?php Guard::generateToken(20);?>">

  <?php Vendor::View('content.dashboard.modal_detail'); ?>

  <div class="modal-overlay closed" id="detail" ></div>

  <div class="modal-overlay closed" id="loader" style="text-align: center;">
    <img class="modal-loader" src="assets/image/loading.gif">
  </div>


<script src="assets/js/view/data_pengiriman.js" type="text/javascript"></script>


  <?php Vendor::View('layout.dashboard.footer'); ?>

</body>
</html>