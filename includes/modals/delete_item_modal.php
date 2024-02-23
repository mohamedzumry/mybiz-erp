<?php
// Get the item ID from data attributes
$itemId = isset($_REQUEST['itemId']) ? intval($_REQUEST['itemId']) : 0;
?>
<!-- Delete Item Modal -->
<div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteItemModalLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="../../dbservices/delete_item.php?itemId=<?php echo "$itemId"?>" class="btn btn-danger" id="deleteItemBtn">Delete Item</a>
            </div>
        </div>
    </div>
</div>