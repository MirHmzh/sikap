
<div class="x_panel">
  <div class="x_title">
    <h2>Data Presensi</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">
          <div class="row">
            <div class="col-12">
              <form action="" method="POST" role="form" class="check-form">
                <div class="form-group">
                <?php if ($mode == 'create'): ?>
                  <div class="input-group">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                      <label for="">Pleton</label>
                      <select name="pleton" id="select_pleton" class="form-control" required="required">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                      <label for="">Jml. Skor</label>
                      <select name="nilai" id="select_nilai" class="form-control" required="required">
                        <?php foreach ($master_nilai as $key => $val): ?>
                          <option value="<?= $val->jml_skor ?>"><?= $val->jml_skor ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                <?php elseif($mode == 'edit'): ?>
                  <div class="input-group">
                    <div class="col-12">
                      <label for="">Jml. Skor</label>
                      <select name="nilai" id="select_nilai" class="form-control" required="required">
                        <?php foreach ($master_nilai as $key => $val): ?>
                          <option value="<?= $val->jml_skor ?>"><?= $val->jml_skor ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                <?php endif ?>
                  <br>
                  <hr>
                  <div class="input-group">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                      <h4 class="color-black text-center">Nama Siswa</h4>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <h4 class="color-black text-center">Ranking</h4>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <h4 class="color-black text-center">Pelanggaran</h4>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <h4 class="color-black text-center">Prestasi</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="siswa-wrapper">
                    <?php if ($mode == 'edit'): ?>
                      <?php foreach ($data_presensi as $key => $val): ?>
                        <div class="input-group">
                          <div class="col-sm-12 col-md-6 col-lg-6">
                            <h4 class="color-black"><?= $val['nama_siswa'] ?></h4>
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <input class="form-control" type="number" value="<?= $val['ranking'] ?>" name="ranking[<?= $val['id_siswa'] ?>]">
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <input class="form-control" type="number" value="<?= $val['pelanggaran'] ?>" name="pelanggaran[<?= $val['id_siswa'] ?>]">
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <input class="form-control" type="number" value="<?= $val['prestasi'] ?>" name="prestasi[<?= $val['id_siswa'] ?>]">
                          </div>
                          <input class="form-control" type="hidden" name="id_siswa[<?= $val['id_siswa'] ?>]">
                        </div>
                      <?php endforeach ?>
                    <?php endif ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#select_pleton').select2({
      ajax: {
          url: "<?= base_url('presensi/pleton') ?>",
          dataType: "json",
          method: "POST"
        }
    });
    $('#select_pleton').on('select2:select', function (e) {
      let data = e.params.data;
      Swal.fire({
        title: 'Memuat Siswa...',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
        },
      });
      $.ajax({
        url: "<?= base_url('presensi/pleton_siswa') ?>",
        type: 'POST',
        dataType: 'json',
        data: {pleton: data.id},
      })
      .done(function(data) {
        Swal.close();
        let html = ``;
        $.each(data, function(index, val) {
           html += `
            <div class="input-group">
              <div class="col-sm-12 col-md-6 col-lg-6">
                <h4 class="color-black">${val.nama_siswa}</h4>
              </div>
              <div class="col-sm-12 col-md-2 col-lg-2">
                <input class="form-control" type="number" name="ranking[${val.id_siswa}]">
              </div>
              <div class="col-sm-12 col-md-2 col-lg-2">
                <input class="form-control" type="number" name="pelanggaran[${val.id_siswa}]">
              </div>
              <div class="col-sm-12 col-md-2 col-lg-2">
                <input class="form-control" type="number" name="prestasi[${val.id_siswa}]">
              </div>
              <input class="form-control" type="hidden" name="id_siswa[${val.id_siswa}]">
            </div>
           `
        });
        $('.siswa-wrapper').html(html);
      })
      .fail(function() {
        Swal.fire('Gagal memuat siswa', '', 'error');
      });
    });
    $('.check-form').submit((e) => {
      e.preventDefault();
      Swal.fire({
        title: 'Menyimpan Presensi...',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
        },
      });
      let req_url = '';
      if('<?= $mode ?>'  == 'create'){
        req_url = "<?= base_url('presensi/save_check') ?>"
      }else if('<?= $mode ?>'  == 'edit'){
        req_url = "<?= base_url('presensi/save_check/'.$pleton.'/'.$tgl_checklist) ?>"
      }
      $.ajax({
        url: req_url,
        type: 'POST',
        dataType: 'json',
        data: $('.check-form').serializeArray(),
      })
      .done(function(data) {
        Swal.fire('Presensi tersimpan','','success');
        setTimeout(() => {
          window.location = "<?= base_url('presensi/') ?>"
        }, 2000)
      })
      .fail(function() {
        Swal.fire('Presensi gagal tersimpan','','error');
      });
    });
  });
</script>