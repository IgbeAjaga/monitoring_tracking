@extends('products.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header text-primary text-center";>Add New Report</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Branch Name:</strong></label>
            <select name="name" id="inputName" class="form-select @error('name') is-invalid @enderror">
                <option value="">Select Branch</option>
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
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDrug" class="form-label"><strong>Drug Requested:</strong></label>
            <input 
                type="text" 
                name="drug" 
                class="form-control @error('drug') is-invalid @enderror" 
                id="inputDrug" 
                placeholder="Name of Drug Requested e.g Amoksiklav 1g">
            @error('drug')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputResponse" class="form-label"><strong>Response:</strong></label>
            <select name="response" id="inputResponse" class="form-select @error('response') is-invalid @enderror">
                <option value="">Select Response</option>
                <option value="in_stock">in_stock</option>
                <option value="out_of_stock">out_of_stock</option>
                <option value="no_response">no_response</option>              
            </select>
            @error('response')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="inputCall" class="form-label"><strong>Number of Calls:</strong></label>
            <input 
                type="text" 
                name="call" 
                class="form-control @error('call') is-invalid @enderror" 
                id="inputCall" 
                placeholder="Number of  Calls Made e.g 1">
            @error('call')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection