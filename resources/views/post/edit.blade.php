@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('post.update',$post->id) }}">
                        @csrf
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter post description" rows="10" required></textarea>
                          </div>
                          <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
