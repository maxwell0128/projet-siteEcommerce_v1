@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')
    <!-- table -->
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">List of categories</h1>
    <table class="table table-bordered">
        <thead>
            <tr role="row">
                <th class="text-dark">#</th>
                <th class="text-dark">Category name</th>
                <th class="text-dark">Modify</th>
                <th class="text-dark">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $ide = 1;
            @endphp
            @foreach ($categories as $categorie)
            <tr>
                <td>{{$ide}}</td>
                <td>{{$categorie->name_category}}</td>
                <td><a href="/Modify_categorie/{{$categorie->id}}" class="btn btn-success">Modify</a></td>
                <td><a href="/Delete_categorie/{{$categorie->id}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @php
                $ide += 1;
            @endphp
            @endforeach
        </tbody>
    </table>
    {{$categories->links() }}
@endsection

