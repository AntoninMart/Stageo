<div class="container mt-5  mb-5"></div>
<div class="container mt-5  mb-5"></div>
<div class="container p-5 mt-5  mb-5">
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="table">
            <thead class="table-Secondary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom entreprise</th>
                    <th scope="col">Nombre stagiaires</th>
                    <th scope="col">Nom secteur</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Evaluation</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach($rowscompanie as $row): ?>
                <tr id="tr_companies<?php echo $i; $i++?>" onclick="getTrValuesCompanies(this.id)" style="cursor:pointer">
                    <th scope="row"><?php echo($row->entreprise_id);?></th>
                    <td><?php echo($row->nom_entreprise); ?></td>
                    <td><?php echo($row->nb_stagiaire); ?></td>
                    <td><?php echo($row->nom_secteur); ?></td>
                    <td><?php echo($row->nom_ville); ?></td>
                    <td><?php echo($row->Moyenne_Note); ?></td>
                    
                </tr>
            <?php endforeach ?> 
            </tbody>
        </table>
    </div>
</div>

<!-- P R E M I E R E  L I G N E -->

<div class="container mt-5  mb-5">
    <form method="POST" name="Update_companie">
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <!-- I D  E N T R E P R I S E -->
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="id_entreprise" id="id_entreprise" readonly="readonly"/>
                    </div>
                    <label class="form-label" for="form3Example2">ID</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <!-- N O M  E N T R E P R I S E -->
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise">
                    </div>
                    <label class="form-label" for="form3Example2">Nom entreprise</label>
                </div>
            </div>
        </div>    
        <!-- D E U X I E M E  L I G N E -->
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <!-- N O M B R E  D E  S T A G I A I R E -->
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="nb_stagiare" name="nb_stagiaire" />
                    </div>
                    <label class="form-label" for="form3Example2">Nombre de stagiaire</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="nom_secteur_entreprise" name="nom_secteur">
                    </div>
                    <label class="form-label" for="form3Example2">Nom secteur</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <!-- S E L E C T  N O M  C E N T R E  E N  B A S  L A S -->
                        <!-- <input type="text" class="form-control" id="center_personne" name="centre_id"> -->
                        <select class="form-select" aria-label="Default select example" id="ville_entreprise_oui" name="ville_entreprise" required>
                            <option selected></option>
                            <?php $i = 0; foreach($rowscompanie_ville as $rowc): ?>
                                <?php $i++; ?>
                                <option value=<?php echo($rowc->nom_ville); ?>><?php echo($rowc->nom_ville); ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <label class="form-label" for="form3Example2">Ville</label>
                </div>
            </div>

            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="Evaluation" name="Evaluation_moy" readonly="readonly">
                    </div>
                    <label class="form-label" for="form3Example2">Evaluation Moyenne</label>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-around">
            <button class="btn btn-primary w-25" type="button" value="Create" name="Create" data-bs-toggle="modal" data-bs-target="#createmodal_companie">Create</button>
            <!-- <button type="submit" class="btn btn-primary" value="Create" name="Create">Confirm</button> -->
            <!-- <button type="button" onclick="getIDupdate();" class="buttonupd btn btn-primary w-25" id="btn_update" value="Update_pilot" name="Update_pilot" data-bs-toggle="modal" data-bs-target="#updatemodal" disabled>Update</button> -->
            <button type="submit" class="buttonupd btn btn-primary w-25" id="btn_update" value="Update_companie" name="Update_companie" disabled>Update</button>
            <button type="button" onclick="getdelID_C();" id="btn_del" class="buttondel btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#deletemodal" disabled>Delete</button>
        </div>   
        
    </form>
</div>
