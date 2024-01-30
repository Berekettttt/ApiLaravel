<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">

    @include('admin.sidebar')

      <!-- partial -->

        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top:100px;">
        <table>
        <tr style="background-color:black;">
        <th style="padding:10px;">Doctor name</th>
        <th style="padding:10px;">Phone</th>
        <th style="padding:10px;">Specialty</th>
        <th style="padding:10px;">Room No</th>
        <th style="padding:10px;">Image</th>
        <th style="padding:10px;">Delete</th>
        <th style="padding:10px;">Update</th>
</div>
</div>
</div>

        </tr>

        @foreach($data as $doctor)
        <tr align="center" style="background-color:skyblue;">

            <td style="padding:10px;">{{$doctor->name}}</td>
            <td style="padding:10px;">{{$doctor->phone}}</td>
            <td style="padding:10px;">{{$doctor->specialty}}</td>
            <td style="padding:10px;">{{$doctor->room}}</td>
            <td><img src="doctorimage/{{$doctor->image}}"></td>

            <td><a class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
          
            <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>


        </tr>
        @endforeach

        </table>

        </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>