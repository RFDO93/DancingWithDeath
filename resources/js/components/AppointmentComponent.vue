<template>
    <tr>
        <td>{{quotes.email}}</td>
        <td>{{quotes.date}}</td>
        <td>{{quotes.hour.description}}</td>
    </tr>
</template>

<script>
    export default {
        props:['quotes'],
        mounted(){
            console.log(this.quotes);
        },
        methods:{
            deleteClick(){

            }
        }
    }
</script>