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
<script src="<?= base_url('assets/vendors/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
<div class="x_panel">
  <div class="x_title">
    <h2>Data Users</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li>
        <a href="<?= base_url('users/save') ?>" title="">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i>
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
    <table id="datatable-siswa" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Username</th>
          <th>Nama</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
          <td>1</td>
          <td>3515</td>
          <td>John Doe</td>
          <td>cakjack@mail.co</td>
          <td>23</td>
          <td>80.90</td>
          <td>
            <button type="button" class="btn btn-danger">
              <i class="fa fa-trash"></i>
            </button>
            <button type="button" class="btn btn-warning">
              <i class="fa fa-pencil"></i>
            </button>
          </td>
        </tr> -->
      </tbody>
    </table>


  </div>
</div>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#datatable-siswa').DataTable({
      processing: true,
      serverSide : true,
      ordering: true,
      deferRender: true,
      ajax : {
        url : "<?= base_url('users/get_users') ?>",
        method : "POST"
      },
      columns : [
        { data : "username",
          render : (data, type, row) => {
            let html = `<a href="<?= base_url('User/save/') ?>${row.id}">${data}</a>`;
            console.log(row);
            return html;
          },
        },
        { data : "name" },
        { data : "role" ,
          render : (data, type, row) => {
            let html = '';
            if (data == 1) {
              html = 'Admin';
            }else{
              html = 'Editor';
            }
            return html;
          },
        },
        { data : "id",
          render : (data, type, row) => {
          console.log(data);
          let html = `
            <a href="<?= base_url('users/delete/') ?>${data}" title="">
              <button type="button" class="btn btn-danger" data-id="${data}">
                <i class="fa fa-trash"></i>
              </button>
            </a>
            <a href="<?= base_url('users/save/') ?>${data}" title="">
              <button type="button" class="btn btn-warning" data-id="${data}">
                <i class="fa fa-pencil"></i>
              </button>
            </a>
            `
            return html;
          }
        }
      ],
    });
  });
</script>