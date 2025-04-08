{{-- Modal Tambah Kategori --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <form action="{{ route('admin.category.store') }}" method="POST">

        @csrf
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="add_nama" name="category_name" placeholder="Nama Kategori">
                    <textarea class="form-control" id="add_deskripsi" name="deskripsi" placeholder="Tambah Deskripsi"></textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Modal Edit Kategori --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <form id="editCategoryForm">
        @csrf
        @method('PUT')
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <input type="text" class="form-control" id="edit_nama" name="category_name" >
                    <textarea class="form-control" id="edit_deskripsi" name="description"></textarea>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
