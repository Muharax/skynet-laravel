@include('layouts.header')
@include('topbar')

<div>
    <h2>Lista Produktów</h2>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} zł</li>
        @endforeach
    </ul>
</div>

@include('layouts.footer')
