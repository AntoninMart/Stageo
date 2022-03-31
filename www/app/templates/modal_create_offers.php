<div class="modal fade" id="createmodaloffers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Acount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="Create" >
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <select class="form-select" aria-label="Default select example" id="ne_offer_create" name="ne_offer_create" required>
                                        <option selected>Select the companies</option>
                                        <?php $i = 0; foreach($rowsentreprise as $rowe): ?>
                                            <?php $i++; ?>
                                            <option value=<?php echo($rowe->nom_entreprise); ?>><?php echo($rowe->nom_entreprise); ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <label class="form-label" for="form3Example2">Companies's name</label>
                            </div>
                        </div>
                    </div>   
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" name="rem_offer_create" id="rem_offer_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Income</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="date" class="form-control" name="do_offer_create" id="do_offer_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Offers date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="date" class="form-control" name="dds_offer_create" id="dds_offer_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Start date of the internship</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="date" class="form-control" name="dfs_offer_create" id="dfs_offer_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">End date of the internship</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <input type="number" class="form-control" id="nbp_offer_create" name="nbp_offer_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Available position</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <select class="form-select" aria-label="Default select example" id="c_offer_create" name="c_offer_create" required>
                                        <option selected>Select skill</option>
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
                    <button class="btn btn-primary w-25" onclick="getcreateoffers();" type="button" value="Create" name="Create" data-bs-toggle="modal" data-bs-target="#confirm_create_offers">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
