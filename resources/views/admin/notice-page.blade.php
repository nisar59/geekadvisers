@extends('admin.layout.master')
@section('title', 'Create Notice')
@section('content')

    <main class="app-content">
        <h3>Add Notice</h3>
        <hr />
        <div class="row">

            <div class="col-md-12">
                <div class="tile">
                    <!---Success Message--->

                    <!---Error Message--->


                    <div class="tile-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-12">
                                <label class="control-label">Notice Title</label>
                                <input class="form-control" name="notice" id="category"
                                    type="text"placeholder="Add Notice">
                                @if ($errors->has('notice'))
                                    <div class="text-danger">{{ $errors->first('notice') }}</div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Notice Discription</label>
                                    <textarea class="form-control" name="notice_dec" placeholder="Notice Discription"></textarea>
                                @if ($errors->has('notice_dec'))
                                    <div class="text-danger">{{ $errors->first('notice_dec') }}</div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Upload Pdf</label>
                                <input class="form-control" type="file" name="notice_pdf">
                                @if ($errors->has('notice_pdf'))
                                    <div class="text-danger">{{ $errors->first('notice_pdf') }}</div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Expire Date</label>
                                <input class="form-control" type="date" name="expire_date">
                            </div>

                            <div class="form-group col-md-4 align-self-end">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Create">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

       <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Notice Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            </tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->notice }}</td>
                                    <td>
                                        <a href="{{ route('notice.edit', $data->id) }}"><button class="btn btn-info"
                                                type="button">Edit&nbsp;<i class="fa-solid fa-pen"></i></button>
                                        </a>
                                        <a href="{{ route('notice.delete', $data->id) }}"
                                            onclick="return confirm('Are you Sure?')"><button class="btn btn-danger"
                                                type="button">Delete&nbsp;<i class="fa-solid fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
