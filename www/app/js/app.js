//let deleteId= 0;

// function del(){
//     console.log('JE VEUX DELETE ',deleteId);
//     let formData = new FormData();
//     formData.append('id', deleteId);

//     document.getElementById("test").innerText = 'CHARGEMENT';
//     fetch('/exemple.php',{
//         method:'POST',
//         body: formData
//     }).then((res)=>{
//         console.log('REQUETE ENVOYEE',res);
//         $('#deletemodal').modal('hide');
//         document.getElementById("test").innerText = 'FINI';
//     })
// }
//$('#deletemodal').on('hidden.bs.modal', function (e) {console.log(e,document.input)})
function getdelID() {
    let input = document.getElementById("id_for_js").value;
    deleteId = parseInt(input, 10);
    document.getElementById('deleteid').value = input;
}

function getdelID_C() {
    let input = document.getElementById("id_entreprise").value;
    deleteId = parseInt(input, 10);
    document.getElementById('deleteid').value = input;
    console.log(deleteId);
}

function getcreate() {
    let inputl = document.getElementById("login_personne_create").value;
    let inputln = document.getElementById("lname_personne_create").value;
    let inputfn = document.getElementById("fname_personne_create").value;
    let inputv = document.getElementById("nom_ville").value;
    let inputp = document.getElementById("password_personne_create").value;
    document.getElementById("createlid").value = inputl;
    document.getElementById("createlnid").value = inputln;
    document.getElementById("createfnid").value = inputfn;
    document.getElementById("createvid").value = inputv;
    document.getElementById("createpid").value = inputp;
}

function getIDupdate() {
    let inputID = document.getElementById("id_for_js").value;
    let inputl = document.getElementById("login_personne").value;
    let inputln = document.getElementById("lname_personne").value;
    let inputfn = document.getElementById("fname_personne").value;
    let inputv = document.getElementById("center_personne").value;
    document.getElementById("updateid").value = inputID;
    document.getElementById("updatel").value = inputl;
    document.getElementById("updateln").value = inputln;
    document.getElementById("updatefn").value = inputfn;
    document.getElementById("updatev").value = inputv;
}

function getTrValues(idTr) {
    var buttondis = document.getElementById('btn_del');
    var buttonupd = document.getElementById('btn_update');
    buttondis.removeAttribute("disabled");
    buttonupd.removeAttribute("disabled");
    var tr = document.getElementById(idTr);
    var cells = tr.cells
    var cellcount = cells.length;
    document.getElementById('table').querySelectorAll('tr').forEach(el => el.classList.remove('table-primary'));
    tr.classList.add("table-primary");
    for (c = 0; c < cellcount; c++) {
        cell = cells[c];
        //console.log("Cellule N° "+c + " = " + cell.innerHTML);
    }
    var idpilot = cells[0];
    //console.log(idpilot.innerHTML);
    document.getElementById("id_for_js").value = cells[0].innerHTML;
    document.getElementById("login_personne").value = cells[3].innerHTML;
    document.getElementById("lname_personne").value = cells[1].innerHTML;
    document.getElementById("fname_personne").value = cells[2].innerHTML;
    // document.getElementById("center_personne").value = cells[4].innerHTML;
    document.getElementById("center_personne").value = cells[4].innerHTML;
}
// ---------------------------------------------offers----------------------------- test
function getTrValuesOffers(idTr) {
    var buttondis = document.getElementById('btn_del');
    var buttonupd = document.getElementById('btn_update');
    buttondis.removeAttribute("disabled");
    buttonupd.removeAttribute("disabled");
    var tr = document.getElementById(idTr);
    var cells = tr.cells
    var cellcount = cells.length;
    document.getElementById('table').querySelectorAll('tr').forEach(el => el.classList.remove('table-primary'));
    tr.classList.add("table-primary");
    for (c = 0; c < cellcount; c++) {
        cell = cells[c];
        console.log("Cellule N° " + c + " = " + cell.innerHTML);
    }
    var idpilot = cells[0];
    //console.log(idpilot.innerHTML);
    document.getElementById("id_for_js").value = cells[0].innerHTML;
    document.getElementById("duree_stage").value = cells[3].innerHTML;
    document.getElementById("name").value = cells[1].innerHTML;
    document.getElementById("remuneration").value = cells[2].innerHTML;
    document.getElementById("js_date_offre").value = cells[5].innerHTML;
    document.getElementById("nb_places").value = cells[4].innerHTML;
    document.getElementById("js_skill").value = cells[8].innerHTML;
    document.getElementById("js_debut_offre").value = cells[6].innerHTML;
    document.getElementById("js_fin_offre").value = cells[7].innerHTML;
}

function getcreateoffers() {
    let inputrem = document.getElementById("rem_offer_create").value;
    let inputdds = document.getElementById("dds_offer_create").value;
    let inputdfs = document.getElementById("dfs_offer_create").value;
    let inputnbo = document.getElementById("nbp_offer_create").value;
    let inputdo = document.getElementById("do_offer_create").value;
    let inputc = document.getElementById("c_offer_create").value;
    let inputne = document.getElementById("ne_offer_create").value;
    document.getElementById("createrem").value = inputrem;
    document.getElementById("createdds").value = inputdds;
    document.getElementById("createdfs").value = inputdfs;
    document.getElementById("createnbo").value = inputnbo;
    document.getElementById("createdo").value = inputdo;
    document.getElementById("createc").value = inputc;
    document.getElementById("createne").value = inputne;
}
function getIDupdateOffers() {
    let inputID = document.getElementById("id_for_js").value;
    let inputn = document.getElementById("name").value;
    let inputr = document.getElementById("remuneration").value;
    let inputp = document.getElementById("nb_places").value;
    let inputjdo = document.getElementById("js_date_offre").value;
    let inputjs = document.getElementById("js_skill").value;
    let inputjbo = document.getElementById("js_debut_offre").value;
    let inputjfo = document.getElementById("js_fin_offre").value;
    document.getElementById("updateidstage").value = inputID;
    document.getElementById("updaten").value = inputn;
    document.getElementById("updater").value = inputr;
    document.getElementById("updatep").value = inputp;
    document.getElementById("updatejdo").value = inputjdo;
    document.getElementById("updatetjs").value = inputjs;
    document.getElementById("updatejbo").value = inputjbo;
    document.getElementById("updatejfo").value = inputjfo;
    console.log(inputp);
    console.log(inputjbo);

}

function getTrValuesCompanies(idTr_companies) {
    var buttondis = document.getElementById('btn_del');
    var buttonupd = document.getElementById('btn_update');
    buttondis.removeAttribute("disabled");
    buttonupd.removeAttribute("disabled");
    var tr = document.getElementById(idTr_companies);
    var cells = tr.cells
    var cellcount = cells.length;
    document.getElementById('table').querySelectorAll('tr').forEach(el => el.classList.remove('table-primary'));
    tr.classList.add("table-primary");
    for (c = 0; c < cellcount; c++) {
        cell = cells[c];
        console.log("Cellule N° "+c + " = " + cell.innerHTML);
    }

    //console.log(idpilot.innerHTML);
    document.getElementById("id_entreprise").value = cells[0].innerHTML;
    document.getElementById("nom_entreprise").value = cells[1].innerHTML;
    document.getElementById("nb_stagiare").value = cells[2].innerHTML;
    document.getElementById("nom_secteur_entreprise").value = cells[3].innerHTML;
    document.getElementById("ville_entreprise_oui").value = cells[4].innerHTML;
    document.getElementById("Evaluation").value = cells[5].innerHTML;
}