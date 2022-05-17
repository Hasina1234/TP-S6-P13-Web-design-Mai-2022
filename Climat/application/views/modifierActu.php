						<div class="text-center mt-4">
							<h1 class="h2"><?php echo $h1 ?></h1>
							
						</div>


					
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form  id="request" class="main_form" method="post" action="<?php echo site_url("Service/updateACtu")?>">
										<div class="mb-3">
											 <input class="form-control form-control-lg" type="hidden" name="idActu" value="<?php echo $idActu[0]; ?>"> 
										</div>

                              <div class="mb-3">
                              	
							  <label class="form-label">Categorie</label>
											<select id="selectCat" name="cat" style="background-color: grey" class="form-control">
                 						<?php foreach($listeCatego as $listeCatego) {?>
                      						<option value="<?php echo $listeCatego['idCat'];?>" class="form-control form-control-lg" > <?php echo $listeCatego['categorie'];?> </option>
										<?php }?>
              								</select>
								</div>
                              <div class="mb-3">
							  <label class="form-label">Titre</label>
											<input class="form-control form-control-lg" type="text" name="titre" placeholder="Enter title" />
                               </div>

                                <div class="mb-3">
							  <label class="form-label">Contenu</label>
								<textarea class="form-control form-control-lg" type="text" name="contenu" > </textarea>
                               </div>

                               <div class="mb-3 ">
                               <label class="form-label">Date de l'actualite</label>
                                  <input class="form-control form-control-lg" placeholder="Date de l'actualite" type="date" name="dateActu" required> 
                              </div>
										
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Valider</button>

											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										</div>
									</form>
								<a href="<?php echo site_url("Service/listeActu"); ?>"><button  class="btn btn-light"> << Retour</button></a>
								</div>
							</div>
						</div>

					

