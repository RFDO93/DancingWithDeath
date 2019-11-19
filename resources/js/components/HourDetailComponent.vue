<template>
    <div class="row">
        <div class="col-12">
            <div v-if="!hour.active" class="boxHorusDetailDes">
                Hour - {{hour.description}}
            </div>
            <div v-else-if="selectHour !== hour.id" class="boxHorusDetail" v-on:click="clickHour">
                Hour - {{hour.description}}
            </div>
            <div v-else class="boxHorusDetail boxHorusDetailActive" v-on:click="clickHour">
                Hour - {{hour.description}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['hour','selectHour'],
        data() {
            return {
            }
        },
        mounted(){

        },
        methods:{
            clickHour(){
                this.$emit('getHour',this.hour.id);
            }
        }
    }
</script>