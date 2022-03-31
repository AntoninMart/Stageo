<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <input type="hidden" name="id" id="deleteid"/>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
            <button type="submit" class="btn btn-primary" value="Delete" name="Delete" >Confirm</button>
        </form>    
      </div>
    </div>
  </div>
</div>