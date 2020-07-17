<body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
        </ul>
        <div class="container">
            <!-- Codrops top bar -->
            <header>
                <h1><?= $title ?> <?= $description ?></h1>
                <div class="s003">

<form method="GET" action="<?= base_url('opac/carijudul/')?>">
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input name="cariall" id="cariall" type="text" placeholder="Judul / ISBN / Pengarang / Penerbit"/>
          <?php  if (options('signin_opac') == '1') {?>
           Anda Login Sebagai <i><a href="<?= base_url('auth/logoutmember/')?>"><?= $this->session->userdata('nama'); ?> Logout</a></i>
          <?php }?>
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
</header>
        </div>
    </body>