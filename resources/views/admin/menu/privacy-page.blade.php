@extends('admin.layout.master')
@section('title', 'Privacy Policy')
@section('content')



 <main class="app-content">
     <h3>Privay & Policy Content</h3>
     <hr />
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
          <!---Success Message--->  
          
          <!---Error Message--->
          
           
            <div class="tile-body">
              <form  method="post">
              	@csrf
                
                @foreach($data as $data)
                @endforeach
                <div class="form-group col-lg-12">
                  <label>Add Content</label>
                   <textarea style="height: 319px;" name="editor1" class="form-control">{{$data->content}}</textarea>
                </div>


                <div class="form-group col-md-4 align-self-end">
                
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value=" Update">
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
      
    </main>
<script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>


@endsection