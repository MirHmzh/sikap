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
        <a href="<?= base_url('presensi/export') ?>" title="">
          <button type="button" class="btn btn-success">
            <i class="fa fa-print"></i>
          </button>
        </a>
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
            console.log(row);
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
</script>