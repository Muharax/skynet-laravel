<!-- index.blade.php -->

@foreach($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        @if($category->image)
            <img src="{{ $category->image_url }}" alt="{{ $category->name }} image">
        @endif
    </div>
@endforeach
