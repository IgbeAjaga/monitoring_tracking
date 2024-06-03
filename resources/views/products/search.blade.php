@extends('products.layout')

@section('content')

<div class="card mt-5">
  <!-- <h2 class="card-header text-center text-primary">Search Results</h2> -->
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
      <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">
        <i class="fa fa-arrow-left"></i> Back
      </a>
      <button class="btn btn-success btn-sm" onclick="window.print()">
        <i class="fa fa-print"></i> Print
      </button>
    </div>

    <!-- Small Table to show aggregated data -->
    <h2 class="card-header text-center text-primary"><strong>SUMMARY OF:</strong> 
    @if(request('drug'))  {{ request('drug') }} @endif
    @if(request('response')) drugs {{ request('response') }} - @endif
    @if(request('branch')) {{ request('branch') }} branch @endif
    @if(request('date_from')) from {{ request('date_from') }} @endif
    @if(request('date_to')) to {{ request('date_to') }} @endif
  </h2>
    <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Drug</th>
                    <th>Asokoro</th>
                    <th>Maitama</th>
                    <th>Garki</th>
                    <th>Gimbiya PX</th>
                    <th>New Ademola</th>
                    <th>Old Ademola</th>
                    <th>Old Gwarinpa</th>
                    <th>New Gwarinpa</th>
                    <th>Gwarina 3</th>
                    <th>Gana PX</th>
                    <th>Ferma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drugData as $data)
                    <tr>
                        <td>{{ $data['drug'] }}</td>
                        <td>{{ $data['Asokoro'] }}</td>
                        <td>{{ $data['Maitama'] }}</td>
                        <td>{{ $data['Garki'] }}</td>
                        <td>{{ $data['Gimbiya PX'] }}</td>
                        <td>{{ $data['New Ademola'] }}</td>
                        <td>{{ $data['Old Ademola'] }}</td>
                        <td>{{ $data['Old Gwarinpa'] }}</td>
                        <td>{{ $data['New Gwarinpa'] }}</td>
                        <td>{{ $data['Gwarina 3'] }}</td>
                        <td>{{ $data['Gana PX'] }}</td>
                        <td>{{ $data['Ferma'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <h2 class="card-header text-center text-primary"><strong>DETAILS OF:</strong> 
    @if(request('drug'))  {{ request('drug') }} @endif
    @if(request('response')) drugs {{ request('response') }} - @endif
    @if(request('branch')) {{ request('branch') }} branch @endif
    @if(request('date_from')) from {{ request('date_from') }} @endif
    @if(request('date_to')) to {{ request('date_to') }} @endif
  </h2>
    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th width="80px">SN</th>
          <th>Branch Name</th>
          <th>Drug Requested</th>
          <th>Response</th>
          <th>Number of Calls</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($products as $product)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->drug }}</td>
            <td>{{ $product->response }}</td>
            <td>{{ $product->call }}</td>            
            <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5">No results found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {!! $products->links() !!}
  </div>
</div>
@endsection
