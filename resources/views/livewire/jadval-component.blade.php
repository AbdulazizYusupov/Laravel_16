<div>
    <div class="container row">
        <div class="col-12">
            <h1>Davomat</h1>
            <input type="date" class="form-control mt-4" wire:change="changeDate($event.target.value)">
            <h3 class="text-primary mt-4">{{$date->format('F Y')}}</h3>
            <table class="table table-bordered table-hover mt-4">
                <tr>
                    <th style="color: red;">Delete</th>
                    <th>#</th>
                    <th>Name</th>
                    @foreach($days as $day)
                        <th>{{$day->format('d')}}</th>
                    @endforeach
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td>
                            <button class="btn btn-danger" wire:click="delete({{ $student->id }})"
                                    style="margin-right: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                        </td>
                        <th>{{$student->id}}</th>
                        <td>{{$student->name}}</td>
                        @foreach($days as $day)
                            @php
                                $userDavomat = $student->checks($day->format('Y-m-d'));
//                                dd($userDavomat);
                            @endphp
                            <td wire:click="inputView('{{$student->id}}', '{{$day->format('Y-m-d')}}')">
                                @if($studentId == $student->id && $davomatDate == $day->format('Y-m-d'))
                                    <input type="text" style="width: 30px;" autofocus
                                           value="{{$userDavomat->value ?? ''}}"
                                           wire:keydown.enter="createDavomat('{{$student->id}}','{{$day->format('Y-m-d')}}', $event.target.value)">
                                @else
                                    @if($userDavomat)
                                        <span class="text-{{$userDavomat->value == '+' ? 'primary' : 'danger'}}">
                                            {{$userDavomat->value}}
                                        </span>
                                    @endif
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <button class="btn {{$activeForm ? 'btn-secondary' : 'btn-primary'}}"
                    wire:click="{{$activeForm ? 'cancel' : 'create'}}">{{$activeForm ? 'Cancel' : 'Add student'}}</button>
            @if($activeForm)
                <form wire:submit.prevent="save">
                    <div class="row mt-2">
                        <div class="col-3">
                            <input type="text" wire:model="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
