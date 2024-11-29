<div>
    <h1 class="m-2">Category</h1>
    <button class="btn btn-primary m-3"
            wire:click="{{$activeForm ? 'cancel' : 'create'}}">{{$activeForm ? 'Cancel' : 'Create'}}</button>
    @if($activeForm)
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-3">
                    <input type="text" wire:model="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </form>
    @endif
    @if(!$activeForm)
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" class="form-control" placeholder="Search by name"
                                       wire:model="searchName" wire:keydown="searchColumps">
                            </th>
                        </tr>
                        <tr>
                            <th>№</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <th>{{$model->id}}</th>
                                <td>
                                    <span
                                        class="{{$model->status ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                                    {{$model->name}}
                                    </span>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               wire:click="changeModel({{$model->id}})" {{$model->status ? 'checked' : ''}}>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger" wire:click="delete({{ $model->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="16" height="16" fill="currentColor"
                                             class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>