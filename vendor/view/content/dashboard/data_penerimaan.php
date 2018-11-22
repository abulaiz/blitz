<!DOCTYPE html>
<html>
<?php Vendor::View('layout.dashboard.head'); ?>
<body>

<?php require Vendor::Path('view/layout/dashboard/navbar.php'); ?>

<?php $_menu['data_penerimaan'] = "class='active'"; ?>

<?php Vendor::View('layout.dashboard.leftbar', compact('_menu')); ?>


  <div class="content-app">
    <h2 class="content-header"> Data Barang dari Pos Lain</h2>
    <?php if(Guard::extraExists('pesan')): ?>
    <div class="message">
      <?php Guard::putExtra('pesan'); ?>
    </div>  
    <?php endif; ?>
    <div class="card">  
      <!-- <button class="open-modal" data-target="#modal" data-close="#closeModal">Coba Ya</button>     -->
      <table id="hor-minimalist-b">
        <thead>
            <tr>
                <th scope="col">No Resi</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Sumber Pengiriman</th>
                <th scope="col">Status</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>
          <?php while($d = $data->fetch()): ?>
            <tr>
                <td><?php echo $d["id"]; ?></td>
                <td><?php echo $d["nama"]; ?></td>
                <td><?php echo $d["nama_kecamatan"]; ?></td>
                <td><?php echo ($d['status']=='3' ? "Belum diantar" : "Sedang diantar"); ?></td>
                <td>

                  <span class="dropdown">
                    <button>Opsi</button>
                    <label>
                      <input type="checkbox">
                      <ul id="<?php echo $d["id"]; ?>">
                        <li class="detail">Detail</li>
                        <li class="<?php echo ($d['status']=='3' ? "antarkan" : "terkirim"); ?>"></li>
                        <?php if($d['status']=='4'): ?>
                        <li class="divider"></li>
                        <li class="batal-antarkan"></li>
                        <?php endif; ?>
                      </ul>
                    </label>
                  </span>

                </td>
            </tr>
          <?php endwhile; ?>
          <?php if($data->rowCount()==0): ?> <tr><td colspan="5">Tidak ada data</td></tr><?php endif; ?>
        </tbody>
      </table>
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