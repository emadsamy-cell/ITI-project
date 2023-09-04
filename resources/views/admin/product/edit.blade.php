@extends('admin.layouts.master')

@section('title' , 'Edit Product')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Book</h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Book</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('AdminProduct.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Book Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Book Name" name="title" value="{{$book->title }}" />
                        @if ($errors->has('title'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('title') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name">Book Author</label>
                        <input type="text" class="form-control" id="name" placeholder="Book author" name="author" value="{{$book->author }}" />
                        @if ($errors->has('author'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('author') }} </li>

                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price">Price</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="price2" style="color: #666afe;">$</span>
                            <input
                                type="text"
                                id="price"
                                class="form-control"
                                placeholder="Amount"
                                aria-label="john.doe"
                                aria-describedby="price2"
                                name ="price"
                                value="{{ $book->price }}"
                            />
                        </div>
                        @if ($errors->has('price'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('price') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Discription</label>
                        <textarea
                          id="basic-default-message"
                          class="form-control"
                          placeholder="Discription about the Product"
                          name="discription"
                        >{{ $book->discription }}</textarea>
                        @if ($errors->has('discription'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('discription') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="Image" class="form-label">Upload New Image</label>
                        <input class="form-control" type="file" id="Image" name="image" value="{{ $book->image }}"/>
                        @if ($errors->has('image'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('image') }} </li>

                        @endif
                    </div>


                    <div class="mb-3 row">
                        <label class="form-label" for="avaliable">Avliable</label>
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="number" value="1" id="avaliable" name ="avaliable" value="{{ $book->avaliable }}" />
                        </div>
                        @if ($errors->has('avaliable'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('avaliable') }} </li>

                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                          <button class="btn btn-primary btn-lg" type="submit">Update</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
  </div>
@endsection
