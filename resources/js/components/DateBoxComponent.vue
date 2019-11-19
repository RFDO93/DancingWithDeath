<template>
    <div v-if="dayV.block" class="dayBox" v-on:click="detailDay">
        <label >{{dayV.day}}</label>
        <label>{{this.dayWeeks[dayV.dayWeek]}}</label>
    </div>
    <div v-else class="dayBox block">
        <label >{{dayV.day}}</label>
        <label>{{this.dayWeeks[dayV.dayWeek]}}</label>
    </div>
</template>

<script>
    export default {
        props:['dayV'],
        data(){
            return {
                marginLeft:0,
                dayWeeks:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
            }
        },
        created(){
            if(this.dayV.day ===1){
                let aux = (this.dayV.dayWeek * 10) - 0.3;
                this.marginLeft =aux;
            }
        },
        methods:{
            detailDay(){
                this.$emit('detailDay');
            }
        }
    }
</script>