<template>
    <div>
        <table id="seatsBlock">
            <thead>
            <p id="notification"></p>
                <tr>
                    <td colspan="14"><div class="screen">SCREEN</div></td>
                    <td rowspan="20">
                        <div class="smallBox greenBox">Selected Seat</div> <br/>
                        <div class="smallBox redBox">Reserved Seat</div><br/>
                        <div class="smallBox emptyBox">Empty Seat</div><br/>
                    </td>
                </tr>
            </thead>
        <tbody>     
            
            <tr v-for="(row,index) in rows" :key="index">
                <td v-if="row.row =='A'">
                {{row.row}}
                <span v-for="seat in seats" :key="seat.id">
                    <input v-if="seat.row == row.row" type="checkbox" :name="seat.name" :id="seat.name" v-model="seat.name" @click="check(seat.name)">
                </span>
                </td>
                <td v-if="row.row =='B'">
                {{row.row}}
                <span v-for="seat in seats" :key="seat.id">
                    <input v-if="seat.row == row.row" type="checkbox" :name="seat.name" :id="seat.name" v-model="seat.name"> 
                </span>
                </td>     
            </tr> 
        </tbody>
        
    </table>
    <div>
        <h1 v-for="(info,index) in infoSeat" :key="index">Checkbox: {{info}} </h1>
    </div>



    </div>
</template>

<script>

    export default {
        name: "add-seat",
        props: ["roomid"],
        data() {
            return {
                seats: [],
                rows: [],
                infoSeat: [],
                seat: {},
                info: [],
            }
        },
        created() {
            this.loadSeats(this.roomid)
            this.loadRows(this.roomid)
        },
        methods: {
            loadSeats(id) {
                axios.get(`/admin/rooms/seats/load/${id}`)
                .then((response) => {
                    this.seats = response.data
                }).catch(err => {
                    console.log(err)
                })
            },
            loadRows(id) {
                axios.get(`/admin/rooms/rows/load/${id}`)
                .then(res => {
                    this.rows = res.data
                })
                .catch(err => {
                    console.log(err)
                })
            },
            check(name)
            {
                this.infoSeat.push(name)
            },

        }
    }
</script>

<style scoped>
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
      content:"";
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



    input[type=checkbox] {
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

    input[type=checkbox]:checked {
        background-color:#ccc;
        font-size: 15px;
    }
    input[type=checkbox]:checked::before {
        background-color:green;
        font-size: 15px;
    }
</style>