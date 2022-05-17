

 


    <!-- ======= Breadcrumbs Section ======= -->
    <!-- Breadcrumbs Section -->
    <div class="section-title"  data-aos-delay="100">
          <h1><h2><?php echo $h1 ?><h2></h1>
          
        </div>

    <!-- ======= Portfolio Details Section ======= -->
    <div class="text-center mt-4">
  
              
</div>

  <table class="table table-striped table-primary">
  <thead>
    <tr>
      <th>IdActu</th>
      <th>Pays</th>
      <th>Titre</th>      
    </tr>
    </thead>
    <tbody>
    <?php for ($i=0; $i < count($donnee); $i++) { ?>  
    <tr>
      <td><?php echo $donnee[$i]['idActu']; ?></td>
      <td><?php echo $donnee[$i]['pays']; ?></td>
      <td><?php echo $donnee[$i]['titre']; ?></td>
      
       <td><a href="<?php echo site_url(); ?><?php echo $donnee[$i]['categorie']; ?>/<?php echo $donnee[$i]['url']; ?>-<?php echo $donnee[$i]['idActu']; ?>"><button class="btn btn-primary">Voir détails</button></a></td>



      <!-- <td><a href="<?php echo $donnee[$i]['categorie']; ?>/<?php echo $donnee[$i]['url']; ?>-<?php echo $donnee[$i]['idActu']; ?>"><button>Voir fiche</button></a></td> -->
      <!-- <td><a href="<?php echo site_url("Service/fiche/ida=").$donnee[$i]['idActu'] ; ?>"><button>Voir fiche</button></a></td> -->
    </tr>
    <?php } ?>
</tbody>  
  </table>

    <!-- End Portfolio Details Section -->

<!-- End #main -->

  <!-- ======= Footer ======= -->
 