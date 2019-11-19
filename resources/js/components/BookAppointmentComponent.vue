<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <control-panel-component
                    :date="date"
                    @changeDate="updateValue"
                />
            </div>
        </div>
        <br>
        <h5>Calendar</h5>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="dateBox">
                    <date-box-component
                            v-for="day in days"
                            :key="day.day"
                            :dayV="day"
                            @detailDay="detailDay(day.date)"
                    />
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modalDetail">
            <div class="modal-dialog modal-lg" role="document">
                <div class="" v-if="this.listDetail === null"></div>
                <detail-appointment-component
                    v-else
                    :listDetail="listDetail"
                    :date="this.selectDay"
                ></detail-appointment-component>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                days:[],
                date:null,
                listDetail:null,
                listHour:[],
                selectDay:null,
            }
        },
        created() {
            let date = new Date();

            let yearSet = date.getFullYear();
            let monthSet = date.getMonth()+1;
            let daySet = date.getDate();

            let day = new Date(yearSet, monthSet, 0).getDate();

            this.date = {
                form:{
                    date:yearSet+'-'+monthSet+'-'+daySet,
                }
            }

            let dayMonth = [];

            for(let i=1;i <= day;i++){
                let dayWeek = new Date(date.getFullYear(), (date.getMonth()), i).getUTCDay();

                dayMonth.push({
                    day: i,
                    block: dayWeek >0 && dayWeek<6 && date.getDate() <=i ? true : false,
                    dayWeek,
                    date:yearSet+'-'+(monthSet < 10 ? '0'+monthSet : monthSet)+'-'+(i < 10 ? '0'+i : i),
                });
            }

            this.days = dayMonth;
        },
        mounted(){
            $('#modalDetail').on("hidden.bs.modal", this.hidenModalAppointment)
        },
        methods:{
            updateValue(dateSet){

                let yearaux = dateSet.substring(0,4);
                let monthaux = dateSet.substring(5,7);
                let dayaux = dateSet.substring(8,10);

                let dateNow = new Date();

                let date = new Date(yearaux,monthaux-1,dayaux);

                let yearSet = date.getFullYear();
                let monthSet = date.getMonth()+1;
                let daySet = date.getDate();

                //console.log(yearSet,monthSet,daySet);

                let day = new Date(yearSet,monthSet, 0).getDate();


                this.date = {
                    form:{
                        date:dateSet,
                    }
                };

                let dayMonth = [];

                for(let i=1;i <= day;i++){
                    let dayWeek = new Date(yearSet,(monthSet !== 1 ? monthSet-1 : 12), i).getUTCDay();
                    let block = true;

                    if ((monthSet < dateNow.getMonth()+1 && yearSet === dateNow.getFullYear()) || (dayWeek == 0 || dayWeek == 6)
                        || (monthSet === dateNow.getMonth()+1 && dateNow.getDate() > i) )
                        block=false;

                    dayMonth.push({
                        day: i,
                        block,
                        dayWeek,
                        date:yearSet+'-'+(monthSet < 10 ? '0'+monthSet : monthSet)+'-'+(i < 10 ? '0'+i : i),
                    })
                }

                this.days = dayMonth;
            },
            detailDay(day){
                axios.post('Appointment/detail',{date:day}).then((response) => {
                    this.listDetail = response.data;
                    this.selectDay = day;
                    console.log(response.data);
                    $('#modalDetail').modal();
                });

            },
            hidenModalAppointment(){
                this.selectDay = null;
            }
        }
    }
</script>
