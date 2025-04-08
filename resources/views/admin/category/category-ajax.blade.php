<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h5 class="card-title mb-0">Data Kategori</h5>
            </div>
            <div class="float-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal" class="btn btn-outline-dark rounded-pill"><i class="mdi mdi-plus"></i> Kategori</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tableCategories">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Diperbarui Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_categories">
                        <!-- Skeleton loader -->
                        @for ($i = 0; $i < 5; $i++)
                            <tr class="skeleton-row">
                                <td colspan="5">
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-12"></span>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>