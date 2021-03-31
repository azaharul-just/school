<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
    <h1 style="text-align:center;background:pink"><b>Student Management System</b></h1>
    <hr>  
 
<table id="customers">
    <tr>
      <th>#</th>
      <th>Student Parameter</th>
      <th>Student Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>ID</td>
        <td>{{$details['student']['id_no']}}</td>
    </tr> 
    <tr>
        <td>2</td>
        <td>Roll</td>
        <td>{{$details['student']['roll']}}</td>
    </tr> 
    <tr>
        <td>3</td>
        <td>Name</td>
        <td>{{$details['student']['name']}}</td>
    </tr>  
    <tr>
      <td> 4</td>
      <td>Father's Name</td>
      <td>{{$details['student']['fname']}}</td>
    </tr> 
    <tr>
        <td> 5</td>
        <td>Mothers's Name</td>
        <td>{{$details['student']['mname']}}</td>
      </tr> 
    <tr>
      <td> 6</td>
      <td>Date of Birth</td>
      <td>{{$details['student']['dob']}}</td>
    </tr>
    <tr>
      <td> 7</td>
      <td>Gender</td>
      <td>{{$details['student']['gender']}}</td>
    </tr>
    <tr>
      <td> 8</td>
      <td>Religion</td>
      <td>{{$details['student']['religion']}}</td>
    </tr>
     
    <tr>
      <td>9</td>
      <td>Class</td>
      <td>{{$details['student_class']['name']}}</td>
    </tr>
    <tr>
      <td> 10</td>
      <td>Group</td>
      <td>{{$details['group']['name']}}</td>
    </tr>
    <tr>
      <td> 11</td>
      <td>Year</td>
      <td>{{$details['student_year']['name']}}</td>
    </tr>
    <tr>
        <td> 12</td>
        <td>Shift</td>
        <td>{{$details['shift']['name']}}</td>
    </tr>
    <tr>
      <td> 13</td>
      <td>Address</td>
      <td>{{$details['student']['address']}}</td>
    </tr>
    <tr>
      <td> 14</td>
      <td>Mobile</td>
      <td>{{$details['student']['mobile']}}</td>
    </tr> 
  </table> 
<br>
  <a style="font-size:10px; float: right">Print Date: {{date('d-M-Y H:i:s')}} @ by Azaharl </a>
   
 
</body>
</html>
