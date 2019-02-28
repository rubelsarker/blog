<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-md-4">
            <li class="nav-item {{Request::is('/')?'active':''}}">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{Request::is('about')?'active':''}}">
                <a class="nav-link" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item {{Request::is('blog')?'active':''}}">
                <a class="nav-link" href="{{url('/blog')}}">Blog</a>
            </li>
            <li class="nav-item {{Request::is('contact')?'active':''}}">
                <a class="nav-link" href="{{url('/contact')}}">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('posts/create')}}">Create New Post</a>
                    <a class="dropdown-item" href="{{url('/posts')}}">post</a>
                    <a class="dropdown-item" href="{{route('categories.index')}}">Category</a>
                    <a class="dropdown-item" href="{{route('tags.index')}}">Tag</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>
    </div>
</nav>