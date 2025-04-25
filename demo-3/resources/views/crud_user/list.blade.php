@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Oder</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>
                                    
                                    @if ($user->orders->count() > 0)
                                        <ul>
                                            @foreach ($user->orders as $order)
                                            
                                                <li>
                                                    <a href="{{ route('orders.products', ['id' => $order->id]) }}">
                                                        ID: {{ $order->id }} - {{ $order->total_amount }}₫
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No orders
                                    @endif                               
                                </th>
                                <th>
                                    @foreach($user->roles as $role)
                                        <a href="{{ route('user.role', ['id' => $role->id]) }}">
                                            {{ $role->name . '-' }}
                                        </a>
                                    @endforeach
                                </th>
                                <th>
                                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </main>
@endsection
