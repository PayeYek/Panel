<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paye1</title>
    @vite('resources/js/app.js')

</head>

<body>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 px-5">
    @foreach($land->products as $product)
        <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}" class="text-center">
            <img src="{{$product->image}}" alt="{{$product->name}}">
            <div>{{$product->name}}</div>
        </a>
    @endforeach
</div>

</body>

</html>
