
<section class="content container-fluid container-md mb-md-5 mt-md-3">
  <div class="row">
    <div class="col-md-9 ">
      <form method="POST" name="pos" id="formWarga">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="uid" />
        <div class="card bg-emerald-300 ">
          <div class="card-header bg-cyan ">
            <h3 class="card-title">Tambah Data Penduduk</h3>
          </div>

        <div class="card-body">
            <div class="row">
              <div class="col-7">
                <label for="no_kk">NO KK</label>
                <input  name="no_kk" id="no_kk" type="text" class="form-control" placeholder="Nomor KK">
              </div>
              <div class="col-5">
                <label for="no_nik">NIK</label>
                <input name="no_nik" id="no_nik" type="text" class="form-control" placeholder="NIK">
              </div>
            </div>
          <br>
            <div class="row">
              <div class="col-7">
                <label for="nama">Nama</label>
                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Lengakap">
              </div>
              <div class="form-group mt-3 mx-1 col-4 row">
                <div class="form-check mt-4 row col-6">
                  <input class="form-check-input" type="radio" name="radio" checked='' value="L">
                  <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check mt-4 row col-6">
                  <input class="form-check-input" type="radio" name="radio"  value="P">
                  <label class="form-check-label">Perempuan</label>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-7">
                <label for="tgl_lahir">Tangal Lahir</label>
                <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control" placeholder="dd/mm/yyyy">
              </div>
              <div class="form-group col-5">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                  <option >Pilih</option>
                  <option>Menikah</option>
                  <option>Lajang</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" id="button-sub" class="btn btn-primary">Submit</button>
            </div>
          </div>
      </form>
    </div>
  </div>
  @include('layout/component/card_info')
</section>