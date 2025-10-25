@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-4" style="background-color: #3e2f2f; color: #f5f5f5;">
        <div class="card-header" style="background-color: #db770cff; color: #fff;">
            <h4 class="mb-0">Orders List</h4>
        </div>
        <div class="card-body">

            {{-- Flash Messages --}}
            @if(Session::has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(Session::has('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Orders Table --}}
            <div class="table-responsive">
                <table class="table align-middle mb-0" style="color:#f5f5f5; border:1px solid #6b4c3b;">
                    <thead style="background-color: #5a3d30;">
                        <tr class="text-center">
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Phone</th>
                            <th>Street Address</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allOrders as $order)
                        <tr class="text-center" style="border-bottom:1px solid #6b4c3b;">
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>${{ number_format($order->price,2) }}</td>
                            <td>
                                @php
                                    $statusColors = [
                                        'Pending' => 'warning',
                                        'Delivered' => 'success',
                                        'Cancelled' => 'danger'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('edit.orders', $order->id) }}" class="btn btn-sm btn-info rounded-pill">
                                    Change Status
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('delete.orders', $order->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-pill">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- Total Price --}}
                    <tfoot style="background-color:#5a3d30; color:#fff;">
                        <tr>
                            <td colspan="7" class="text-end"><strong>Total Price:</strong></td>
                            <td>${{ number_format($allOrders->sum('price'),2) }}</td>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <a href="{{ route('admins.dashboard') }}" class="btn btn-light mt-3" style="color:#3e2f2f;">
                <i class="bi bi-arrow-left-circle"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
