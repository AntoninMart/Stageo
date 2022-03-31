<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Comfirm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure ?
      </div>
      <div class="modal-footer">
        <!--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
      <button type="submit" class="btn btn-primary" value="Delete" name="Delete" onclick="del()" id="test">Confirm</button>-->
        <form method="POST">
            <input type="hidden" name="updateid" id="updateid" required/>
            <input type="hidden" name="updatel" id="updatel" required/>
            <input type="hidden" name="updateln" id="updateln" required/>
            <input type="hidden" name="updatefn" id="updatefn" required/>
            <input type="hidden" name="updatev" id="updatev" required/>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
            <button type="submit" class="btn btn-primary" value="Update" name="Update" >Confirm</button>
        </form>    
      </div>
    </div>
  </div>
</div>
