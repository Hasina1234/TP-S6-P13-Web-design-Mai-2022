

 
  

    <!-- ======= Breadcrumbs Section ======= -->
    <!-- Breadcrumbs Section -->
    <div class="section-title"  data-aos-delay="100">
         <h1><h2><?php echo $h1 ?><h2></h1>
        </div>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                   <img src="<?php echo img_loader($listePays[0]['photo']); ?>" class="img-fluid" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Info actualité</h3>
              <ul>
                 <?php for ($i=0; $i < count($listePays); $i++) { ?>  
                <li><strong>Category</strong>: <?php echo $listePays[$i]['categorie']; ?></li>
                <li><strong>Titre</strong>: <?php echo $listePays[$i]['titre']; ?></li>
                <li><strong>Date actu</strong>: <?php echo $listePays[$i]['dateActu']; ?></li>
               
                <?php } ?>
              </ul>
            </div>
            <div class="portfolio-description">
              <?php for ($i=0; $i < count($listePays); $i++) { ?>  
              <h2><?php echo $listePays[$i]['pays']; ?></h2>
              <p><?php echo $listePays[$i]['contenu']; ?></p>
              <?php } ?>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

 <!-- End #main -->

  <!-- ======= Footer ======= -->
 