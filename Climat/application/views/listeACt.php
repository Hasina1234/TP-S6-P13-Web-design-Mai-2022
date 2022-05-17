<!-- <div class="card">
  <div class="card-header">
    Date de l'actu
  </div>
  <div class="card-body">
    <h5 class="card-title">Titre</h5>
    <p class="card-text">Pays</p>
    <a href="<?php echo site_url("Actualite/contenuActu");?>" class="btn btn-primary">Voir</a>
  </div>
</div> -->

<div class="text-center mt-4">
	<h1 class="h2"><?php echo $h1 ?></h1>
							
</div>
	<table class="table">
		<thead>		
		<tr>
			<td>IdActu</td>
			<td>Pays</td>
			<td>Catégorie</td>
			<td>Titre</td>
			<td>Contenu</td>
			<td>DateActu</td>
			
		</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < count($donnee); $i++) { ?>	
		<tr>
			<td><?php echo $donnee[$i]['idActu']; ?></td>
			<td><?php echo $donnee[$i]['pays']; ?></td>
			<td><?php echo $donnee[$i]['categorie']; ?></td>
			<td><?php echo $donnee[$i]['titre']; ?></td>
			<td><?php echo $donnee[$i]['contenu']; ?></td>
			<td><?php echo $donnee[$i]['dateActu']; ?></td>
			
			<td><a href="<?php echo site_url("Service/modifierActu"); ?>/<?php echo $donnee[$i]['idActu'];?>"><button class="btn btn-primary">Modifier</button></a></td>

	

			<!-- <td><a href="<?php echo $donnee[$i]['categorie']; ?>/<?php echo $donnee[$i]['url']; ?>-<?php echo $donnee[$i]['idActu']; ?>"><button>Voir fiche</button></a></td> -->
			<!-- <td><a href="<?php echo site_url("Service/fiche/ida=").$donnee[$i]['idActu'] ; ?>"><button>Voir fiche</button></a></td> -->
		</tr>
		<?php } ?>
</tbody>	
	</table>