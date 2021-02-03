
<div class="left-content">
    <p style="color: #2f2f2f; font-weight: bold; border-bottom: solid 1px; width: fit-content;">Welcome {{ Auth::user()->name }}</p>
    <div class="account-menu">
        <a href="{{route('user.editMyAccount')}}">Edit my account</a>
        <a href="{{route('order.all')}}">My orders</a>
        <a href="{{route('user.characters')}}">My Characters</a>
    </div>
</div>
