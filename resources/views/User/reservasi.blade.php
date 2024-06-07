@include('struktur.navbar')

<div class="container">
    <h3 class="text-center mt-3 mb-5">PESAN TEMPAT</h3>
    <div class="card p-5 mb-5">
        <form method="POST" action="{{ route('reservasi.store') }}" id="form1" onsubmit="return validateForm()">
            @csrf
            <label for="name">Nama Lengkap</label>
            <div class="form-group">
                <input name="name" type="text" placeholder="Masukan Nama lengkap Anda" class="form-control">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <label for="tgl">Tanggal Resevasi</label>
            <div class="form-group">
                <input type="date" class="form-control" id="tanggal" name="tanggal_event" value="DD-MM-YYYY">
            </div>

            <label for="tgl">Waktu Resevasi</label>
            <div class="form-group">
                <input type="time" class="form-control" id="waktu" name="waktu_event" min="08:00" max="22:00">
                <span id="time-error" class="text-danger" style="display: none;">Waktu reservasi harus antara 08:00 dan 22:00.</span>
            </div>

            <label for="rumah">Alamat</label>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Masukan Alamat">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <label for="telp">No. Telephone</label>
            <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxxxx">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label for="sts">Event</label>
                <select id="sts" class="form-control" name="event">
                    <option selected>Pilih...</option>
                    <option value="Arisan">Arisan</option>
                    <option value="Kumpul keluarga besar">Kumpul keluarga besar</option>
                    <option value="Reunian">Reunian</option>
                    <option value="Ulang Tahun">Ulang Tahun</option>
                </select>
            </div>

            <label for="nama">Jumlah Anggota</label>
            <div class="form-group">
                <input type="number" class="form-control" id="nama" name="jumlah_anggota"
                    placeholder="Masukkan Jumlah Anggota" min="2" max="30">
            </div>

            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>

@include('struktur.footer')

<script>
    function validateForm() {
        var waktu = document.getElementById('waktu').value;
        var timeError = document.getElementById('time-error');
        var time = waktu.split(':');
        var hour = parseInt(time[0]);
        var minute = parseInt(time[1]);

        if (hour < 8 || hour > 22 || (hour === 22 && minute > 0)) {
            timeError.style.display = 'block';
            return false;
        }
        timeError.style.display = 'none';
        return true;
    }
</script>
