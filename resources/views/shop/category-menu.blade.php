<div class="category-container">
    <a href="/shop">
        <h3>Limited Offers</h3>
    </a>
    @foreach($categories as $category)
        <a href="/shop/category/{{$category['slug']}}">
            <h3>{{$category->name}}</h3>
        </a>
    @endforeach
</div>
