<div>
    <div class="row mt-4">
        <div class="col-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Body</th>
                    <th>Function</th>
                </tr>
                </thead>
                <tbody wire:sortable="updateGroup">
                @foreach($models as $model)
                    <tr draggable="true" wire:sortable.item="{{$model->id}}">
                        <th>{{$model->id}}</th>
                        <td>{{$model->name}}</td>
                        <td>{{$model->name}}</td>
                        <td>{{$model->tr}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
