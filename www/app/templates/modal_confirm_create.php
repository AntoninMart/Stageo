<div class="modal fade" id="confirm_create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <form method="POST" name="Create">
          <input type="hidden" name="createlid" id="createlid" required/>
          <input type="hidden" name="createlnid" id="createlnid" required/>
          <input type="hidden" name="createfnid" id="createfnid" required/>
          <input type="hidden" name="createvid" id="createvid" required/>
          <input type="hidden" name="createpid" id="createpid" required/>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
          <button type="submit" class="btn btn-primary" value="Create" name="Create">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>