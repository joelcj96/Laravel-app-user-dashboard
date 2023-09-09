<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category 

        </h2>

        <b></b> 
    </x-slot>


    <div class="container mt-3">
        
            @if (session()->has('success'))
        
        <ul>
            <li class="text-success mb-3 fw-bold">{{ session('success') }}</li>
        </ul>

        @elseif (session('updated'))

        <ul>
            <li class="text-success mb-3 fw-bold">{{ session('updated') }}</li>
        </ul>

        
        @elseif (session('delete'))

        <ul>
            <li class="text-success mb-3 fw-bold">{{ session('delete') }}</li>
        </ul>
    @endif
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h1>All Category</h1>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category )
                              
                             
                            <tr>
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>


                                    <a class="btn btn-info" href="{{ url('/category/edit/'.$category->id) }}">Edit</a>
                                    <form class="btn btn-dark" action="{{ url('category/all/'.$category->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <input type="submit"  value="Move to bin">
                                    </form>
                                </td>
                              </tr> 
                              
                                
                             
                                

                          @endforeach
                            
                        </tbody>
                      </table>
                      <p class="">{{ $categories->links() }}</p>

                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Category</h1>
                    </div>
                  
                    <form action="{{ route('store.category') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group m-3">
                            <label for="textInput" class="mb-2">Add Category:</label>
                            <input type="text" name="category_name" class="form-control rounded-4" id="textInput" placeholder="Enter text">

                          @error('category_name')
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
