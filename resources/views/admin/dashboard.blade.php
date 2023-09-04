@extends('admin.layouts.master')

@section('title' , 'Home')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Dashboard</h4>
        @if (\Session::has('success'))
            <li class = "list-group-item list-group-item-success">{!! \Session::get('success') !!}</li>
        @endif
        <div class="card">
            <h5 class="card-header">Borrowed books</h5>
            <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Student</th>
                    <th>Borrow Time</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($borrows as $borrow)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $borrow->book->title }}</strong></td>
                        <td>{{ $borrow->user->name }}</td>
                        <td>{{ $borrow->return_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <hr class="my-5">

        <div class="card">
            <h5 class="card-header">Students</h5>
            <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-secondary">Student</span>
                        <td>
                            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('AdminUser.edit' , $user->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <form action="{{ route('AdminUser.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"
                                    ><i class="bx bx-trash me-1"></i> Delete</button
                                    >
                                </form>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <hr class="my-5">

        <div class="card">
            <h5 class="card-header">Books</h5>
            <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach ($books as $book)
                        @if ($book->avaliable)
                            <tr>
                        @else

                            <tr class = "table-danger">
                        @endif
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $book->title }}</strong></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                        @if ($book->avaliable == 0)
                            <span class="badge rounded-pill bg-danger">Borrowed</span>
                        @else
                            <span class="badge rounded-pill bg-success"> Avaliable </span>
                        @endif
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{ $book->title }}"
                                style="width: 4.625rem;
                                        height:4.625rem;
                                        "
                              >
                                <img src="{{ asset('images/product/'.$book->image) }}" alt="Avatar" class="rounded-circle" style="border: :0px solid #fff; object-fit:cover;"/>
                              </li>

                            </ul>
                          </td>
                        <td>
                            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('AdminProduct.edit' , $book->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <form action="{{ route('AdminProduct.destroy',$book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"
                                    ><i class="bx bx-trash me-1"></i> Delete</button
                                    >
                                </form>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
