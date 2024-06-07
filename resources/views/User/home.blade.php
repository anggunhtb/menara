@extends("struktur.layout")
@section("content")
@include('sweetalert::alert')

    <!-- Blog Start -->
    
    <!-- Blog End -->
    <section class="slider_section ">
      <div class="container ">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="detail-box">
              <h1>
                welcome
              </h1>
              <h2>
                RUMAH MAKAN MENARA
              </h2>
              <h4>
              "Nikmati Setiap Suapan, Sajian Khas Kami Selalu Menghangatkan Hati dan Mengenyangkan Perut".
              </h4>
          </div>
        </div>
      </div>
    </section>
    <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Best Popular Recipes
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">
            <div class="img-box">
            <img src="{{ asset('FrontEnd/img/r1.jpg') }}" class="box-img" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Makanan
              </h4>
              <a href="">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">
            <div class="img-box">
            <img src="{{ asset('FrontEnd/img/r3.jpg') }}" class="box-img" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Minuman
              </h4>
              <a href="">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="/order">
          Order Now
        </a>
      </div>
    </div>
  </section>
    <section class="app_section">
    <div class="container">
      <div class="col-md-9 mx-auto">
        <div class="row">
          <div class="col-md-7 col-lg-8">
            <div class="detail-box">
              <h2>
                <span> </span> <br>
                
              </h2>
              <p>
                
              </p>
              <div class="app_btn_box">
                <a href="" class="mr-1">
                  <img src="images/google_play.png" class="box-img" alt="">
                </a>
                <a href="">
                  <img src="images/app_store.png" class="box-img" alt="">
                </a>
                <img src="{{ asset('FrontEnd/img/menara3.jpg') }}" class="box-img" alt="">

              </div>
              </a>
            </div>
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="img-box">
            <div class="text">
        <p>Waktu operasi :</p>
        <li>Senin – Jumat   : 08.00-22.00WIB</li>
        <li>Sabtu –	Minggu  : 10.00-22.00WIB</li>
    </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <section class="about_section layout_padding">
    <div class="container">
      <div class="col-md-11 col-lg-10 mx-auto">
        <div class="heading_container heading_center">
          <h2>
            About Us
          </h2>
        </div>
        <div class="box">
          <div class="col-md-7 mx-auto">
            <div class="img-box">
            <img src="{{ asset('FrontEnd/img/ikan.jpg') }}" class="box-img" alt="">
            </div>
          </div>
          <div class="detail-box">
            <p>
            Selamat datang di Rumah Makan Menara, tempat di mana setiap hidangan adalah perpaduan sempurna antara cita rasa autentik dan kualitas terbaik. 
            Di sini, kami percaya bahwa makanan adalah seni yang harus dinikmati dengan semua indra. Dari aroma harum yang menyambut Anda saat pertama kali melangkah masuk, hingga rasa lezat yang tersisa di lidah Anda, setiap detail dipikirkan dengan seksama untuk memberikan pengalaman kuliner yang tak terlupakan.
            Dimasak dengan bahan-bahan segar pilihan dan resep turun-temurun yang kaya akan tradisi, setiap menu kami mencerminkan dedikasi dan kecintaan kami terhadap seni memasak. 
            Nikmati kehangatan suasana yang ramah dan pelayanan yang tulus, membuat Anda merasa seperti di rumah sendiri. 
            Apakah Anda datang untuk makan siang santai, makan malam keluarga, atau merayakan momen istimewa, Rumah Makan Menara selalu siap menyajikan hidangan yang tidak hanya memuaskan rasa lapar Anda, tetapi juga menyentuh hati Anda. 
            Temukan kebahagiaan dalam setiap gigitan dan biarkan kami membawa Anda dalam perjalanan rasa yang tiada duanya. Ayo, datang dan rasakan sendiri mengapa Rumah Makan Menara menjadi pilihan utama bagi para pecinta kuliner di kota ini. 
            Kami menantikan kunjungan Anda dan siap memberikan pengalaman bersantap yang melampaui harapan Anda.
            </p>
            <a href="/aboutus">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a> -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/FrontEnd/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/FrontEnd/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/FrontEnd/js/main.js')}}"></script>
  </body>
</html>
@endsection