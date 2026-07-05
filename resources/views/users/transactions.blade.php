@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('main')
    <section class="w-full column g-10">
      
        @if ($trx->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Transactions found'
            ])
        @else
                <strong class="desc font-weight-900">Transaction History</strong>
              <span class="opacity-07">View all your transactions on {{ config('app.name') }}</span>
             <div class="grid w-full g-10 pc-grid-2">
                   @foreach ($trx as $data)
            <div style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr));border:1px solid var(--rgt-01)" onclick="Redirect('{{ url('users/transaction/receipt?id='.$data->id.'') }}')" class="w-full pc-pointer align-center space-between overflow-hidden p-15 br-10 row g-10 bg-light">
             @if ($data->class == 'credit')
                    <div style="background: #4caf50;color:white;min-width:0;" class="h-40 w-40 circle no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14.5895 16.0032L5.98291 7.39664L7.39712 5.98242L16.0037 14.589V7.00324H18.0037V18.0032H7.00373V16.0032H14.5895Z"></path></svg>

                </div>
             @else
                    <div style="background: orangered;color:white;" class="h-40 w-40 circle no-shrink column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>

                </div>
             @endif
             {{-- new column --}}
             <div class="column m-right-auto g-5">
                <strong class="font-size-09 font-weight-700">{{ $data->title }}</strong>
                <span class="opacity-07 font-size-07">{{ $data->frame.$data->meridian }}</span>
             </div>
            {{-- amount --}}
             <div class="column text-align-end g-3px">
             <strong class="font-size-1 text-align-end row "><span class="max-w-full m-left-auto text-overflow-ellipsis block ws-nowrap">{{ Auth::guard('users')->user()->currency.number_format($data->amount,2) }}</span></strong>
                <small class="{{ $data->status == 'success' ? 'c-green' : ($data->status == 'pending' ? 'c-gold' : 'c-red') }}">{{ $data->status }}</small>
             </div>
               </div>
        @endforeach
             </div>
              @if ($trx->lastPage() > 1)
                  @include('components.utilities',[
                    'paginate' => true,
                    'data' => $trx
                  ])
              @endif
        @endif
    </section>
@endsection