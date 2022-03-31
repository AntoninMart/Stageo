<div class="container mt-5  mb-5"></div>
<div class="container mt-5  mb-5"></div>
<div class="container p-5 mt-5  mb-5">
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="table">
            <thead class="table-Secondary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">Login</th>
                    <th scope="col">centre</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach($rows as $row): ?>
                <tr id="tr_<?php  echo $i; $i++?>" onclick="getTrValues(this.id)" style="cursor:pointer">
                    <th class="getid" scope="row"><?php echo($row->personne_id); ?></th>
                    <td class="getname"><?php echo($row->nom); ?></td>
                    <td class="getfirstname"><?php echo($row->prenom); ?></td>
                    <td class="getlogin"><?php echo($row->user_login); ?></td>
                    <td class="getcenter"><?php echo($row->nom_ville); ?></td>
                </tr>
            <?php endforeach ?> 
            </tbody>
        </table>
    </div>
</div>
<div class="container mt-5  mb-5">
    <form method="POST" name="Update_pilot">
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="id_personne" id="id_for_js" readonly="readonly">
                    </div>
                    <label class="form-label" for="form3Example2">ID</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="login_personne" name="user_login">
                    </div>
                    <label class="form-label" for="form3Example2">Login</label>
                </div>
            </div>
        </div>    
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="lname_personne" name="nom">
                    </div>
                    <label class="form-label" for="form3Example2">Last name</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" id="fname_personne" name="prenom">
                    </div>
                    <label class="form-label" for="form3Example2">First name</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="d-flex col justify-content-center">
                <div class="form-outline w-50">
                    <div class="input-group mb-1">
                        <!-- S E L E C T  N O M  C E N T R E  E N  B A S  L A S -->
                        <!-- <input type="text" class="form-control" id="center_personne" name="centre_id"> -->
                        <select class="form-select" aria-label="Default select example" id="center_personne" name="centre_id_ville" required>
                            <option selected></option>
                            <?php $i = 0; foreach($rowscenter as $rowc): ?>
                                <?php $i++; ?>
                                <option value=<?php echo($rowc->nom_ville); ?>><?php echo($rowc->nom_ville); ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <label class="form-label" for="form3Example2">Center</label>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-around">
            <button class="btn btn-primary w-25" type="button" value="Create" name="Create" data-bs-toggle="modal" data-bs-target="#createmodal">Create</button>
            <!-- <button type="submit" class="btn btn-primary" value="Create" name="Create">Confirm</button> -->
            <button type="button" onclick="getIDupdate();" class="buttonupd btn btn-primary w-25" id="btn_update" value="Update_pilot" name="Update_pilot" data-bs-toggle="modal" data-bs-target="#updatemodal" disabled>Update</button>
            <button type="button" onclick="getdelID();" id="btn_del" class="buttondel btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#deletemodal" disabled>Delete</button>
        </div>    
    </form>
</div>
