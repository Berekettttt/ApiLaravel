<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <style type="text/css">

      label
      {
        display: inline-block;

        width: 200px;
      }
    </style>

    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">

    @include('admin.sidebar')

      <!-- partial -->

        @include('admin.navbar')

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
      <h1>Add Doctor</h1>

      <div class="container" align="center" style="padding-top:100px;">
        
      <form action="{{url('upload_doctor ')}}" method="POST" enctype="multipart/form-data">
        
      @csrf

          <div style="padding:15px;">

          <label>Doctor Name=</label>
          <input type="text" style="color:black;" name="name" placeholder="Write the name">

         </div>

         <div style="padding:15px;">

        <label>Phone Number=</label>
        <input type="number" style="color:black;" name="number" placeholder="Write the number">

          </div>
          <div style="padding:15px;">

        <label>Specialty=</label>
        
        <select name="specialty" style="color: black;width: 200px;">
          <option>--Select--</option>
          <option value="skin">skin</option>
          <option value="heart">heart</option>
          <option value="eye">eye</option>
          <option value="nose">nose</option>
        </select>

          </div>

          <div style="padding:15px;">

          <label>Room Number=</label>
          <input type="text" style="color:black;" name="room" placeholder="Write the room number">

          </div>
          <div style="padding:15px;">

          <label>Doctor Image=</label>
          <input type="file" name="file">

          </div>

          <div style="padding:15px;">

          
          <input type="submit" class="btn btn-success">

          </div>



        </form>


      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>