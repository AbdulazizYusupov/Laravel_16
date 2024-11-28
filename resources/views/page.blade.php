<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="/" wire:navigate>Bosh sahifa</a></li>
                    <li><a href="/home" wire:navigate>Home</a></li>
                    <li><a href="/calc" wire:navigate>Calc</a></li>
                    <li><a href="/test" wire:navigate>test</a></li>
                    <li><a href="/page" wire:navigate>page</a></li>
                    <li><a href="/post" wire:navigate>Posts</a></li>
                </ul>
            </div>
            <div class="col-md-12">
                <h1>Page</h1>
                <livewire:homa/>
            </div>
        </div>
    </div>
</body>
</html>
