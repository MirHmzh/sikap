<script src="<?= base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-export-weekly">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Presensi Mingguan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group">
            <div class="col-sm-6">
              <select name="pleton" id="pleton" class="form-control" required="required">
                <option value="">-- Pilih Pleton --</option>
              </select>
            </div>
            <div class="col-sm-6">
              <input type="week" name="week" id="week" class="form-control" value="" required="required" title="">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="cetakWeekly()">Cetak</button>
      </div>
    </div>
  </div>
</div>

<div class="x_panel">
  <div class="x_title">
    <h2>Data Presensi</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li>
        <a href="<?= base_url('presensi/check') ?>" title="">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i>
          </button>
        </a>
      </li>
      <li>
        <a data-toggle="modal" href='#modal-export-weekly' title="">
          <button type="button" class="btn btn-success">
            <i class="fa fa-print"></i>
          </button>
        </a>
        <!-- <input type="week" name="" id="input" class="form-control" value="" required="required" title=""> -->
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">
          <table id="datatable-presensi" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Tgl. Presensi</th>
                <th>Pleton</th>
                <th>Minggu Pendidikan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  let datatable;
  $('#modal-export-weekly').on('show.bs.modal', () => {
    $.ajax({
      url: "<?= base_url('presensi/get_pleton') ?>",
      type: 'GET',
      dataType: 'json'
    })
    .done(function(data) {
      let html = ``;
      $.each(data, function(index, val) {
         html += `<option value="${val.pleton}">${val.pleton}</option>`
      });
      $('#pleton').html(html);
    })
    .fail(function() {
      console.log("error");
    });

  });
  $(document).ready(function() {
    datatable = $('#datatable-presensi').DataTable({
      processing: true,
      serverSide : true,
      ordering: true,
      deferRender: true,
      ajax : {
        url : '<?= base_url("presensi/get_presensi") ?>',
        method : "POST"
      },
      columns : [
        { data : "tgl_checklist",
          render : (data, type, row) => {
            let raw_date = data.split('-');
            let html = `${raw_date[2]}-${raw_date[1]}-${raw_date[0]}`;
            return html;
          }
        },
        { data : "pleton" },
        { data: "masa_pendidikan_awal",
          render: (data,type,row) => {
            let awal = Date.parse(row.masa_pendidikan_awal);
            let masa = Date.parse(row.tgl_checklist);
            console.log((masa.valueOf()));
            let minggu = Math.ceil((masa-awal) / (1000 * 60 * 60 * 24 * 7));
            return minggu;
          }
        },
        { data : "pleton",
          render : (data, type, row) => {
          let html = `
              <button type="button" class="btn btn-danger" onClick=del('${row.pleton}','${row.tgl_checklist}')>
                <i class="fa fa-trash"></i>
              </button>
              <button type="button" class="btn btn-warning" onClick=edit('${row.pleton}','${row.tgl_checklist}')>
                <i class="fa fa-pencil"></i>
              </button>
	          <button type="button" class="btn btn-primary" onClick=exp('${row.pleton}','${row.tgl_checklist}')>
	            <i class="fa fa-print"></i>
	          </button>
            `
            return html;
          }
        }
      ],
    });
  });

  function del(pleton, tgl) {
  	Swal.fire({
		  title: 'Hapus data?',
		  showCancelButton: true,
		  confirmButtonText: 'Ya',
		  cancelButtonText: `Tidak`,
		}).then((result) => {
		  if (result.isConfirmed) {
		    Swal.fire({
			    title: 'Menghapus Data...',
			    text: 'Data akan dihapus permanen dari sistem',
			    allowOutsideClick: false,
			    didOpen: () => {
			      Swal.showLoading()
			    },
			  });
			  $.ajax({
			  	url: "<?= base_url('presensi/delete/') ?>"+pleton+'/'+tgl,
			  	type: 'POST',
			  	dataType: 'json',
			  })
			  .done(function() {
			  	datatable.ajax.reload();
			  	Swal.fire('Data terhapus', '', 'warning');
			  })
			  .fail(function() {
			  	datatable.ajax.reload();
			  	Swal.fire('Data gagal terhapus', '', 'error');
			  });

		  }
		})
  }

  function edit(pleton, tgl) {
  	window.open("<?= base_url('presensi/check/') ?>"+pleton+'/'+tgl)
  }

  function exp(pleton, tgl) {
  	window.open("<?= base_url('presensi/export_daily/') ?>"+pleton+'/'+tgl)
  }

  function cetakWeekly() {
    window.open("<?= base_url('presensi/export_weekly/') ?>"+$('#pleton').val()+"/"+$("#week").val());
  }
</script>