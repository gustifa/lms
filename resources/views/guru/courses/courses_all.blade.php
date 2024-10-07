@extends('guru.guru_dashboard')
@section('home')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Guru</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                {{-- <a href="{{route('add.subcategory')}}" class="px-5 btn btn-primary">Add Category</a> --}}
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 8px;">No</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th style="width: 20px;">Status</th>
                            <th style="width: 20px;">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $key=> $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->phone}}</td>
                            <td> 
                                @if($item->status = 1)
                                <span class="btn btn-success">Aktive</span>
                                @else
                                <span class="btn btn-danger">InActive</span>
                                @endif
                            </td>
                            <td>
                                <a href="" class="px-5 btn btn-primary">Edit</a>
                                <a href="" id="delete" class="px-5 btn btn-danger">Delete</a>
                            </td>

                        </tr>v
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection