<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail of the day's appointments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h4>Appointment List</h4>
                            <hr>
                            <div v-if="listDetail !== null && listDetail.quotes.length > 0 ? true : false" class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Hour</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <appointment-component
                                            v-for="(quotes, index) in listDetail.quotes"
                                            :quotes="quotes"
                                            :key="index"
                                        />
                                    </tbody>
                                </table>

                            </div>
                            <div v-else class="">
                                <label>
                                    this day has no recervation
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h4>book appointment</h4>
                        </div>
                        <hr>
                        <div class="col-12" v-if="this.isErrorEmail === null ? true : false" >
                            <label>Email</label>
                            <input type="text"  class="form-control" v-model="email">
                        </div>
                        <div class="col-12" v-else >
                            <label>Email</label>
                            <input type="text"  class="form-control is-invalid" v-model="email">
                            <div class="invalid-feedback">
                                {{this.isErrorEmail}}
                            </div>
                        </div>
                        <div class="col-12" v-if="this.isErrorDate === null ? true : false">
                            <label>date</label>
                            <input type="text" class="form-control" disabled v-model="date" >
                        </div>
                        <div class="col-12" v-else>
                            <label>date</label>
                            <input type="text" class="form-control" disabled v-model="date" >
                            <div class="invalid-feedback">
                                {{this.isErrorDate}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div v-if="this.isErrorHour !== null ? true : false" class="alert alert-danger" role="alert">
                        {{this.isErrorHour}}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Hours Available</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hour-detail-component
                                v-for="(hourAux, index) in listDetail.hours"
                                :key="index"
                                :hour="hourAux"
                                :selectHour="selectHour"
                                @getHour="getHour"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" v-on:click="saveAppointment" >Save changes</button>
        </div>
    </div>
</template>

<script>
    export default {
        props:['listDetail','date'],
        data() {
            return {
                detail:null,
                email:null,
                selectHour:null,
                isErrorEmail:null,
                isErrorDate:null,
                isErrorHour:null
            }
        },
        mounted(){
            $('#modalDetail').on("hidden.bs.modal", this.hidenModalAppointment)
        },
        methods:{
            getHour(id){
                this.selectHour = id;
            },
            saveAppointment(){
                axios.post('Appointment',{
                    hour: this.selectHour,
                    email: this.email,
                    date: this.date
                }).then((response) => {
                    this.isErrorEmail=null;
                    this.isErrorDate=null;
                    this.isErrorHour=null;
                    this.detail=null;
                    this.email=null;
                    this.selectHour=null;

                    $('#modalDetail').modal('hide');


                }).catch((error) => {

                    if (error.response.status === 422){
                        if(error.response.data.errors.email !== undefined){
                            this.isErrorEmail = error.response.data.errors.email[0];
                        }

                        if(error.response.data.errors.hour !== undefined){
                            this.isErrorHour = error.response.data.errors.hour[0];
                        }

                        if(error.response.data.errors.date !== undefined){
                            this.isErrorDate = error.response.data.errors.date[0];
                        }
                    }

                }) ;
            },
            hidenModalAppointment(){
                this.selectHour = null;
            }
        }
    }
</script>