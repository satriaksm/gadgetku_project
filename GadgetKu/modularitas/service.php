
<div class="form">
  <h1 class="text-white fw-bold text-center">Service <span>Form</span></h1>
        <form action="index.php?target=data1" method="post" enctype="multipart/form-data">
          <table
            class="table table-sm table_custom table-borderless align-middle"
          >
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <tbody>
              <tr>
                <td>
                  <label for="yourName" class="form-label"
                    >Nama<span>*</span></label
                  >
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control bg-dark text-white"
                    id="yourName"
                    name="name"
                    required
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourNumber" class="form-label"
                    >No. Telepon<span>*</span></label
                  >
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control bg-dark text-white"
                    id="yourNumber"
                    name="number"
                    required
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourEmail" class="form-label"
                    >Email address<span>*</span></label
                  >
                </td>
                <td>
                  <input
                    type="email"
                    class="form-control bg-dark text-white"
                    id="yourEmail"
                    name="email"
                    required
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourGadget" class="form-label"
                    >Merek Gadget<span>*</span></label
                  >
                </td>
                <td>
                  <select class="form-select bg-dark text-white" name="memType">
                    <option value="Vivo">Vivo</option>
                    <option value="Oppo">Oppo</option>
                    <option value="Xiaomi" selected>Xiaomi</option>
                    <option value="Itel">Itel</option>
                    <option value="Asus">Asus</option>
                    <option value="Iphone">Iphone</option>
                    <option value="Infinix">Infinix</option>
                    <option value="Advan">Advan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourBuyDate" class="form-label"
                    >Tanggal Pembelian</label
                  >
                </td>
                <td>
                  <input
                    type="date"
                    class="form-control bg-dark text-white"
                    id="yourBuyDate"
                    name="buyDate"
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourComplaint" class="form-label"
                    >Masalah/Keluhan<span>*</span></label
                  >
                </td>
                <td>
                  <textarea
                    class="form-control bg-dark text-white"
                    id="yourComplaint"
                    name="complaint"
                    required
                  ></textarea>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourExperience" class="form-label"
                    >Apakah pernah mengalami hal berikut?</label
                  >
                </td>
                <td>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="tenggelam"
                      value="Tenggelam"
                      name="experience[]"
                    />
                    <label class="form-check-label" for="tenggelam"
                      >Tenggelam (Terkena Air berlebih)</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="terjatuh"
                      value="Terjatuh"
                      name="experience[]"
                    />
                    <label
                      class="form-check-label"
                      for="terjatuh"
                      value="terjatuh"
                      >Terjatuh (Terbentur secara keras)</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="overheat"
                      value="Overheat"
                      name="experience[]"
                    />
                    <label
                      class="form-check-label"
                      for="overheat"
                      value="overheat"
                      >Overheat (Mengeluarkan panas berlebih)</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="lagging"
                      value="Lagging"
                      name="experience[]"
                    />
                    <label class="form-check-label" for="lagging"
                      >Lagging (Patah-patah/Freeze/Hang)</label
                    >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourComplaint" class="form-label"
                    >Masa Garansi<span>*</span></label
                  >
                </td>
                <td>
                  <div
                    class="btn-group"
                    role="group"
                    aria-label="Basic radio toggle button group"
                  >
                    <input
                      type="radio"
                      class="btn-check"
                      name="garansi"
                      id="berlaku"
                      value=on
                      autocomplete="off"
                      checked
                    />
                    <label class="btn btn-outline-warning" for="berlaku"
                      >Masih Berlaku</label
                    >

                    <input
                      type="radio"
                      class="btn-check"
                      name="garansi"
                      id="hangus"
                      value=off
                      autocomplete="off"                    />
                    <label class="btn btn-outline-danger" for="hangus"
                      >Telah Hangus</label
                    >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourReceipt" class="form-label"
                    >Kwitansi Pembelian (Jika ada)</label
                  >
                </td>
                <td>
                  <div class="mb-3">
                    <input
                      type="file"
                      class="form-control bg-dark text-white"
                      id="yourReceipt"
                      name="receipt"
                    />
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="yourNote" class="form-label"
                    >Catatan Tambahan</label
                  >
                </td>
                <td>
                  <textarea
                    class="form-control bg-dark text-white"
                    id="yourNote"
                    name="note"
                    required
                  ></textarea>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="button-form">
                  <input type="reset" class="btn btn-secondary" value="Reset" />
                  <input type="submit" class="btn btn-dark" value="Simpan" />
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>