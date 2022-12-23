@extends('admin.layout.master')
@section('title', 'Edit Notice')
@section('content')

    <main class="app-content">
        <h3>Notice Edit</h3>
        <hr />
        <div class="row">

            <div class="col-md-12">
                <div class="tile">
                    <!---Success Message--->

                    <!---Error Message--->


                    <div class="tile-body">
                        <form method="post">
                            @csrf
                            <div class="form-group col-md-12">
                                <label class="control-label">Add Notice</label>
                                <input class="form-control" name="notice" value="{{ $data->notice }}" id="category"
                                    type="text" placeholder="Update Notice">
                                @if ($errors->has('notice'))
                                    <div class="text-danger">{{ $errors->first('notice') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Notice Description</label>
                                <textarea class="form-control" name="notice_dec" id="" cols="30" rows="5">{{ $data->notice_dec }}</textarea>
                                @if ($errors->has('notice_dec'))
                                    <div class="text-danger">{{ $errors->first('notice_dec') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Notice Type</label>
                                <select class="form-control" name="notice_type">
                                    <option value="0">New</option>
                                    <option value="1">Important</option>
                                </select>
                                @if ($errors->has('notice_type'))
                                    <div class="text-danger">{{ $errors->first('notice_type') }}</div>
                                @endif
                            </div>

                            <div class="form-group col-md-4 align-self-end">

                                <button class="btn" type="submit" style="background:#009688;color:#fff;">Update&nbsp;<i
                                        class="fa-solid fa-pencil"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>



@endsection
