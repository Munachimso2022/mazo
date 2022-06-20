<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="request-done-{{$req->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure about approving this withdrawal? Have you sent it via the wallet?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        <a href="" class="btn btn-primary">Yes Confirm</a>
      </div>
    </div>
  </div>
</div>



<!--  view modal-->

<!-- Modal -->
<div class="modal fade" id="request-see-{{$req->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- list begin -->
          <ul class="list-group">
            <li class="list-group-item"><span>Balance - </span> <span>$ {{$req->user->wallet->balace}}</span></li>
            <li class="list-group-item"><span>Amount - </span><span> {{$req->amount}}</span></li>
            <li class="list-group-item"><span>{{$req->add}}</span></li>
            <li class="list-group-item"><span>Status - </span><span>{{$req->fullfill}}</span></li>
            <!-- <li class="list-group-item">And a fifth one</li> -->
          </ul>
          <!-- list end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>