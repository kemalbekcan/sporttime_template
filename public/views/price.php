<img class="price-page__img" src="./img/Price-banner.jpg" alt="banner" />
    <section class="price">
      <h2 class="price__title">PAKETLERİMİZ</h2>
      <p class="price__description">
        Sağlıklı ve aktif bir yaşam tarzına adım atmak için paketlerimiz
      </p>
      <div class="price__cards">
      <?php
        $mysqli = new mysqli("localhost", "root", "", "solidtemp");

        if ($mysqli->connect_error) { 
          die("Connection failed: " . $mysqli->connect_error); 
        }

        $stmt = $mysqli->prepare("SELECT p.id, p.months, p.price, p.slug, p.title, GROUP_CONCAT(f.feature_title SEPARATOR ', ') AS features
                                  FROM package AS p
                                  INNER JOIN package_features AS pf ON p.id = pf.packageId
                                  INNER JOIN features AS f ON pf.featureId = f.id
                                  GROUP BY p.id");

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class="price-card">
                    <h4 class="price-card__description">'. $row["title"] . '</h4>
                    <h2 class="price-card__title">₺'. $row["price"] .'</h2>
                    <ul class="price-card__tags">';
            
            $features = explode(", ", $row["features"]);
            foreach ($features as $feature) {
              echo '<li class="price-card__tag">'. $feature .'</li>';
            }

            echo '</ul>
                  <button class="btn-secondary">
                    <a href="/sporttime_template/public/on-kayit?package='. $row["slug"] .'">Paketi Seç</a>
                  </button>
                  </div>';
            }
          } else {
            echo "No records found";
          }
          $stmt->close();
          $mysqli->close();
      ?>
      </div>
    </section>
    <section class="line__gallery">
      <div class="line__gallery__images">
        <img class="line__gallery__image" src="./img/Sporttime-1.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-2.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-3.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-4.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-5.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-17.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-18.jpg" alt="" />
        <img class="line__gallery__image" src="./img/Sporttime-19.jpg" alt="" />
      </div>
    </section>
    
    <script>
      
    </script>