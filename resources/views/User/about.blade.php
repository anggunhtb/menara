@include('struktur.navbar')

<div class="container">
  <div class="section section-01">
    <img src="{{ asset('FrontEnd/img/menara1.jpg') }}" alt="Image 1">
  </div>
  <div class="section section-02">
    <div class="text">
      <p>Lokasi yang berada tepat di pinggir jalan, lokasi yang strategis membuat Rumah makan ini gampang untuk di kunjungi, memiliki parkiran yang luas agar para pengunjung tidak bingung mencari tempat parkir dan tidak parkir sembarangan dipinggir jalan.</p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673.1560274946853!2d98.939014727551!3d2.667533068905753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ed1f8e9ce9ab%3A0x9ee8686c51dca26c!2sRM%20muslim%20MENARA!5e0!3m2!1sid!2sid!4v1713285245750!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="section section-03">
    <img src="{{ asset('FrontEnd/img/menara3.jpg') }}" alt="Image 2">
    <div class="text">
      <h2><strong>Waktu operasi:</strong></h2>
      <ul>
      <li>Senin – Jumat   : 08.00-22.00WIB</li>
      <li>Sabtu –	Minggu  : 10.00-22.00WIB</li>
      </ul>
    </div>
  </div>
</div>

@include('struktur.footer')
