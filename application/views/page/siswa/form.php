    <div class="x_panel">
      <div class="x_title">
        <h2>Data Siswa</h2>
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
        <form id="form_siswa" class="form-horizontal form-label-left">
          <?= isset($siswa) ? '<input type="hidden" name="id_siswa" id="inputId_siswa" class="form-control" value="'.$siswa['id_siswa'].'">' : '' ?>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Pleton</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <select class="form-control" name="pleton" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <label class="control-label col-md-1 col-sm-1 col-xs-1">Kompi</label>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <select class="form-control" name="kompi" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <label class="control-label col-md-1 col-sm-1 col-xs-1">Batalyon</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <select class="form-control" name="batalyon" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
               </select>
            </div>
          </div>


          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">NIK</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" name="nik_siswa" class="form-control" value="<?= isset($siswa) ? $siswa['nik_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" name="nama_siswa" class="form-control" value="<?= isset($siswa) ? $siswa['nama_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="jk_siswa" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">No. HP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="no_hp_siswa" value="<?= isset($siswa) ? $siswa['no_hp_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="email_siswa" value="<?= isset($siswa) ? $siswa['email_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tinggi (cm)</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="tinggi_siswa" value="<?= isset($siswa) ? $siswa['tinggi_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Berat (kg)</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="berat_siswa" value="<?= isset($siswa) ? $siswa['berat_siswa'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="agama_siswa" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Suku</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="tags_4" type="text" name="suku_siswa" class="tags form-control" value="<?= isset($siswa) ? $siswa['suku_siswa'] : '' ?>"  required/>
              <div id="suggestions-container-3" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="tempat_lahir" value="<?= isset($siswa) ? $siswa['tempat_lahir'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="birthday" name="tanggal_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= isset($siswa) ? $siswa['tanggal_lahir'] : '' ?>">
              <script>
                function timeFunctionLong(input) {
                  setTimeout(function() {
                    input.type = 'text';
                  }, 60000);
                }
              </script>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Golongan Darah</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="golongan_darah" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="O">O</option>
                <option value="AB">AB</option>
              </select>
            </div>
          </div>



          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <textarea id="message" required="required" class="form-control" required name="alamat_rumah" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($siswa) ? $siswa['alamat_rumah'] : '' ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Provinsi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="provinsi" required>
                <?php foreach ($provinsi as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kabupaten/Kota</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kabupaten_kota" required>
                <?php foreach ($kota as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kecamatan</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kecamatan" required>
                <?php foreach ($kecamatan as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kelurahan</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kelurahan" required>
                <?php foreach ($kelurahan as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="pekerjaan" value="<?= isset($siswa) ? $siswa['pekerjaan'] : '' ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Kawin</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="status_kawin" required>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tgl. Valid KTP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="birthday" name="tgl_ktp" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= isset($siswa) ? $siswa['tgl_ktp'] : '' ?>" required>
              <script>
                function timeFunctionLong(input) {
                  setTimeout(function() {
                    input.type = 'text';
                  }, 60000);
                }
              </script>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Bahasa Asing</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="tags_1" type="text" name="bahasa_asing" class="tags form-control" value="<?= isset($siswa) ? $siswa['bahasa_asing'] : '' ?>"  required/>
              <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Bahasa Daerah</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="tags_2" type="text" name="bahasa_daerah" class="tags form-control" value="<?= isset($siswa) ? $siswa['bahasa_daerah'] : '' ?>"  required/>
              <div id="suggestions-container-2" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Prestasi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="tags_3" type="text" name="prestasi" class="tags form-control" value="<?= isset($siswa) ? $siswa['prestasi'] : '' ?>"  required/>
              <div id="suggestions-container-3" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Asal Polda</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="asal_polda" required>
                <?php foreach ($polda as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Asal Polres/Ta/Tabes</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="asal_polres" required>
                <?php foreach ($polres as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
        </form>
      </div>
    </div>


    <div class="x_panel">
      <div class="x_title">
        <h2>Data Wali</h2>
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
        <form class="form-horizontal form-label-left" id="form_wali">

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Wali</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="status_wali" required>
                <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
              </select>
            </div>
          </div>
          <div class="wali-main-info">
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tgl Lahir Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input id="birthday" class="date-picker form-control input-wali" name="tgl_lahir_wali" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= isset($siswa) ? $siswa['tgl_lahir_wali'] : '' ?>">
                <script>
                  function timeFunctionLong(input) {
                    setTimeout(function() {
                      input.type = 'text';
                    }, 60000);
                  }
                </script>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat Kantor Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <textarea id="message" required="required" class="form-control input-wali" name="alamat_kantor_wali" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($siswa) ? $siswa['alamat_kantor_wali'] : '' ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Kantor Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['nama_kantor_wali'] : '' ?>" name="nama_kantor_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['jabatan_wali'] : '' ?>" name="jabatan_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Gol. Kerja Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['gol_kerja_wali'] : '' ?>" name="gol_kerja_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kerja Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['jns_kerja_wali'] : '' ?>" name="jns_kerja_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Kel. Kerja Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['kel_kerja_wali'] : '' ?>" name="kel_kerja_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">No. HP Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" value="<?= isset($siswa) ? $siswa['no_hp_wali'] : '' ?>" name="no_hp_wali">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <select class="form-control input-wali" required name="agama_wali">
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Wali</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-wali" name="nama_wali" value="<?= isset($siswa) ? $siswa['nama_wali'] : '' ?>">
              </div>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Ibu</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="status_ibu" required>
                <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
              </select>
            </div>
          </div>
          <div class="ibu-main-info">
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tgl Lahir Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input id="birthday" class="date-picker form-control input-ibu" name="tgl_lahir_ibu" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= isset($siswa) ? $siswa['tgl_lahir_ibu'] : '' ?>">
                <script>
                  function timeFunctionLong(input) {
                    setTimeout(function() {
                      input.type = 'text';
                    }, 60000);
                  }
                </script>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat Kantor Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <textarea id="message" required="required" class="form-control input-ibu" name="alamat_kantor_ibu" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($siswa) ? $siswa['alamat_kantor_ibu'] : '' ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Kantor Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['nama_kantor_ibu'] : '' ?>" name="nama_kantor_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['jabatan_ibu'] : '' ?>" name="jabatan_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Gol. Kerja Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['gol_kerja_ibu'] : '' ?>" name="gol_kerja_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kerja Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['jns_kerja_ibu'] : '' ?>" name="jns_kerja_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Kel. Kerja Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['kel_kerja_ibu'] : '' ?>" name="kel_kerja_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">No. HP Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" value="<?= isset($siswa) ? $siswa['no_hp_ibu'] : '' ?>" name="no_hp_ibu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <select class="form-control input-ibu" name="agama_ibu" required>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Ibu</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-ibu" name="nama_ibu" value="<?= isset($siswa) ? $siswa['nama_ibu'] : '' ?>">
              </div>
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Bapak</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="status_bapak" required>
                <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
              </select>
            </div>
          </div>

          <div class="ayah-main-info">
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tgl Lahir Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input id="birthday" class="date-picker form-control input-bapak" name="tgl_lahir_bapak" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= isset($siswa) ? $siswa['tgl_lahir_bapak'] : '' ?>">
                <script>
                  function timeFunctionLong(input) {
                    setTimeout(function() {
                      input.type = 'text';
                    }, 60000);
                  }
                </script>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat Kantor Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <textarea id="message" required="required" class="form-control input-bapak" name="alamat_kantor_bapak" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($siswa) ? $siswa['alamat_kantor_bapak'] : '' ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Kantor Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['nama_kantor_bapak'] : '' ?>" name="nama_kantor_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['jabatan_bapak'] : '' ?>" name="jabatan_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Gol. Kerja Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['gol_kerja_bapak'] : '' ?>" name="gol_kerja_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kerja Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['jns_kerja_bapak'] : '' ?>" name="jns_kerja_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Kel. Kerja Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['kel_kerja_bapak'] : '' ?>" name="kel_kerja_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">No. HP Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" value="<?= isset($siswa) ? $siswa['no_hp_bapak'] : '' ?>" name="no_hp_bapak">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <select class="form-control input-bapak" name="agama_bapak" required>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Bapak</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" required class="form-control input-bapak" name="nama_bapak" value="<?= isset($siswa) ? $siswa['nama_bapak'] : '' ?>">
              </div>
            </div>
          </div>

          <div class="ln_solid"></div>
        </form>
      </div>
    </div>


    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pendidikan</h2>
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
        <form class="form-horizontal form-label-left" id="form_pendidikan">

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Akreditasi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="ban" >
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">NIM</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control"  name="nim" value="<?= isset($siswa) ? $siswa['nim'] : '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenjang Pendidikan</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="jenjang_pendidikan" >
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Prodi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" value="<?= isset($siswa) ? $siswa['nama_prodi'] : '' ?>" name="nama_prodi" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Perguruan Tinggi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" value="<?= isset($siswa) ? $siswa['nama_pt'] : '' ?>" name="nama_pt" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">IPK</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text"  class="form-control" value="<?= isset($siswa) ? $siswa['ipk'] : '' ?>" name="ipk">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Rata rata nilai rapor</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['rata_rapor'] : '' ?>" name="rata_rapor">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Pendidikan umum akhir</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="jenjang_pendidikan" >
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jurusan SLTA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['jurusan'] : '' ?>" name="jurusan">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Rata rata nilai UN SMA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['rata_un_sma'] : '' ?>" name="rata_un_sma">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun lulus SMA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['thn_lulus_sma'] : '' ?>" name="thn_lulus_sma">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Provinsi SMA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="provinsi_sma" required>
                <?php foreach ($provinsi as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kota SMA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kab_kota_sma" required>
                <?php foreach ($kota as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama SMA</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['nama_sma'] : '' ?>" name="nama_sma">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Rata rata nilai UN SMP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['rata_un_smp'] : '' ?>" name="rata_un_smp">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun lulus SMP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" required class="form-control" value="<?= isset($siswa) ? $siswa['thn_lulus_smp'] : '' ?>" name="thn_lulus_smp">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Provinsi SMP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="provinsi_smp" required>
                <?php foreach ($provinsi as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kota SMP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kab_kota_smp" required>
                <?php foreach ($kota as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama SMP</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nama_smp'] : '' ?>" name="nama_smp">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Rata rata nilai UN SD</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['rata_un_sd'] : '' ?>" name="rata_un_sd">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun lulus SD</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['thn_lulus_sd'] : '' ?>" name="thn_lulus_sd">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Provinsi SD</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="provinsi_sd" required>
                <?php foreach ($provinsi as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kota SD</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select class="form-control" name="kab_kota_sd" required>
                <?php foreach ($kota as $p => $pn): ?>
                  <option value="<?= $p ?>"><?= $pn ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama SD</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required name="nama_sd" value="<?= isset($siswa) ? $siswa['nama_sd'] : '' ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
        </form>
      </div>
    </div>


    <div class="x_panel">
      <div class="x_title">
        <h2>Data Seleksi</h2>
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
        <form class="form-horizontal form-label-left" id="form_seleksi">
          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nosis Panjang</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nosis_panjang'] : '' ?>" name="nosis_panjang">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nilai Jasmani</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nilai_jasmani'] : '' ?>" name="nilai_jasmani">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nilai Psi</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nilai_psi'] : '' ?>" name="nilai_psi">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nilai Uji Akademik</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nilai_uji_akademik'] : '' ?>" name="nilai_uji_akademik">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nilai Akhir</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['nilai_akhir'] : '' ?>" name="nilai_akhir">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Ranking</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" required value="<?= isset($siswa) ? $siswa['ranking'] : '' ?>" name="ranking">
            </div>
          </div>

          <!-- <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" class="form-control" name="">
            </div>
          </div> -->
        </form>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Data Foto</h2>
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
        <div style="margin: auto; text-align: center">
          <?= isset($siswa) && isset($siswa['foto']) ? '<img src="'.base_url('assets/uploads/').$siswa['foto'].'" style="max-width: 25em">' : '' ?>
        </div>
        <br><br>
        <form class="form-horizontal form-label-left" id="form_foto">
          <div class="form-group row">
            <!-- <label class="control-label col-md-3 col-sm-3 col-xs-3">Foto</label> -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="file" class="form-control" name="foto" required>
            </div>
          </div>

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
      let load_daerah_p = 1;
      let load_daerah_k = 1;
      let load_daerah_c = 1;
      <?php if(isset($siswa['id_siswa'])){ ?>
        let loading_pref = Swal.fire({
          title: 'Memuat',
          text : 'Memuat data siswa...',
          allowOutsideClick : false,
          timerProgressBar: true,
          onBeforeOpen: () => {
            Swal.showLoading()
          },
        });
      <?php } ?>
      $("select[name='provinsi_sma']").change((el) => {
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kabupaten/') ?>"+val, function(data) {
          $("select[name='kab_kota_sma']").html("");
          $("select[name='kab_kota_sma']").html(data);
        }, 'html');
      });
      $("select[name='provinsi_smp']").change((el) => {
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kabupaten/') ?>"+val, function(data) {
          $("select[name='kab_kota_smp']").html("");
          $("select[name='kab_kota_smp']").html(data);
        }, 'html');
      });
      $("select[name='provinsi_sd']").change((el) => {
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kabupaten/') ?>"+val, function(data) {
          $("select[name='kab_kota_sd']").html("");
          $("select[name='kab_kota_sd']").html(data);
        }, 'html');
      });
      $("select[name='provinsi']").change((el) => {
        load_daerah_p = 1;
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kabupaten/') ?>"+val, function(data) {
          $("select[name='kabupaten_kota']").html("");
          $("select[name='kabupaten_kota']").html(data);
          $.get("<?= base_url('main/get_kecamatan/') ?>"+$("select[name='kabupaten_kota']").val(), function(data) {
            $("select[name='kecamatan']").html("");
            $("select[name='kecamatan']").html(data);
            $.get("<?= base_url('main/get_kelurahan/') ?>"+$("select[name='kecamatan']").val(), function(data) {
              $("select[name='kelurahan']").html("");
              $("select[name='kelurahan']").html(data);
              load_daerah_p = 0;
            }, 'html');
          }, 'html');
        }, 'html');
      });
      $("select[name='kabupaten_kota']").change((el) => {
        load_daerah_k = 1;
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kecamatan/') ?>"+val, function(data) {
          $("select[name='kecamatan']").html("");
          $("select[name='kecamatan']").html(data);

          $.get("<?= base_url('main/get_kelurahan/') ?>"+$("select[name='kecamatan']").val(), function(data) {
            $("select[name='kelurahan']").html("");
            $("select[name='kelurahan']").html(data);
            load_daerah_k = 0;
          }, 'html');
        }, 'html');
      });
      $("select[name='kecamatan']").change((el) => {
        load_daerah_c = 1;
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_kelurahan/') ?>"+val, function(data) {
          $("select[name='kelurahan']").html("");
          $("select[name='kelurahan']").html(data);
          load_daerah_c = 0;
        }, 'html');
      });
      $("select[name='asal_polda']").change((el) => {
        let val = $(el.target).val();
        $.get("<?= base_url('main/get_polres/') ?>"+val, function(data) {
          $("select[name='asal_polres']").html("");
          $("select[name='asal_polres']").html(data);
        }, 'html');
      });
      $("#tags_2").tagsInput({
          width: "auto"
      });
      $("#tags_3").tagsInput({
          width: "auto"
      })
      $("#tags_4").tagsInput({
          width: "auto"
      })
      <?php if(isset($siswa['id_siswa'])){ ?>
        $("select[name='jk_siswa']").val("<?= $siswa['jk_siswa'] ?>");
        $("select[name='agama_siswa']").val("<?= $siswa['agama_siswa'] ?>");
        $("select[name='golongan_darah']").val("<?= $siswa['golongan_darah'] ?>");
        $("select[name='provinsi']").val("<?= $siswa['provinsi'] ?>").trigger('change');
        $("select[name='asal_polda']").val("<?= $siswa['asal_polda'] ?>").trigger('change');
          let int_k = setInterval(() => {
            if (load_daerah_p == 0) {
              $("select[name='kabupaten_kota']").val("<?= $siswa['kabupaten_kota'] ?>").trigger('change')
              clearInterval(int_k)
            }
          }, 1000)
          let int_c = setInterval(() => {
            if (load_daerah_k == 0) {
              $("select[name='kecamatan']").val("<?= $siswa['kecamatan'] ?>").trigger('change')
              clearInterval(int_c)
            }
          }, 1000)
          let int_l = setInterval(() => {
            if (load_daerah_c == 0) {
              $("select[name='kelurahan']").val("<?= $siswa['kelurahan'] ?>").trigger('change')
              clearInterval(int_l)
              Swal.close();
            }
          }, 1000)
        $("select[name='status_kawin']").val("<?= $siswa['status_kawin'] ?>");
        $("select[name='status_wali']").val("<?= $siswa['status_wali'] ?>");
        $("select[name='agama_wali']").val("<?= $siswa['agama_wali'] ?>");
        $("select[name='status_ibu']").val("<?= $siswa['status_ibu'] ?>");
        $("select[name='agama_ibu']").val("<?= $siswa['agama_ibu'] ?>");
        $("select[name='status_bapak']").val("<?= $siswa['status_bapak'] ?>");
        $("select[name='agama_bapak']").val("<?= $siswa['agama_bapak'] ?>");
        $("select[name='ban']").val("<?= $siswa['ban'] ?>");
        $("select[name='jenjang_pendidikan']").val("<?= $siswa['jenjang_pendidikan'] ?>");
        $("select[name='provinsi_sma']").val("<?= $siswa['provinsi_sma'] ?>").trigger('change');
        setTimeout(() => {
          $("select[name='kab_kota_sma']").val("<?= $siswa['kab_kota_sma'] ?>");
        }, 500)
        $("select[name='provinsi_smp']").val("<?= $siswa['provinsi_smp'] ?>").trigger('change');
        setTimeout(() => {
          $("select[name='kab_kota_smp']").val("<?= $siswa['kab_kota_smp'] ?>");
        }, 500)
        $("select[name='provinsi_sd']").val("<?= $siswa['provinsi_sd'] ?>").trigger('change');
        setTimeout(() => {
          $("select[name='kab_kota_sd']").val("<?= $siswa['kab_kota_sd'] ?>");
        }, 500)
        let suku = "<?= $siswa['suku_siswa'] ?>".split(",");
        $.each(suku, function(index, val) {
           $('#tags_4').tagsInput('add', val);
           $('#tags_4').tagsInput('refresh');
        });

        if ("<?= $siswa['status_wali'] ?>" == "Hidup") {
          $('.wali-main-info').fadeIn(200);
        }else{
          $('.wali-main-info').fadeOut(200);
        }

        if ("<?= $siswa['status_ibu'] ?>" == "Hidup") {
          $('.ibu-main-info').fadeIn(200);
        }else{
          $('.ibu-main-info').fadeOut(200);
        }

        if ("<?= $siswa['status_bapak'] ?>" == "Hidup") {
          $('.ayah-main-info').fadeIn(200);
        }else{
          $('.ayah-main-info').fadeOut(200);
        }

      <?php } ?>

      $('select[name="status_wali"]').change((el) => {
        if ($(el.target).val() == "Hidup") {
          $('.wali-main-info').fadeIn(200);
        }else{
          $('.wali-main-info').fadeOut(200);
        }
      });

      $('select[name="status_ibu"]').change((el) => {
        if ($(el.target).val() == "Hidup") {
          $('.ibu-main-info').fadeIn(200);
        }else{
          $('.ibu-main-info').fadeOut(200);
        }
      });

      $('select[name="status_bapak"]').change((el) => {
        if ($(el.target).val() == "Hidup") {
          $('.ayah-main-info').fadeIn(200);
        }else{
          $('.ayah-main-info').fadeOut(200);
        }
      });



      $('#submitBtn').click((e) => {

        e.preventDefault();
        let form_siswa = $('#form_siswa').serializeArray(),
            form_wali = $('#form_wali').serializeArray(),
            form_pendidikan = $('#form_pendidikan').serializeArray(),
            form_foto = $('#form_foto').serializeArray(),
            form_seleksi = $('#form_seleksi').serializeArray();
        let concats = form_siswa.concat(form_wali).concat(form_pendidikan).concat(form_seleksi);
        let cs = {};
        let input, textarea, select = 0;
        for (c in concats) {
          cs[concats[c].name] = concats[c].value;
        }
        $.each($("input[required]"), function(index, val) {
           $(val).removeClass('null-input');
           if ($(val).val() == '') {
            if ($(val).attr('class').includes('input-wali') && $('select[name="status_wali"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-ibu') && $('select[name="status_ibu"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-bapak') && $('select[name="status_bapak"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if($(val).attr('class').includes('input-bapak') == false && $(val).attr('class').includes('input-ibu') == false && $(val).attr('class').includes('input-wali') == false){
              $(val).addClass('null-input');
              input = 1;
            }
           }
        });
        $.each($("textarea[required]"), function(index, val) {
           $(val).removeClass('null-input');
           if ($(val).val() == '') {
            if ($(val).attr('class').includes('input-wali') && $('select[name="status_wali"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-ibu') && $('select[name="status_ibu"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-bapak') && $('select[name="status_bapak"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if($(val).attr('class').includes('input-bapak') == false && $(val).attr('class').includes('input-ibu') == false && $(val).attr('class').includes('input-wali') == false){
              $(val).addClass('null-input');
              input = 1;
            }
           }
        });
        $.each($("select[required]"), function(index, val) {
           $(val).removeClass('null-input');
           if ($(val).val() == '') {
            if ($(val).attr('class').includes('input-wali') && $('select[name="status_wali"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-ibu') && $('select[name="status_ibu"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if ($(val).attr('class').includes('input-bapak') && $('select[name="status_bapak"]').val() == 'Hidup') {
              $(val).addClass('null-input');
              input = 1;
            }else if($(val).attr('class').includes('input-bapak') == false && $(val).attr('class').includes('input-ibu') == false && $(val).attr('class').includes('input-wali') == false){
              $(val).addClass('null-input');
              input = 1;
            }
           }
        });
        if (input && textarea && select == 0) {
          $.ajax({
            url: '<?= base_url() ?>index.php/Siswa/save_siswa',
            type: 'POST',
            dataType: 'json',
            data: cs,
          })
          .done(function(data_save) {
            $.ajax({
              url: '<?= base_url() ?>index.php/Siswa/up_image',
              type: 'POST',
              processData: false,
              contentType: false,
              dataType : 'json',
              data: new FormData($('#form_foto')[0]),
            })
            .done(function(data_image) {
              console.log(data_image.data);
              $.ajax({
                url: '<?= base_url() ?>index.php/Siswa/update_image/'+data_save,
                type: 'POST',
                data: {foto: data_image.data.file_name},
              })
              .done(function() {
                window.location.href = "<?= base_url('siswa') ?>"
              });
            });
          });
        }else{
          Swal.fire('Lengkapi Form','Cek kembali form Anda','warning')
        }
      });
    </script>