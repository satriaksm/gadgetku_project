
<div class="form-kredit">
<h1 class="text-white fw-bold text-center">Simulasi Kredit <span>Gadget</span></h1>
        <form id="simulasiForm" action="index.php?target=data2" method="post" enctype="multipart/form-data">
          <table
            class="table table-sm table_custom table-borderless align-middle"
          >
            <tbody>
              <tr>
                <td>
                  <label for="hargaBarang" class="form-label"
                    >Harga Barang</label
                  >
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control bg-dark text-white"
                    id="hargaBarang"
                    name="hargaBarang"
                    required
                  /> Rupiah <br>
                  <div class="hasilSimulasi"></div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="bungaPinjaman" class="form-label"
                    >Bunga Pinjaman Flat <span>(5% - 10%)</span></label
                  >
                </td>
                <td>
                  <select class="form-select bg-dark text-white" name="bungaPinjaman" id="bungaPinjaman">
                    <option value="5">5%</option>
                    <option value="6">6%</option>
                    <option value="7" selected>7%</option>
                    <option value="8">8%</option>
                    <option value="9">9%</option>
                    <option value="10">10%</option>
                  </select> /Tahun
                </td>
              </tr>
              <tr>
                <td>
                  <label for="uangMuka" class="form-label"
                    >Uang Muka <span>(30% - 100%)</span> </label
                  >
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control bg-dark text-white"
                    id="uangMuka"
                    name="uangMuka"
                    min="30"
                    max="100"
                    required
                  /> % <br>
                  <div class="hasilSimulasi"></div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="jangkaWaktu" class="form-label"
                    >Jangka Waktu (Tenor)<span> (1 - 5 Tahun)</span></label
                  >
                </td>
                <td>
                  <select class="form-select bg-dark text-white" name="jangkaWaktu" id="jangkaWaktu">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select> Tahun
                </td>
              </tr>
              <tr>
              <td colspan="2" class="button-form">
                <input type="submit" class="btn btn-dark" value="Hitung">
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>

