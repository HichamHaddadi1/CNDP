@extends('layouts.admin')


@section('admin_content')

<style>

    
h1{
  font-size: 30px;
  color: #000;
  text-transform: uppercase;
  font-weight: bold;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: #007bff;
 
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: bold;
  font-size: 12px;
  color: #000;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: bold;
  font-size: 12px;
  color: #000;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}




/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #000;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: rgb(0, 0, 0);
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
{{-- <table>
    <thead>
        <th>Owner</th>
        <th>Start date</th>
        <th>end date</th>
    </thead>
    <tbody>
           @foreach($hr as $h)
           <tr>
               <td>{{$h->user_id}}</td>
               <td>{{$h->start_date}}</td>
               <td>{{$h->end_date}}</td>
           </tr>
           @endforeach
    </tbody>
</table> --}}

<section class="container">
    <!--for demo wrap-->
    <h1>Seminars History List</h1>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Owner</th>
            <th>Event theme</th>
            <th>Start date</th>
            <th>end date</th>
           
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            @foreach($hr as $h)
           <tr>
               <td>{{$h->name}}</td>
               <td>{{$h->event_theme}}</td>
               <td>{{$h->start_date}}</td>
               <td>{{$h->end_date}}</td>
               

           </tr>
           @endforeach
         
        </tbody>
      </table>
    </div>
  </section>
  
 <script>
     $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
 </script>
@endsection