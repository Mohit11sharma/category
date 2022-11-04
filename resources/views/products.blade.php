<!doctype html>
<html>
<head>
    <title>@_Abc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
   
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Select Category</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('add_category')}}">
                            @csrf
                           
                            
                            <div class="form-group">
                            <label>Select Type</label>
                                <select class="form-control selectoption" name="type">
                                <option>Select category</option>
                                  <option value="Category">Category</option>
                                  <option value="Sub Category">Sub Category</option>
                                  <option value="Sub Sub category">Sub sub_category</option>
                                </select>
                            </div>
                            <div class="form-group category d-none">
                            <label>Select Category</label>
                                <select class="form-control" name="category" id="category_id">
                                <option>Select category</option>
                                @foreach($category as $categories)
                                  <option value="{{$categories->id}}">{{$categories->name}}</option>
                                  @endforeach
                                </select>
                               
                            </div>
                            <div class="form-group subcategory d-none" >
                            <label>Select Sub Category</label>
                                <select class="form-control" name="subcategory" id="subcategory_id">
                                </select>
                            </div>
                            
                            <div class="form-group name d-none">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div> 
                          
                           
                            <div class="form-group status d-none">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control"/>
                            </div> 

                            
                            
                             <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>    
</body>
  
<!-- Initialize the plugin: -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    function btnclicik()
    {
        alert('oko');
    } 


    $(document).on("change",".selectoption",function(){
        var selectoption = $('.selectoption').val();
        if(selectoption=='Category'){
            $(".name").removeClass('d-none');
            $(".status").removeClass('d-none');
            $(".category").addClass('d-none');  
            $(".subcategory").addClass('d-none');
        }
        if(selectoption=='Sub Category'){
            $(".name").removeClass('d-none');
            $(".category").removeClass('d-none');
            $(".status").removeClass('d-none');
        }

        if(selectoption=='Sub Sub category'){
            $(".name").removeClass('d-none');
            $(".category").removeClass('d-none');
            $(".subcategory").removeClass('d-none');
            $(".status").removeClass('d-none');
        }

        $('#category_id').on('change', function(){
            var subcategory_id = $(this).val();

          // alert(subcategory_id);

        $.ajax({
            url:('ajax_get'),
            type:"POST",
            data:{
                    substate:subcategory_id,
                    _token:"{{csrf_token()}}"
                },
            //dataType:"json",
            success:function(res){
                $('#subcategory_id').html(res);
            },
         });
    });


       





  

        
    });
</script>

  

</html>