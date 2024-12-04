<div>
    <div class="row mt-4">
        <div class="col-3">
            <ul class="list-group" wire:sortable="updateTest">
                @foreach($models->where('status',1) as $model)
                    <li draggable="true" wire:sortable.item="{{$model->id}}" class="list-group-item">{{$model->id}}
                        | {{$model->name}} | {{$model->status}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-group" wire:sortable="updateTest">
                @foreach($models->where('status',2) as $model)
                    <li draggable="true" wire:sortable.item="{{$model->id}}" class="list-group-item">{{$model->id}}
                        | {{$model->name}} | {{$model->status}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-group" wire:sortable="updateTest">
                @foreach($models->where('status',3) as $model)
                    <li draggable="true" wire:sortable.item="{{$model->id}}" class="list-group-item">{{$model->id}}
                        | {{$model->name}} | {{$model->status}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-group" wire:sortable="updateTest">
                @foreach($models->where('status',4) as $model)
                    <li draggable="true" wire:sortable.item="{{$model->id}}" class="list-group-item">{{$model->id}}
                        | {{$model->name}} | {{$model->status}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
