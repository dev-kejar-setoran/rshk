<div class="ui large modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Ubah Tanya Jawab
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="eight wide column">
          <div class="ui inline grid field">
            <label for="" class="six wide column">Judul</label>
            <div class="ten wide column" style="padding: 0">
              <input type="text" name="judul" placeholder="Judul topik">
            </div>
          </div>
        </div>
        <div class="eight wide column">
         <div class="ui inline grid field">
          <label class="six wide column">Kategori</label>
          <div class="ten wide column" style="padding: 0">
            <div class="ui fluid selection dropdown">
              <input type="hidden" name="user">
              <i class="dropdown icon"></i>
              <div class="default text">Pilih kategori...</div>
              <div class="menu">
                <div class="active item" data-value="apatel8">
                  Kardiovaskuler
                </div>
                <div class="item" data-value="janedoe">
                  Tips Kesehatan
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="ui grid">
      <div class="eight wide column">
        <div class="ui field">
          <div class="ui inline grid field">
            <label class="six wide column">User Pengirim</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid selection dropdown">
                <input type="hidden" name="user">
                <i class="dropdown icon"></i>
                <div class="default text">Pilih user...</div>
                <div class="menu">
                  <div class="active item" data-value="apatel8">
                    Alek Patel
                  </div>
                  <div class="item" data-value="janedoe">
                    Jane Doe
                  </div>
                  <div class="item" data-value="lala6">
                    Dudu Lala
                  </div>
                </div>
              </div>
            </div>
          </div>
          <label for="">Pertanyaan</label>
          <textarea name="short_desc" id="" cols="30" rows="10" class="short-desc editor" placeholder="">
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
          </textarea>
        </div>
      </div>
      <div class="eight wide column">
        <div class="ui inline grid field">
          <label class="six wide column">Dokter Tujuan</label>
          <div class="ten wide column" style="padding: 0">
            <div class="ui fluid selection dropdown">
              <input type="hidden" name="user">
              <i class="dropdown icon"></i>
              <div class="default text">Pilih dokter...</div>
              <div class="menu">
                <div class="active item" data-value="dr. AMIN TJUBANDI , Sp.BTKV">
                  <img class="ui mini avatar image" src="../../../img/avatar04.png">
                  dr. AMIN TJUBANDI , Sp.BTKV
                </div>
                <div class="item" data-value="dr ADE MEIDIAN AMBARI , SpJp">
                  <img class="ui mini avatar image" src="../../../img/avatar04.png">
                  dr ADE MEIDIAN AMBARI , SpJp
                </div>
                <div class="item" data-value="DR.dr. AMILIANA MARDIANI , Sp.JP(K)">
                  <img class="ui mini avatar image" src="../../../img/avatar04.png">
                  DR.dr. AMILIANA MARDIANI , Sp.JP(K)
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ui field">
          <label for="">Jawaban</label>
          <textarea name="short_desc" id="" cols="30" rows="10" class="short-desc editor" placeholder="">
            "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
          </textarea>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="actions">
  <div class="ui two columns grid">
    <div class="left aligned column">
      <div class="ui black deny button">
        Batal
      </div>
    </div>
    <div class="right aligned column">
      <div class="ui toggle checkbox" style="margin-right: 2rem">
        <input type="checkbox" name="public">
        <label>Close pertanyaan</label>
      </div>
      <div class="ui positive right labeled icon button">
        Simpan
        <i class="save icon"></i>
      </div>
    </div>
  </div>
</div>
</div>