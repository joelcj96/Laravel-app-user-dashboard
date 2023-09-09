<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category 

        </h2>

        <b></b> 
    </x-slot>


    <div class="container mt-3">
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Category</h1>
                    </div>
                  
                    <form action="{{ url('update/'.$category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group m-3">
                            <label for="textInput" class="mb-2">Update Category Name:</label>
                            <input type="text" name="category_name" class="form-control rounded-4" id="textInput" placeholder="Enter text"  value="{{ $category->category_name }}">

                          @error('category_name')
                              <p class="text-danger mt-2">{{ $message }}</p>
                          @enderror


                        </div>
                        <button type="submit" class="m-3"><span class="btn btn-dark">Update</span></button>
                    </form>

                </div>
            </div>

</x-app-layout>
