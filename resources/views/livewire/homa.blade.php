<div>
    <h1>Home component</h1>
    <button type="submit" class="btn btn-outline-primary" wire:click="add">+</button>
    <h3>{{$a}}</h3>
    <button type="submit" class="btn btn-outline-danger" wire:click="sub">-</button>
    <div class="col-6">
        <input type="text" wire:model="num1" class="form-control mt-2" placeholder="A">
        <input type="text" wire:model="num2" class="form-control mt-2" placeholder="B">
        <select class="form-select mt-2" wire:model="st">
            @foreach($mx as $m)
                <option>{{$m}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-primary mt-2" value="submit" wire:click="hisob">
        @if($result != 0)
            <h2>{{$result}}</h2>
        @endif
    </div>
</div>
