<div class="container mt-5  mb-5"></div>
<div class="container mt-5  mb-5"></div>
<div class="container p-5 mt-5  mb-5">
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="table">
            <thead class="table-Secondary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Income</th>
                    <th scope="col">Internship duration</th>
                    <th scope="col">Available position</th>
                    <th scope="col">Offers date</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Skill</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach($rows as $row): ?>
                <?php 
                    $date_debut = new DateTime($row->date_debut_stage);
                    $date_fin = new DateTime($row->date_fin_stage);
                    $duree = $date_debut->diff($date_fin);
                    $duree_stage = ($row->date_fin_stage)-($row->date_debut_stage); ?>
                <tr id="tr_<?php  echo $i; $i++?>" onclick="getTrValuesOffers(this.id)" style="cursor:pointer">
                    <th class="getid" scope="row"><?php echo($row->stage_id); ?></th>
                    <td><?php echo($row->nom_entreprise); ?></td>
                    <td><?php echo($row->remuneration); ?></td>
                    <td><?php echo $duree->format('%R%a days'); ?></td>
                    <td><?php echo($row->nb_places); ?></td>
                    <td><?php echo($row->date_offre); ?></td>
                    <td><?php echo($row->date_debut_stage); ?></td>
                    <td><?php echo($row->date_fin_stage); ?></td>
                    <td><?php echo($row->competence); ?></td>
                </tr>
            <?php endforeach ?> 
            </tbody>
        </table>
    </div>
</div>
<div class="container mt-5  mb-5">
    <form method="POST" name="Update_pilot">
        <div class="row mb-4">
            <div class="d-flex col justify-content-center">
                <div class="form-outline w-50">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="stage_id" id="id_for_js" readonly="readonly">
                    </div>
                    <label class="form-label" for="form3Example2">ID</label>
                </div>
            </div>
        </div>    
        <div class="row mb-4">    
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <select class="form-select" aria-label="Default select example" id="name" name="name" required>
                            <option selected></option>
                            <?php $i = 0; foreach($rowsentreprise as $rowe): ?>
                                <?php $i++; ?>
                                <option value=<?php echo($rowe->nom_entreprise); ?>><?php echo($rowe->nom_entreprise); ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <label class="form-label" for="form3Example2">Companies name</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="remuneration" name="remuneration">
                    </div>
                    <label class="form-label" for="form3Example2">Income</label>
                </div>
            </div>
        </div>    
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="duree_stage" name="duree_stage">
                    </div>
                    <label class="form-label" for="form3Example2">Internship duration</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="number" class="form-control" id="nb_places" name="nb_places">
                    </div>
                    <label class="form-label" for="form3Example2">Available position</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="date" class="form-control" id="js_date_offre" name="js_date_offre">
                    </div>
                    <label class="form-label" for="form3Example2">Offers date</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <select class="form-select" aria-label="Default select example" id="js_skill" name="js_skill" required>
                            <option selected></option>
                            <?php echo($rowsskills);?>
                            <?php $i = 0;foreach($rowsskills as $rowss): ?>
                                <?php $i++; ?>
                                <option value=<?php echo($rowss->competence); ?>><?php echo($rowss->competence); ?></option>
                            <?php endforeach?>
                         </select>
                    </div>
                    <label class="form-label" for="form3Example2">Skill</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="date" class="form-control" id="js_debut_offre" name="js_debut_offre">
                    </div>
                    <label class="form-label" for="form3Example2">Start date of the internship</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="date" class="form-control" id="js_fin_offre" name="js_fin_offre">
                    </div>
                    <label class="form-label" for="form3Example2">End date of the internship</label>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-around">
            <button class="btn btn-primary w-25" type="button" value="Create" name="Create" data-bs-toggle="modal" data-bs-target="#createmodaloffers">Create</button>
            <button type="button" onclick="getIDupdateOffers();" class="buttonupd btn btn-primary w-25" id="btn_update" value="Update_pilot" name="Update_pilot" data-bs-toggle="modal" data-bs-target="#updatemodaloffers" disabled>Update</button>
            <button type="button" onclick="getdelID();" id="btn_del" class="buttondel btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#deletemodal" disabled>Delete</button>
        </div>    
    </form>
</div>
