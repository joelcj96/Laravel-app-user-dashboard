<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand

        </h2>

        <b></b> 
    </x-slot>


    <div class="container mt-3">
        
            @if (session()->has('image'))
        
        <ul>
            <li class="text-success mb-3 fw-bold">{{ session('image') }}</li>
        </ul>

        @elseif (session()->has('update'))

        <ul>
            <li class="text-success mb-3 fw-bold">{{ session('update') }}</li>
        </ul>

    @endif
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h1>All Brand</h1>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($brands as $brand )
                              
                             
                            <tr>
                                
                                <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                <td>{{ $brand->brand_name }}</td>
                                
                                <td> <img src="{{ asset($brand->brand_image)}}" style="height: 100px; width:170px" alt="brand image"></td>
                                <td>{{ $brand->created_at->diffForHumans() }}</td>
                                <td>


                                    <a class="btn btn-info" href="{{ url('brand/edit/'.$brand->id)}}">Edit</a>
                                    
                                </td>
                              </tr> 
                              
                                
                             
                                

                          @endforeach
                            
                        </tbody>
                      </table>
                      <p class="">{{ $brands->links() }}</p>

                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Brand</h1>
                    </div>
                  
                    <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group m-3">
                            <label for="textInput" class="mb-2 fw-bold">Add Brand:</label>

                            @error('brand_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror


                            <input type="text" name="brand_name" class="form-control rounded-4" id="textInput" placeholder="Enter text">

                            <label for="textInput" class="mt-2 mb-2 fw-bold">Add brand image:</label>
                            <input type="file" name="brand_image" class="form-control rounded-4" id="textInput" placeholder="Enter text">


                          @error('brand_image')
                              <p class="text-danger mt-2">{{ $message }}</p>
                          @enderror


                        </div>
                        <button type="submit" class="m-3"><span class="btn btn-dark">Submit</span></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
