<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h2>{{$today}}</h2><br>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIO</th>
                        @for($i = 1; $i <= 31; $i++)
                            <th>{{$i}}</th>
                        @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            @for($i = 1; $i <= 31; $i++)
                                @php
                                    $date = sprintf('2024-12-%02d', $i);
                                    $value = $inputValues[$user->id][$date] ?? '';
                                @endphp
                                <td></td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
