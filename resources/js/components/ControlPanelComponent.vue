<template>
    <div class="row">
        <div class="col-3">
            <label>Date</label>
            <input type="date" v-model="date.form.date" @input="updateValue($event.target.value)" class="form-control" >
        </div>
    </div>
</template>
<script>
    export default {
        props:['date','maxDate'],
        data(){
            return {

            }
        },
        mounted() {
            /*let date = new Date();
            this.minYear = date.getFullYear();*/
        },
        methods:{
            updateValue(date){
                this.$emit('changeDate',date);
            }
        }
    }
</script>