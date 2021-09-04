@extends('base')
@section('title','EditUser')
@section('content')



 <div class="container">

   <div style="margin-top: 30px">
      <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title text-center"><h1>Please SignUp here</h1></div>
        </div>
    <form method="post" action="save_edituser" enctype="multipart/form-data">
        @csrf 
      
            <div class="panel-body" >

            @foreach($users as $user)

                <!-- <form action="#" type="POST"> -->

                    <!--First Name-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Full Name : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="text" required class="input-md form require form-control" name="name" placeholder="Full Name" style="margin-bottom: 15px" type="text" value={{$user['name']}} />
                        </div>
                    </div>

                


                    <!--Phone No.-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Phone No. :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input required value={{$user['contact']}}  class="input-md form require form-control" name="contact"  id="phone" placeholder="03XX-XXXXXXX" type="text" style="margin-bottom: 15px"
                                   maxlength="12" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13 ? null : event.charCode >= 48 && event.charCode <= 57)" />
                        </div>
                    </div>


                    <!--Email-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Email Address :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input value={{$user['email']}} type="email"  required  class="input-md form require form-control" name="email"   placeholder="Email Address" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>


                    <!--Password-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Password :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="password" required  class="input-md form form-control matches" name="password"  id="pwd" placeholder="Password" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>

                    <!--Re-type-Password-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Retype Password :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="password" required  class="input-md  form-control matches" name="repassword" id="confirm_pwd"  placeholder="Retype Password" style="margin-bottom: 15px" type="text" />
                            <div id="errormsg"></div>
                            <br>
                        </div>
                    </div>

                    
                    <!--City-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">City : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input value={{$user['city']}} type="text" required  class="input-md form require form-control" name="city"   placeholder="City" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>


                     <!--Address-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Address : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input  value={{$user['address']}} type="text" required  class="input-md form require form-control" name="address"   placeholder="City" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>
                    

              

            



                    <!--Gender-->

                    <div class="form-group">
                        <label for="id_gender"  class="control-label col-md-4 col-lg-2"> Gender :</label>
                        <div class="controls col-md-8 col-lg-4 "  style="margin-bottom: 10px">
                    <select name="gender" class="form require">
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select>
                        </div>
                    </div>

                    <!--Photo-->

                    <div>
                    <label for="id-photo" class="control-label col-md-4 col-lg-2 required">Profile Pic :</label>
                    <div class="controls col-md-8 col-lg-4 "  >
                    <input  required type="file" name="image" class="file" id="photo"accept="image/*">
                    </div>
                    </div>


                      <!--Address-->

                    
                            <input hidden value={{$user['username']}} type="text"   name="username" />
                  

                    <div class="form-group">
                        <div class="aab controls col-md-4 col-lg-12 "></div>
                        <div class="controls col-md-8 " style="margin-bottom: 40px">
                    
                            <input type="submit" name="Signup" disabled value="Submit" class="btn btn-success" id="saveBtn" /></div>
                    </div>

                    

                      @endforeach

                <!-- </form>     -->
            </div>
            </form>
        </div>
    </div>
</div>


@section('script')
    
    <script type="text/javascript">
        $(document).ready(function (){


            $("input.matches").on('input',function (){
                var val1=$($('input.matches')[0]).val();
                var val2=$($('input.matches')[1]).val();
               if(val1)
                if( !val1 || !val2 || val1!=val2)
                {
                    $("#errormsg").html("Password not matching");
                    $("#errormsg").css('color','red');
                    $('#saveBtn').attr('disabled',true);
                }
                else {
                    if(val1.length<8){
                        $("#errormsg").html("Password Length Must be greater than 8");
                        $("#errormsg").css('color','red');
                        
                    }else{
                        $("#errormsg").html("Password Matched");
                    $("#errormsg").css('color','green');
                    $('#saveBtn').attr('disabled',false);   
                    }
                    
                }
            });

            $("#cnic").keypress(function (e){
                $cnic = $("#cnic").val();
                if($cnic.length == 5 || $cnic.length == 13)
                {
                    $("#cnic").val($("#cnic").val()+'-')
                }
            });
            $("#phone").keypress(function (e){
               $phone = $("#phone").val();
               if($phone.length == 4)
               {
                   $("#phone").val($("#phone").val()+'-');
               }
            });
        });
    </script>
@endsection

@stop
