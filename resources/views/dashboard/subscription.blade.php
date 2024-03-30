@extends('dashboard.index')
@section('snap.js')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT') }}"></script>
@endsection
@section('subscription')
    <div class="flex items-center gap-3">
        <table class="table">
            <tr>
                <td>Order ID</td>
                <td>Plan</td>
                <td>Status</td>
                <td>Amount</td>
                <td>Email</td>
                <td>Date & Time</td>
            </tr>
            @foreach ($snapToken as $token)
                <tr>
                    <td>{{ $token->order_id }}</td>
                    <td>
                        @if ($token->plan == 3)
                            3 Hari
                        @elseif ($token->plan == 7)
                            7 Hari
                        @elseif ($token->plan == 30)
                            30 Hari
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $token->transaction->transaction_status }}</td>
                    <td>{{ $token->gross_amount }}</td>
                    <td class="line-clamp-1">{{ $token->user->email }}</td>
                    <td>{{ $token->created_at }}</td>
                    <td><button id="pay-button" class="btn btn-xs rounded" data-token={{ $token->snap_token }}>Bayar
                            Sekarang</button>
                        <div id="snap-container"></div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- 
    <div class="card card-bordered p-2 rounded w-64">
        <div class="card-title">
            Premium Access
        </div>
        <div class="card-body">
            <form action="{{ route('midtrans')}}" method="POST">
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus, nesciunt.</span>
            <small>Rp. 12000</small>
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">Buy Now</button>
            </form>
        </div>
    </div>
    <div class="card card-bordered p-2 rounded w-64 mt-2">
        <div class="card-title">
            Premium Access
        </div>
        <div class="card-body">
            <form action="{{ route('midtrans')}}" method="POST">
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus, nesciunt.</span>
            <small>Rp. 20000</small>
                @csrf
                <input type="hidden" name="gross" value="50000">
                <button type="submit" class="btn btn-sm btn-secondary">Buy Now</button>
            </form>
            </div>
    </div> --}}
    </div>
@endsection
@section('subscription.js')
    <script type="text/javascript">
        const payButton = document.querySelectorAll('#pay-button');
        payButton.forEach(x => {
            x.addEventListener('click', function() {
                const token = x.getAttribute('data-token');
                console.log(token)
                snap.pay(token);
            });
        });
    </script>
@endsection
