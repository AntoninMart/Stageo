<div class="modal fade" id="createmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Acount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="Create" >
                    <div class="row mb-4">
                        <div class="d-flex col justify-content-center">
                            <div class="form-outline w-50">
                                <div class="input-group mb-1">
                                    <input type="email" class="form-control" name="login_personne_create" id="login_personne_create"  placeholder="xxxxx@xxxx.xx" required>
                                </div>
                                <label class="form-label" for="form3Example2">Login</label>
                            </div>
                        </div>
                    </div>   
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- N O M  P E R S O N N E -->
                                    <input type="text" class="form-control" name="lname_personne_create" id="lname_personne_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Last name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- P R E N O M  P E R S O N N E -->
                                    <input type="text" class="form-control" name="fname_personne_create" id="fname_personne_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">First name</label>
                            </div>
                        </div>
                    </div>
                    <!-- DERNIERE LIGNE CREATION FORMULAIRE -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- C E N T R E  P E R S O N N E -->
                                    <select class="form-select" aria-label="Default select example" id="nom_ville" name="nom_ville" required>
                                        <option selected>Select the center</option>
                                        <?php $i = 0; foreach($rowscenter as $rowc): ?>
                                            <?php $i++; ?>
                                            <option value=<?php echo($rowc->nom_ville); ?>><?php echo($rowc->nom_ville); ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <label class="form-label" for="form3Example2">Center</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="input-group mb-1">
                                    <!-- M O T  D E  P A S S E  P E R S O N N E -->
                                    <input type="text" class="form-control" id="password_personne_create" name="password_personne_create" required>
                                </div>
                                <label class="form-label" for="form3Example2">Password</label>
                            </div>
                        </div>
                    </div>
                    <!-- F I N  F O R M U L A I R E  P E R S O N N E   -->
                    <button class="btn btn-primary w-25" onclick="getcreate();" type="button" value="Create" name="Create" data-bs-toggle="modal" data-bs-target="#confirm_create">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
