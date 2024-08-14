<!-- Main Modal -->
<div id="main_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" id="modal-fullscreen" class="modal-btn btn btn-main btn-sm pull-right">
                    <ion-icon name="expand-outline"></ion-icon> {{ __("Full Screen") }}
                </button>
                <button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-bs-dismiss="modal">
                    <ion-icon name="close-outline"></ion-icon> {{ __("Exit") }}
                </button>
            </div>
            <div class="alert alert-danger" style="display:none; margin: 1em;"></div>
            <div class="alert alert-success" style="display:none; margin: 1em;"></div>
            <div class="modal-body" style="overflow:hidden;"></div>
        </div>
    </div>
</div>
<!-- Main Modal -->
