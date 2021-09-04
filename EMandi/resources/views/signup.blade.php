@extends('base')
@section('title','SignUp')
@section('content')



 <div class="container">

   <div style="margin-top: 30px">
      <div class="panel panel-warning">
        <div class="panel-heading">
            <div class="panel-title text-center"><h1>Please SignUp here</h1></div>
            @if(session()->has('message'))
    
            <div class="panel-title text-center"><h3 style="color:red;">{{ session()->get('message') }}</h3></div> 
            @endif
        </div>
   <form action="create_account" method="post" enctype="multipart/form-data">
       @csrf
            <div class="panel-body" >

                <!-- <form action="#" type="POST"> -->

                    <!--First Name-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Full Name : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="text" required class="input-md form require form-control" name="name" placeholder="Full Name" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>

                

                    <!--username-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Username : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="text" required   class="input-md form require form-control" name="username"  placeholder="Username" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>

                    <!--CNIC-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">CNIC : </label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="text" required  class="input-md form require form-control" name="cnic"  id="cnic" placeholder="XXXXX-XXXXXXX-X"
                                   maxlength="15" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13 ? null : event.charCode >= 48 && event.charCode <= 57)" style="margin-bottom: 15px"/>
                        </div>
                    </div>

                    <!--Phone No.-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Phone No. :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input required  class="input-md form require form-control" name="contact"  id="phone" placeholder="03XX-XXXXXXX" type="text" style="margin-bottom: 15px"
                                   maxlength="12" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13 ? null : event.charCode >= 48 && event.charCode <= 57)"/>
                        </div>
                    </div>


                    <!--Email-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-2 requiredField">Email Address :</label>
                        <div class="controls col-md-8 col-lg-4 ">
                            <input type="email"  required  class="input-md form require form-control" name="email"   placeholder="Email Address" style="margin-bottom: 15px" type="text" />
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
                            <input type="text" required  class="input-md form require form-control" name="city"   placeholder="City" style="margin-bottom: 15px" type="text" />
                        </div>
                    </div>

                <!--Address-->

                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4 col-lg-12 requiredField">Address : </label>
                        <div class="controls col-md-8 col-lg-12 ">
                            <input type="text" required  class="input-md form require form-control" name="address"   placeholder="Address" style="margin-bottom: 15px" type="text" />
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
                    <input required type="file" name="image" class="file" id="photo"accept="image/*">
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 " style="margin-bottom: 40px">
                            <input type="submit" name="Signup" disabled value="Signup" class="btn btn-success" id="saveBtn" /></div>
                    </div>

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
