<div class="category-container">
    @foreach($categories as $category)
        <a href="/shop/category/{{$category['slug']}}">
            <h3>{{$category->name}}</h3>
        </a>
    @endforeach
</div>
