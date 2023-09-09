<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi image

        </h2>

        <b></b> 
    </x-slot>


    <div class="container mt-3">
        
        
        
        <div class="row">
            <div class="col-md-8">
                <div class="card-group">
                    @foreach ($data as $img)

                    <div class="col-4 md-4 mt-5">
                        <div class="card">
                          <img src="{{ asset($img->multi_image) }}">
                        </div>
                     </div>
                        
                    @endforeach



                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Multi image</h1>
                    </div>
                  
                    <form action="{{ route('store.index') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group m-3">
                            

                            <label for="textInput" class="mt-2 mb-2 fw-bold">Add your image:</label>
                            <input type="file" name="multi_image[]" class="form-control rounded-4" id="textInput" multiple="">


                          @error('multi_image')
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
