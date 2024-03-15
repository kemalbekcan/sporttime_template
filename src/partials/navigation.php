<header class="desktop-header">
  <div class="navbar">
    <div class="navbar-inner">
      <a id="logo" href="/sporttime_template/public/anasayfa" alt="Sporttime Fitness Center">
        <img src="./img/sporttime-fitness-center.png" alt="Sporttime Fitness Center" width="182" height="48" />
      </a>
      <ul class="nav text-sm">
        <li>
          <a href="/sporttime_template/public/anasayfa" title="Anasayfa">
            <?php if ($request === '/sporttime_template/public/anasayfa') {
              echo '<span class="active">Anasayfa</span>';
            } else {
              echo '<span>Anasayfa</span>';
            } ?>
          </a>
        </li>
        <li>
          <a href="/sporttime_template/public/hakkimizda" title="Hakkımızda">
            <span>Hakkımızda</span>
          </a>
        </li>
        <li>
          <a href="/sporttime_template/public/iletisim" title="İletişim">
          <?php if ($request === '/sporttime_template/public/iletisim') {
              echo '<span class="active">İletişim</span>';
            } else {
              echo '<span>İletişim</span>';
            } ?>  
          </a>
        </li>
        <li>
          <a href="/sporttime_template/public/galeri" title="Galeri">
            <?php if ($request === '/sporttime_template/public/galeri') {
              echo '<span class="active">Galeri</span>';
            } else {
              echo '<span>Galeri</span>';
            } ?>
          </a>
        </li>
        <li>
          <a href="/sporttime_template/public/paketler" title="Paketler">
            <?php if ($request === '/sporttime_template/public/paketler') {
              echo '<span class="active">Paketler</span>';
            } else {
              echo '<span>Paketler</span>';
            } ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>