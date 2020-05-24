<div class="modal fade" id="delete-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteModalForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Delete Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')

                    <p class="mb-0">Are you sure you want to delete this Admin?</p>
                    <input name="content-id" type="hidden" id="id-input">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

