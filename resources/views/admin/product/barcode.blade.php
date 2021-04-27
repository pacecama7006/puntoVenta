<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Códigos de barras</title>
    <style>
        .row{
            margin: 0px;
        }
        h2{
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-2">
            <div>
                {!! DNS1D::getBarcodeHTML($product->bar_code, 'C39',1,30,'black', true); !!}
                <small> {{ $product->name }}</small>
            </div>

        </div>
        @endforeach
    </div>
</body>
</html>