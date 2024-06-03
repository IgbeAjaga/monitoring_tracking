@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header text-center text-primary"><strong>H-MEDIX CALL CENTRE REPORT</strong></h2>
  <div class="card-body">

    @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('products.search') }}" method="GET" class="mb-4">
      <div class="row">

        <div class="mb-3">
            <label for="inputBranch" class="form-label"><strong>Branch Name:</strong></label>
            <select name="branch" id="inputBranch" class="form-select @error('branch') is-invalid @enderror">
                <option value="">All Branches</option>
                <option value="Asokoro">Asokoro</option>
                <option value="Maitama">Maitama</option>
                <option value="Garki">Garki</option>
                <option value="Gimbiya PX">Gimbiya PX</option>
                <option value="New Ademola">New Ademola</option>
                <option value="Old Ademola">Old Ademola</option>
                <option value="Old Gwarinpa">Old Gwarinpa</option>
                <option value="New Gwarinpa">New Gwarinpa</option>
                <option value="Gwarina 3">Gwarina 3</option>
                <option value="Gana PX">Gana PX</option>
                <option value="Ferma">Ferma</option>                
            </select>
            @error('branch')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3">
          <input type="text" name="drug" class="form-control" placeholder="Enter drug">
        </div>

        <div class="mb-3">
            <label for="inputResponse" class="form-label"><strong>Response:</strong></label>
            <select name="response" id="inputResponse" class="form-select @error('response') is-invalid @enderror">
                <option value="">All Responses</option>
                <option value="in_stock">in_stock</option>
                <option value="out_of_stock">out_of_stock</option>
                <option value="no_response">no_response</option>              
            </select>
            @error('response')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3">
          <input type="date" name="date_from" class="form-control" placeholder="From Date">
        </div>
        <div class="col-md-3">
          <input type="date" name="date_to" class="form-control" placeholder="To Date">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
        </div>
      </div>
    </form>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-success btn-sm" href="{{ route('products.create') }}">
        <i class="fa fa-plus"></i> Add New Report
      </a>   
      
      <a class="btn btn-secondary btn-sm" href="{{ route('products.export') }}">
        <i class="fa fa-file-excel"></i> Export to Excel
      </a>
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
          <th width="250px">Action</th>
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
            <td>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                  <i class="fa-solid fa-list"></i> Show
                </a>
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fa-solid fa-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6">There are no data.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {!! $products->links() !!}
  </div>
</div>
@endsection
