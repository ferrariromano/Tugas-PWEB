
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clinic PWEB</title>
    <!-- Favicon-->
    <!-- Font Awesome icons (free version)-->
    <link rel="shortcut icon" href="{{ URL::to('assets/images/klinik.png') }}">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"
        integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles-index.css" rel="stylesheet" />
</head>



<body id="page-top" onload="initClock()">

  <!------------------------------ loading loading spinner ------------------------------>
    <div class="spinner-wrapper text-light">
        <div class="spinner-border" role="status">
        </div>
      </div>

    <style>
        .spinner-wrapper {
            background-color: #1ABC9C;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.2s;
        }
        .spinner-border {
            height: 66px;
            width: 66px;
        }
    </style>
    <script>
        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
        window.addEventListener('load', ()=> {
            spinnerWrapperEl.style.opacity = '0';
            setTimeout(()=> {
                spinnerWrapperEl.style.display = 'none';
            }, 200);
        })

    </script>
<!------------------------------ loading loading spinner ------------------------------>

<!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="" style=”float:left;
                    width="55";height="55"” />CLINIC PWEB</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <!--------------------------------------------------------Jam Navbar----------------------------------------------------------------------------------->
            <a href="#" class="nav-link disabled">
                <!--digital clock start-->
                <div class="datetime">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                <!--digital clock end-->
            </a>

            <!--------------------------------------------------------NAVBAR----------------------------------------------------------------------------------->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">Tentang Klinik</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">Daftar Dokter Poli</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">About Us</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('login') }}">Login</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <!--------------------------------------------------------Bagian Isi Konten Teratas----------------------------------------------------------------------------------->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="{{ URL::to('assets/images//logo/logopersegi.png') }}" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Klinik PWEB</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-hospital"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Universitas Jember - Informatika</p>
        </div>
    </header>
    <!--------------------------------------------------------Bagian Isi Konten----------------------------------------------------------------------------------->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">

            <div class="row justify-content-between gy-4">

              <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                <div class="content">
                  <h3>CERITA KAMI.</h3>
                  <p>Kami adalah mahasiswa jurusan teknik informatika yang menempuh mata kuliah pemrograman berbasis website. Dalam mata kuliah ini,
                    kami mempelajari konsep dasar tentang pembuatan website dan aplikasi web, termasuk HTML, CSS, JavaScript, PHP, dan MySQL terutama Laravel. Dalam semester ini,
                    kami diminta untuk membuat proyek akhir dalam bentuk website dan memilih topik sesuai dengan minat.
                    Kami kemudian memutuskan untuk membuat aplikasi web untuk klinik yang menyediakan pelayanan kesehatan kepada masyarakat secara online.
                  <p>Proyek akhir ini disebut Pweb Klinik dan dirancang untuk membantu pasien dalam mencari informasi seputar klinik, dokter, jadwal praktek,
                    Selama proses pengembangan, kami menghadapi berbagai kendala seperti kesulitan dalam mengatur database dan menyesuaikan tampilan website agar mudah digunakan oleh pengguna.Namun,
                    dengan semangat dan kerja keras tim, kami berhasil menyelesaikan proyek akhir dengan baik dan mendapatkan nilai yang memuaskan dari dosen. Proyek akhir ini tidak hanya memberikan pengalaman berharga dalam dunia pemrograman berbasis website,
                    tetapi juga bermanfaat bagi yang membutuhkan pelayanan secara online.</p>
                </div>
              </div>


              <div class="col-md-6 col-lg-6 g-overflow-hidden align-self-end">
                <img class="landing-block-node-img js-animation slideInUp img-fluid" src="/assets/img/klinikgambar.png" />
              </div>

            </div>

          </div>
    </section>


    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0 text-center" id="about">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">Cek Daftar Dokter</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-pencil"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <a class="btn btn-xl btn-outline-light" href="{{ URL::to('jadwal_home') }}">
                <i class="fas fa-book me-2"></i>
                CEK DISINI
            </a>
    </section>
    <!--------------------------------------------------------Kontak Klinik----------------------------------------------------------------------------------->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">About Us</h2>
            <!-- Icon Divider-->

            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="team-member px-4 py-5 border shadow-on-hover text-center">
                        <img src="{{ URL::to('assets/images/profile/augusta.png') }}" alt="">
                        <div class="team-member-content">
                            <h4 class="mb-2 mt-4">Augusta Ahmad Bintang Widigdo</h4>
                            <p class="mb-0">Project Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team-member px-4 py-5 border shadow-on-hover text-center">
                        <img src="{{ URL::to('assets/images/profile/ferrari.png') }}" alt="">
                        <div class="team-member-content">
                            <h4 class="mb-2 mt-4">Ferrari Romano</h4>
                            <p class="mb-0">Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team-member px-4 py-5 border shadow-on-hover text-center">
                        <img src="{{ URL::to('assets/images/profile/bagas.png') }}" alt="">
                        <div class="team-member-content">
                            <h4 class="mb-2 mt-4">Bagas Cahyo Purnomo</h4>
                            <p class="mb-0">System Analyis</p>
                        </div>
                    </div>
                </div>


            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </section>
    <!--------------------------------------------------------Footer----------------------------------------------------------------------------------->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Lokasi</h4>
                    <p class="lead mb-0">
                        Jl. Kalimantan Tegalboto No.37, Krajan Timur, Sumbersari,
                        <br />
                        Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Media Social</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/ferrariromano/Tugas-PWEB.git"><i
                        class="fa-brands fa-github"></i></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Tentang Klinik</h4>
                    <p class="lead mb-0">
                        Klinik PWEB dibangun sejak tahun 2023 untuk memenuhi tugas akhir pemograman berbasis website
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--------------------------------------------------------copyright----------------------------------------------------------------------------------->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Powered by &copy; KlinikPweb {{ env('APP_NAME') }} 2023</small></div>
    </div>
    <!-- Portfolio Modals-->


    <!--------------------------------------------------------Bootstrap JS----------------------------------------------------------------------------------->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




    <!--------------------------------------------------------fungsi jam----------------------------------------------------------------------------------->
    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hou >= 12) {
                pe = "PM";
            }
            if (hou == 0) {
                hou = 12;
            }
            if (hou > 12) {
                hou = hou - 12;
            }

            Number.prototype.pad = function(digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }

            var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for (var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>



</html>
