@if(!request()->is(['login' , 'register']))

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>TaskManager</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" >{{auth()->user()->name}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('login')}}">login</a>
                        </li>
                    @endauth
                        @if(auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('tasks.create')}}">Determining the task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('carts.create') }}">Create a cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('carts.index')}}">Carts</a>
                        </li>
                        @endif
                </ul>
            </div>
            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm shadow">Logout</button>
                </form>

            </div>
        </div>
    </nav>
@endif
