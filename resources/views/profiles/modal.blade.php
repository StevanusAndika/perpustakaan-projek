<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form id="formEditProfile" action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            @if(Auth::user()->role == 'user')
            <div class="mb-3 col-md-6">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" name="nim" value="{{ old('nim', Auth::user()->nim) }}" required>
            </div>
            @endif


            <div class="mb-3 col-md-6">
              <label for="no_anggota" class="form-label">
                @if(Auth::user()->role === 'admin')
                  Nomor Pegawai
                @else
                  Nomor Anggota
                @endif
              </label>
              <input 
                type="text" 
                class="form-control" 
                name="no_anggota" 
                value="{{ old('no_anggota', Auth::user()->no_anggota) }}"
                placeholder="@if(Auth::user()->role === 'admin') NIP / lainnya @else - @endif"
                @if(Auth::user()->role !== 'admin') readonly @endif
              >
            </div>

            <div class="mb-3 col-md-6">
              <label for="no_telepon" class="form-label">No Telepon</label>
              <input type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon', Auth::user()->no_telepon) }}">
            </div>

            <div class="mb-3 col-md-6 position-relative">
              <label for="password" class="form-label">Password Baru</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
              <button type="button" class="btn btn-sm position-absolute end-0 me-2" style="top: 60%; transform: translateY(-50%);" onclick="togglePassword('password', this)">
                <i class="mdi mdi-eye-off mdi-24px"></i>
              </button>
            </div>

            <div class="mb-3 col-md-6 position-relative">
              <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
              <button type="button" class="btn btn-sm position-absolute end-0 me-2" style="top: 60%; transform: translateY(-50%);" onclick="togglePassword('password_confirmation', this)">
                <i class="mdi mdi-eye-off mdi-24px"></i>
              </button>
            </div>

            <div class="mb-3 col-12">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat">{{ old('alamat', Auth::user()->alamat) }}</textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" id="btnSimpan">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('mdi-eye');
      icon.classList.add('mdi-eye-off');
    } else {
      input.type = 'password';
      icon.classList.remove('mdi-eye-off');
      icon.classList.add('mdi-eye');
    }
  }

  document.getElementById('btnSimpan').addEventListener('click', function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Simpan Perubahan?',
      text: "Perubahan profil akan disimpan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Simpan!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('formEditProfile').submit();
      }
    });
  });
</script>
