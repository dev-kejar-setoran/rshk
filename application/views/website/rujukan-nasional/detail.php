<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../../../semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="../../../css/app.css">

  <!-- <link rel="stylesheet" href="../../../plugins/tinymce/summernote.css"> -->
  <style type="text/css">
  .ui.file.input input[type="file"] {
    display: none;
  }
  .ui.button>.ui.floated.label {
    position: absolute;
    top: 15px;
    right: -10px;
  }
  .table tr th{
    white-space: nowrap;
  }
  .mce-tinymce {
    border: 1px solid rgba(34,36,38,.15)!important;
    box-shadow: none!important; 
    border-radius: 4px;
  }
</style>
<!-- @yield('css') -->
<!-- @yield('styles') -->
</head>

<body id="app">

  <header>
    <?php include('../../../partials/header.php'); ?>
  </header>

  <div class="ui sidebar inverted visible vertical menu">
    <?php include('../../../partials/sidebar.php'); ?>
  </div>

  <div id="cover">
    <div class="ui active inverted dimmer">
      <div class="ui text loader">Loading</div>
    </div>
  </div>
  <div class="pusher content shown">
    <message></message>
    <div class="main ui fluid container" id="main-container">
      <div class="title-container">
        <div class="ui breadcrumb">
          <a href="#" class="section"><i class="home icon"></i></a>
          <i class="right chevron icon divider"></i>
          <a href="#" class="section">Website</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Rujukan Nasional</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Form Rujukan Nasional
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui attached top segment">

            <form class="ui data form" id="dataForm" action="#" method="POST"">
              <div class="ui grid">
                <div class="ten wide column">
                  <div class="ui field">
                    <div class="ui big input">
                      <input type="text" name="judul" placeholder="Judul Rujukan Nasional">
                    </div>
                  </div>
                  
                  <div class="ui styled fluid accordion">
                    <div class="active title">
                      <i class="dropdown icon"></i>
                      Pengantar
                    </div>
                    <div class="active content">
                      <div class="transition">
                        <textarea name="pengantar" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Profil
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <textarea name="profil" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Kinerja
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <textarea name="kinerja" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Penelitian
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <textarea name="penelitian" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Jejaring
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <textarea name="jejaring" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Prosedur
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <textarea name="prosedur" id="" class="editor" style="min-height: 24rem"></textarea>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Agenda
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <table class="ui celled table listTable agenda">
                          <thead class="center aligned">
                            <tr>
                              <th class="six wide column">Judul</th>
                              <th>Deskripsi</th>
                              <th class="one wide column"><button type="button" data-content="Tambah Data" data-id="" class="ui mini green icon modal-add button"><i class="plus icon"></i></button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="ui grid field" style="width: 100%">
                                  <input type="text" name="judul[]" placeholder="Nama Agenda">
                                </div>
                                <div class="ui grid field" style="width: 100%">
                                  <input type="text" name="periode[]" placeholder="Tahun Periode">
                                </div>
                              </td>
                              <td><textarea name="deskripsi[]" cols="100%" rows="5"></textarea></td>
                              <td class="center aligned"><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>
                            </tr>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Fasilitas
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <table class="ui celled table listTable fasilitas">
                          <thead class="center aligned">
                            <tr>
                              <th class="six wide column">Detail</th>
                              <th>Gambar</th>
                              <th class="one wide column"><button type="button" data-content="Tambah Data" data-id="" class="ui mini green icon modal-add button"><i class="plus icon"></i></button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="ui grid field" style="width: 100%">
                                  <input type="text" name="judul[]" placeholder="Nama">
                                </div>
                                <div class="ui grid field" style="width: 100%">
                                  <textarea name="deskripsi[]" cols="100%" rows="5"></textarea>
                                </div>
                              </td>
                              <td>
                                <div class="field image-container">
                                  <span class="image-preview" style="height: 100px">Pilih Gambar</span>
                                  <div class="ui fluid file input action">
                                    <input type="text" readonly="">
                                    <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
                                    <div class="ui blue button file">
                                      Cari...
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="center aligned"><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>
                            </tr>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Layanan
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <table class="ui celled table listTable layanan">
                          <thead class="center aligned">
                            <tr>
                              <th class="six wide column">Detail</th>
                              <th>Gambar</th>
                              <th class="one wide column"><button type="button" data-content="Tambah Data" data-id="" class="ui mini green icon modal-add button"><i class="plus icon"></i></button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="ui grid field" style="width: 100%">
                                  <input type="text" name="judul[]" placeholder="Nama">
                                </div>
                                <div class="ui grid field" style="width: 100%">
                                  <textarea name="deskripsi[]" cols="100%" rows="5"></textarea>
                                </div>
                              </td>
                              <td>
                                <div class="field image-container">
                                  <span class="image-preview" style="height: 100px">Pilih Gambar</span>
                                  <div class="ui fluid file input action">
                                    <input type="text" readonly="">
                                    <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
                                    <div class="ui blue button file">
                                      Cari...
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="center aligned"><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>
                            </tr>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div>
                    </div>

                    <div class="title">
                      <i class="dropdown icon"></i>
                      Tim
                    </div>
                    <div class="content">
                      <div class="transition hidden">
                        <table class="ui celled table listTable tim">
                          <thead class="center aligned">
                            <tr>
                              <th class="six wide column">Detail</th>
                              <th>Gambar</th>
                              <th class="one wide column"><button type="button" data-content="Tambah Data" data-id="" class="ui mini green icon modal-add button"><i class="plus icon"></i></button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="ui grid field" style="width: 100%">
                                  <input type="text" name="nama[]" placeholder="Nama">
                                </div>
                                <div class="ui grid field" style="width: 100%">
                                  <select name="jabatan[]" id="" class="ui dropdown selection">
                                    <option value="">Pilih</option>
                                    <option value="1">Senior Konsultan</option>
                                    <option value="2">Kepala Departemen</option>
                                  </select>
                                </div>
                              </td>
                              <td>
                                <div class="field image-container">
                                  <span class="image-preview" style="height: 100px">Pilih Gambar</span>
                                  <div class="ui fluid file input action">
                                    <input type="text" readonly="">
                                    <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
                                    <div class="ui blue button file">
                                      Cari...
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="center aligned"><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>
                            </tr>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="six wide column">
                  <div class="field image-container">
                    <span class="image-preview" style="height: 180px">Pilih Gambar</span>
                    <div class="ui fluid file input action">
                      <input type="text" readonly="">
                      <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
                      <div class="ui blue button file">
                        Cari...
                      </div>
                    </div>
                  </div>
                  <!-- <div class="field">
                    <label for="">Status</label>
                    <select name="status" id="" class="ui dropdown selection">
                      <option value="">Pilih status</option>
                      <option value="1">Draft</option>
                      <option value="2">Published</option>
                    </select>
                  </div> -->
                  <div class="ui divider"></div>
                  <div class="field">
                    <label for="">Aksesibilitas</label>
                    <input type="text" name="aksesibilitas_koordinat" placeholder="Koordinat">
                  </div>
                  <div class="field">
                    <textarea name="aksesibilitas_alamat" cols="100%" rows="4" placeholder="Alamat"></textarea>
                  </div>
                  <div class="field">
                    <input type="text" name="aksesibilitas_telepon" placeholder="Telepon">
                  </div>
                  <div class="field">
                    <input type="email" name="aksesibilitas_email" placeholder="Email">
                  </div>
                  <div class="field">
                    <textarea name="short_desc" id="" cols="30" rows="10" class="short-desc" placeholder="Deskripsi Singkat"></textarea>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="ui attached bottom segment">
            <div class="ui two column grid">
              <div class="left aligned column">
                <div class="ui labeled icon button" onclick="window.history.back()">
                  <i class="chevron left icon"></i>
                  Kembali
                </div>
              </div>
              <div class="right aligned column">
                <div class="ui buttons">
                  <button type="button" class="ui button save as drafting positive">Draft</button>
                  <div class="or"></div>
                  <button type="button" class="ui button save as publicity teal">Publish</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php include('../../../partials/footer.php'); ?>

    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>

  <script>
  </script>
  <!-- <script src="../../../js/es6-promise.auto.min.js"></script> -->

  <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../../../plugins/jQuery/jquery.form.min.js"></script>
  <script src="../../../plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../../../plugins/fastclick/fastclick.js"></script>
  <script src="../../../plugins/sweetalert/sweetalert2.min.js"></script>
  <script src="../../../semantic/semantic.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>
  <script src="../../../plugins/tinymce/tinymce.min.js"></script>
  <script src="../../../plugins/tinymce/jquery.tinymce.min.js"></script>
  <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->

  <script>
    function openPage(){
      // var url = 'http://' . $_SERVER['HTTP_HOST'] . '/pjnhk-new-mockup/pages/website/Rujukan Nasional/detail.php';
      // var url = window.location.href;
      var url = window.location.origin + '/pjnhk-new-mockup/pages/website/rujukan-nasional/detail.php'
      window.location.assign(url)

    }
    $(document).ready(function() {
      tinymce.init({ selector:'.editor', menubar: false});

      $('.ui.dropdown').dropdown()

      $('.modal-edit').on('click', function(event) {
        event.preventDefault();

        row = $(this).closest('tr')

      });
      $('.listTable.agenda').on('click', '.modal-add', function(event) {
        event.preventDefault();
        table = $(this).closest('tbody tr:last-child')
        $('.listTable.agenda').append("<tr>" +
          "<td><div class='ui grid field' style='width: 100%'><input type='text' name='judul[]' placeholder='Nama'></div>" +
          "<div class='ui grid field' style='width: 100%'><input type='text' name='periode[]' placeholder='Tahun Periode'></div></td>"+
          "<input type='text' name='title[]' placeholder='Gelar yang dberikan'></td>" +
          "<td><textarea name='deskripsi[]' cols='100%' rows='5'></textarea></td>" +
          "<td class='center aligned' ><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>" +
          "</tr>");
      })
      $('.listTable.agenda').on('click', '.modal-delete', function(event) {
        event.preventDefault();
        table = $(this).closest('tr')
        table.remove()
      })

      $('.listTable.fasilitas').on('click', '.modal-add', function(event) {
        event.preventDefault();
        table = $(this).closest('tbody tr:last-child')
        $('.listTable.fasilitas').append("<tr>"+
          "<td>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<input type='text' name='judul[]' placeholder='Nama'>"+
          "</div>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<textarea name='deskripsi[]' cols='100%' rows='5'></textarea>"+
          "</div>"+
          "</td>"+
          "<td>"+
          "<div class='field image-container'>"+
          "<span class='image-preview' style='height: 100px'>Pilih Gambar</span>"+
          "<div class='ui fluid file input action'>"+
          "<input type='text' readonly>"+
          "<input type='file' class='ten wide column' id='attachment' name='attachment[]' autocomplete='off' multiple>"+
          "<div class='ui blue button file'>Cari...</div>"+
          "</div>"+
          "</div>"+
          "</td>"+
          "<td class='center aligned'><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>"+
          "</tr>");
      })
      $('.listTable.fasilitas').on('click', '.modal-delete', function(event) {
        event.preventDefault();
        table = $(this).closest('tr')
        table.remove()
      })

      $('.listTable.layanan').on('click', '.modal-add', function(event) {
        event.preventDefault();
        table = $(this).closest('tbody tr:last-child')
        $('.listTable.layanan').append("<tr>"+
          "<td>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<input type='text' name='judul[]' placeholder='Nama'>"+
          "</div>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<textarea name='deskripsi[]' cols='100%' rows='5'></textarea>"+
          "</div>"+
          "</td>"+
          "<td>"+
          "<div class='field image-container'>"+
          "<span class='image-preview' style='height: 100px'>Pilih Gambar</span>"+
          "<div class='ui fluid file input action'>"+
          "<input type='text' readonly>"+
          "<input type='file' class='ten wide column' id='attachment' name='attachment[]' autocomplete='off' multiple>"+
          "<div class='ui blue button file'>Cari...</div>"+
          "</div>"+
          "</div>"+
          "</td>"+
          "<td class='center aligned'><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>"+
          "</tr>");
      })
      $('.listTable.layanan').on('click', '.modal-delete', function(event) {
        event.preventDefault();
        table = $(this).closest('tr')
        table.remove()
      })
      $('.listTable.tim').on('click', '.modal-add', function(event) {
        event.preventDefault();
        table = $(this).closest('tbody tr:last-child')
        $('.listTable.tim').append("<tr>"+
          "<td>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<input type='text' name='judul[]' placeholder='Nama'>"+
          "</div>"+
          "<div class='ui grid field' style='width: 100%'>"+
          "<select name='jabatan[]' id='' class='ui dropdown selection'>"+
          "<option value=''>Pilih</option>"+
          "<option value='1'>Senior Konsultan</option>"+
          "<option value='2'>Kepala Departemen</option>"+
          "</select>"+
          "</div>"+
          "</td>"+
          "<td>"+
          "<div class='field image-container'>"+
          "<span class='image-preview' style='height: 100px'>Pilih Gambar</span>"+
          "<div class='ui fluid file input action'>"+
          "<input type='text' readonly>"+
          "<input type='file' class='ten wide column' id='attachment' name='attachment[]' autocomplete='off' multiple>"+
          "<div class='ui blue button file'>Cari...</div>"+
          "</div>"+
          "</div>"+
          "</td>"+
          "<td class='center aligned'><button type='button' data-content='Hapus Data' class='ui mini red icon modal-delete button'><i class='trash icon'></i></button></td>"+
          "</tr>");
        $('.ui.dropdown.selection').dropdown()
      })
      $('.listTable.tim').on('click', '.modal-delete', function(event) {
        event.preventDefault();
        table = $(this).closest('tr')
        table.remove()
      })
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>
</body>
</html>
