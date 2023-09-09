<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand

        </h2>

        <b></b> 
    </x-slot>


    <div class="container mt-3">
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Brand</h1>
                    </div>
                  
                    <form action="{{ url('brand/update/'.$update->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <input type="hidden" name="old_image" value="{{ $update->brand_image }}">
                        <div class="form-group m-3">
                            <label for="textInput" class="mb-2 fw-bold">Edit Brand:</label>

                            @error('brand_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror


                            <input type="text" name="brand_name" class="form-control rounded-4" id="textInput" placeholder="Enter text" value="{{ $update->brand_name }}">

                            <label for="textInput" class="mt-2 mb-2 fw-bold">Edit brand image:</label>
                            <input type="file" name="brand_image" class="form-control rounded-4" id="textInput" placeholder="Enter text" value="{{ $update->brand_image }}">


                          @error('brand_image')
                              <p class="text-danger mt-2">{{ $message }}</p>
                          @enderror


                        </div>


                      <div class="form-group mt-3">
                          <img src="{{ asset($update->brand_image) }}" style="height: 320px; width:500px;">
                      </div>


                        <button type="submit" class="m-3"><span class="btn btn-dark">Update</span></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
