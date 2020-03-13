@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
<style>
    body
    {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }

    #Username
    {
      border:none;
      border-bottom:1px solid;
    }

    .screen
    {
      width:100%;
      height:20px;
      background:#4388cc;
      color:#fff;
      line-height:20px;
      font-size:15px;
    }

    .smallBox::before
    {
      content:".";
      width:15px;
      height:15px;
      float:left;
      margin-right:10px;
    }
    .greenBox::before
    {
      content:"";
      background:Green;
    }
    .redBox::before
    {
      content:"";
      background:Red;
    }
    .emptyBox::before
    {
      content="";
      box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:#ccc;
    }

    .seats
    {
      border:1px solid red;background:yellow;
    } 



    .seatGap
    {
      width:40px;
    }

    .seatVGap
    {
      height:40px;
    }

    table
    {
      text-align:center;
    }


    .Displaytable
    {
      text-align:center;
    }
    .Displaytable td, .Displaytable th {
        border: 1px solid;
        text-align: left;
    }

    textarea
    {
      border:none;
      background:transparent;
    }



    /* input[type=checkbox] {
        width:0px;
        margin-right:18px;
    }

    input[type=checkbox]:before {
        content: "";
        width: 15px;
        height: 15px;
        display: inline-block;
        vertical-align:middle;
        text-align: center;
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:#ccc;
    }

    input[type=checkbox]:checked:before {
        background-color:Green;
        font-size: 15px;
    } */
    .seat {
    
        width: 20px;
        height: 20px;
        margin: 5px;
        border: solid 1px black;
        float: left;
        
        
    }
    .clearfix { clear: both;}
    .available {
        background-color: #96c131;
    }

    .hovering{
      background-color: #ae59b3;
    }
    .selected{
        background-color: red;
}
</style>
@section('content')
  <div class="row user">
    <div class="col-md-3">
      <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
            <li class="nav-item"><a class="nav-link" href="#values" data-toggle="tab">Attribute Values</a></li>
          </ul>
      </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane active" id="general">
            <div class="tile">
                <table id="seatsBlock">
                        <p id="notification"></p>
                      <tr>
                        <td colspan="14"><div class="screen">SCREEN</div></td>
                        <td rowspan="20">
                            <div class="smallBox greenBox">Selected Seat</div> <br/>
                            <div class="smallBox redBox">Reserved Seat</div><br/>
                            <div class="smallBox emptyBox">Empty Seat</div><br/>
                        </td>
                        
                        <br/>
                      </tr>
                      
                      
                    {{-- Row A --}}
                    <tr>
                      @foreach ($rows as $row)
                        @if ($row->row === 'A')
                          <td>{{$row->row}}</td>
                          @foreach ($seats as $seat)
                              @if ($seat->row === $row->row)
                                <td style="display:inline"><div class="seat available" id="click_seat" data-seat="{{$seat->seat_number}}" name="{{$seat->name}}" value="{{$seat->name}}"></div></td>
                              @endif
                          @endforeach
                        @endif
                      @endforeach
                    </tr>
                    {{-- Row B --}}
                    <tr>
                      @foreach ($rows as $row)
                        @if ($row->row === 'B')
                          <td>{{$row->row}}</td>
                          @foreach ($seats as $seat)
                              @if ($seat->row === $row->row)
                                <td style="display:inline"><div class="seat available" id="click_seat" data-seat="{{$seat->seat_number}}" name="{{$seat->name}}" value="{{$seat->name}}"></div></td>
                              @endif
                          @endforeach
                        @endif
                      @endforeach
                    </tr>
                    {{-- Row Couple --}}
                    <tr class="seat-couple">
                      @foreach ($rows as $row)
                        @if ($row->row === 'J')
                          <td>{{$row->row}}</td>
                          @foreach ($seats as $seat)
                              @if ($seat->row === $row->row)
                                <td style="display:inline"><div class="seat available" id="click_seat" data-seat="{{$seat->seat_number}}" name="{{$seat->name}}" value="{{$seat->name}}"></div></td>
                              @endif
                          @endforeach
                        @endif
                      @endforeach
                    </tr>
            
                </table>
            </div>
          </div>
          <div class="tab-pane" id="values">
              
          </div>
        </div>
    </div>
  </div>
@endsection

@push('custom_script')
<script>
  $(function(){
    $('.seat').on('click',function(){ 


      if($(this).hasClass( "selected" )){
        $( this ).removeClass( "selected" );                  
      }else{                   
        $( this ).addClass( "selected" );
      }

    });

    $('.seat').mouseenter(function(){     
        $( this ).addClass( "hovering" );

            $('.seat').mouseleave(function(){ 
            $( this ).removeClass( "hovering" );
              
            });
    });


});
  $(document).ready(function () {
      $('.seat').click(function(event){
        event.preventDefault();
        const seatID = $(this).attr("data-seat");
        console.log(seatID);
        if(seatID % 2 == 1) {
          const nextSeat = Number.parseInt(seatID) + 1;
          const nextSeatElement = $(`[data-seat="${nextSeat}"]`);
          if(!nextSeatElement.hasClass("selected")) {
            nextSeatElement.addClass("selected");
          } else {
            nextSeatElement.removeClass("selected");
          }
        } else if(seatID%2 == 0) {
          const prevSeat = Number.parseInt(seatID) - 1;
          const prevSeatElement = $(`[data-seat="${prevSeat}"]`);

          if(!prevSeatElement.hasClass("selected")) {
            prevSeatElement.addClass("selected");
          } else {
            prevSeatElement.removeClass("selected");
          }
        }
      });
  });
</script>
@endpush

