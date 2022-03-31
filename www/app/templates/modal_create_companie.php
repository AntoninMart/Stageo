<div class="modal fade" id="createmodal_companie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Acount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="Create_companie">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise" required>
                                </div>
                                <label class="form-label" for="form3Example2">Nom entreprise</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- C E N T R E  P E R S O N N E -->
                                    <select class="form-select" aria-label="Default select example" id="nom_ville" name="nom_ville" required>
                                        <option selected>Select the center</option>
                                        <?php $i = 0; foreach($nom_ville as $rowc): ?>
                                            <?php $i++; ?>
                                            <option value=<?php echo($rowc->nom_ville); ?>><?php echo($rowc->nom_ville); ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <label class="form-label" for="form3Example2">Ville</label>
                            </div>
                        </div>
                    </div> 
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- N O M  P E R S O N N E -->
                                    <input type="text" class="form-control" name="nb_stagiaire" id="nb_stagiaire" required>
                                </div>
                                <label class="form-label" for="form3Example2">Nombre stagiaire</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- P R E N O M  P E R S O N N E -->
                                    <!-- <input type="text" class="form-control" name="nom_secteur" id="nom_secteur" required> -->
                                    <select class="form-select" aria-label="Default select example" id="nom_secteur" name="nom_secteur" required>
                                        <option selected>Select the center</option>
                                        <?php var_dump($nom_secteur_select);$i = 0; foreach($nom_secteur_select as $rowc): ?>
                                            <?php $i++; ?>
                                            <option value=<?php echo($rowc->nom_secteur); ?>><?php echo($rowc->nom_secteur); ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <label class="form-label" for="form3Example2">Nom secteur</label>
                            </div>
                        </div>
                    </div>
                    <!-- DERNIERE LIGNE CREATION FORMULAIRE -->
                    <div class="row mb-4">
                        
        
                    </div>
                    <!-- F I N  F O R M U L A I R E  P E R S O N N E   -->
                    <button type="submit" class="btn btn-primary w-25" value="Create_companie" name="Create_companie">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
