<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... <b>{{ Auth::user()->name }}</b>

            <b style="float:right;">Total Users {{ count($users)}} </b></b>

        </h2>

        <b></b> 
    </x-slot>

    <div class="container mt-3">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>
                   @php($i = 1)
                    @foreach ($users as $user )
                    <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                  </tr> 
                    @endforeach
                    
                </tbody>
              </table>

        </div>
    </div>
</x-app-layout>
