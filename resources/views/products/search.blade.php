@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header text-center text-primary">Search Results</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
      <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">
        <i class="fa fa-arrow-left"></i> Back
      </a>
      <button class="btn btn-success btn-sm" onclick="window.print()">
        <i class="fa fa-print"></i> Print
      </button>
    </div>
    

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
