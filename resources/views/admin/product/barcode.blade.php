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
        <div class="col-md-4">
            {{-- <img src="' . DNS1D::getBarcodePNG('4', 'C39+',3,33) . '" alt="barcode"   /> --}}
            {{-- <div> {!!DNS1D::getBarcodeSVG($product->bar_code, 'C39'); !!}</div> --}}
            {{-- <div> <img src="' . DNS1D::getBarcodePNG($product->bar_code, 'C39',3,33) . '" alt="barcode"></div> --}}
            {{-- <div> <img src=" .{!!DNS1D::getBarcodePNG($product->bar_code, 'C39'); !!} ."> </div>
            <div> <img src="' .{!!DNS1D::getBarcodePNG($product->bar_code, 'C39'); !!} .'"> </div> --}}
            <div>
                {!!DNS1D::getBarcodeHTML($product->bar_code, 'C39E',2,40,'black', true); !!}
                <small> {{ $product->name }}</small>
                <p>Código con C39E</p>
            </div>
            <div>
                {!! DNS1D::getBarcodeHTML($product->bar_code, 'C93',2,40,'black', true); !!}
                <small> {{ $product->name }}</small>
                <p>Código con C93</p>
            </div>
            {{-- <div>
                {!!DNS1D::getBarcodeHTML($product->bar_code, 'S25',2,40,'black', true); !!}
                <small> {{ $product->name }}</small>
                <p>Código con S25</p>
            </div> --}}
            {{-- <div>
                {!! DNS1D::getBarcodeHTML($product->bar_code, 'I25'); !!}
                <small> {{ $product->name }}</small>
                <p>Código con I25</p>
            </div> --}}
            <div>
                {!! DNS1D::getBarcodeHTML($product->bar_code, 'C128',2,40,'black', true); !!}
                <small> {{ $product->name }}</small>
                <p>Código con C128</p>
            </div>
            <div>
                {!! DNS1D::getBarcodeHTML($product->bar_code, 'EAN13',2,40,'green', true); !!}
                <small> {{ $product->name }}</small>
                <p>Código con EAN13</p>
            </div>

        </div>
        @endforeach
    </div>
</body>
</html>