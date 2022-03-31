<div class="modal fade" id="confirm_create_offers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <form method="POST" name="Create">
          <input type="hidden" name="createrem" id="createrem"/>
          <input type="hidden" name="createdds" id="createdds"/>
          <input type="hidden" name="createdfs" id="createdfs"/>
          <input type="hidden" name="createnbo" id="createnbo"/>
          <input type="hidden" name="createdo" id="createdo"/>
          <input type="hidden" name="createc" id="createc"/>
          <input type="hidden" name="createne" id="createne"/>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
          <button type="submit" class="btn btn-primary" value="CreateOffers" name="CreateOffers">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>