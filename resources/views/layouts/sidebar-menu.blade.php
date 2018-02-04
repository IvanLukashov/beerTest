<div class="sidebar" data-color="orange" data-image="/material/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="https://devlop.kusya.com.ua/" class="simple-text" target="_blank">
            To Kusya
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{!! strpos(\Request::route()->getName(), 'home') !== false ? "active" : '' !!}">
                <a href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Home</p>
                </a>
            </li>
            <li class="{!! strpos(\Request::route()->getName(), 'brewery') !== false ? "active" : '' !!}">
                <a href="{{ route('brewery.index') }}">
                    <i class="material-icons">local_bar</i>
                    <p>Brewery</p>
                </a>
            </li>
            <li class="{!! strpos(\Request::route()->getName(), 'beer_type') !== false ? "active" : '' !!}">
                <a href="{{ route('beer_type.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Beer Type</p>
                </a>
            </li>
            <li class="{!! strpos(\Request::route()->getName(), 'beers') !== false ? "active" : '' !!}">
                <a href="{{ route('beers.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Beer</p>
                </a>
            </li>
         </ul>
    </div>
</div>