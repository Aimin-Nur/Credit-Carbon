@include('layouts.header')
@include('admin.navbar')

<div class="container mt-3">
    <div class="col-lg-12">
        <div class="row row-cards">
          <div class="col-12">
            <form class="card" action="/editingArtikel/{{$getArtikel->id}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <h3 class="card-title">Edit Artikel</h3>
                <div class="row row-cards">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label">Foto Artikel</label>
                      <input name="field_foto" type="file" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Judul Artikel</label>
                      <input name="field_kategori" type="text" class="form-control" value="{{ old('field_kategori', $getArtikel->kategori) }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <select old="{{$getArtikel->status}}" name="field_status" class="form-control form-select">
                        <option value="">Pilih Status</option>
                        <option value="Publish" {{ old('field_status', $getArtikel->status) == 'Publish' ? 'selected' : '' }}>Publish</option>
                        <option value="Draf" {{ old('field_status', $getArtikel->status) == 'Publish' ? 'selected' : '' }}>Draf</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3 mb-0">
                        <label class="form-label">Artikel</label>
                        <textarea name="field_artikel" id="editor" value="{{ old('field_artikel', $getArtikel->isi) }}" rows="5" class="form-control"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'), {
                                    toolbar: {
                                        items: [
                                            'heading',
                                            '|',
                                            'bold',
                                            'italic',
                                            'underline',
                                            'outdent',
                                            '|',
                                            'link',
                                            'insertTable',
                                            'mediaEmbed',
                                            'blockquote',
                                            '|',
                                            'fontFamily',
                                            '|',
                                            'bulletedList',
                                            'numberedList',
                                            '|',
                                            'alignLeft',
                                            'alignCenter',
                                            'alignRight',
                                            'alignJustify',
                                            '|',
                                            'undo',
                                            'redo'
                                        ]
                                    },
                                    language: 'en'
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>

                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">Edit Artikel</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>


@include('layouts.footer')
@include('layouts.script')
