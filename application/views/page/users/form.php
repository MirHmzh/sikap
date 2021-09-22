    <div class="x_panel">
      <div class="x_title">
        <h2>Data User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class="dropdown">
            <a><i class="fa"></i></a>
          </li>
          <li><a class="close-link"><i class="fa"></i></a>
          </li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form action="<?= base_url('users/save_user/') ?><?= isset($users['id']) ? $users['id'] : '' ?>" id="form_siswa" method="POST" class="form-horizontal form-label-left">
          <?php if (isset($users['id_siswa'])): ?>
            <input type="hidden" name="id_users" id="inputId_users" class="form-control" value="<?= $users['id_users']?>">
          <?php endif ?>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" name="nama" class="form-control" value="<?= isset($users) ? $users['name'] : '' ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" name="username" class="form-control" value="<?= isset($users) ? $users['username'] : '' ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="password" class="form-control" name="password">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Role</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="role">
                <option value="1">Admin</option>
                <option value="2">Editor</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <br><br>
          <h2>Hak Akses</h2>
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Create Siswa</td>
                <td>
                  <div class="">
                    <label>
                      <input type="checkbox" name="akses[]" class="js-switch" <?= isset($users['permissions']['siswa.create']) ? 'checked' : ''  ?> value="siswa.create"/>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Read Siswa</td>
                <td>
                  <div class="">
                    <label>
                      <input type="checkbox" name="akses[]" class="js-switch" <?= isset($users['permissions']['siswa.read']) ? 'checked' : ''  ?> value="siswa.read"/>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Update Siswa</td>
                <td>
                  <div class="">
                    <label>
                      <input type="checkbox" name="akses[]" class="js-switch" <?= isset($users['permissions']['siswa.update']) ? 'checked' : ''  ?> value="siswa.update"/>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Delete Siswa</td>
                <td>
                  <div class="">
                    <label>
                      <input type="checkbox" name="akses[]" class="js-switch" <?= isset($users['permissions']['siswa.delete']) ? 'checked' : ''  ?> value="siswa.delete"/>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Export Siswa</td>
                <td>
                  <div class="">
                    <label>
                      <input type="checkbox" name="akses[]" class="js-switch" <?= isset($users['permissions']['siswa.export']) ? 'checked' : ''  ?> value="siswa.export"/>
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="form-group row">
            <div class="col-md-9 offset-md-3">
              <button type="submit" onClick="" class="btn btn-primary">Cancel</button>
              <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script type="text/javascript" charset="utf-8" defer>
      <?php if(isset($users['role'])){ ?>
        $('select[name="role"]').val("<?= $users['role'] ?>");
      <?php } ?>
    </script>