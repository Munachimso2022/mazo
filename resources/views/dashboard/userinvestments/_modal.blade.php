<!-- Modal -->
<div class="modal fade" id="investment-{{$offer->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Investment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item"><span> Investor Name - </span> <span>{{$invest->user->name}}</span></li>
            <li class="list-group-item"><span> Amount Invested -</span><span> ${{$invest->amount}}</span></li>
            <li class="list-group-item"><span> Package Name - </span><span>{{$offer->name}}</span></li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item"><span> Invested On - </span><span>{{$invest->created_at}}</span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>