<template>
    <div class="card-columns">
        <spinner-component v-if="loading"></spinner-component>
        <div class="card text-center" v-for="dato in heroes">
            <div class="card-body">
                <h5 class="card-title">{{dato.nombre}}</h5>
                <p class="card-text">{{dato.historia}}</p>
                <p class="card-text"><small class="text-muted">{{dato.fecha}}</small></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "listado-component",
        data(){ //Pasa datos
            return {
                heroes:[''],
                loading:true
            }
            /*return {
                heroes: [
                    {id:1, nombre:'Hulk', historia:'lorem xxxxx', fecha:2015},
                    {id:2, nombre:'Spider', historia:'lorem xxxxx', fecha:2015},
                    {id:3, nombre:'Batman', historia:'lorem xxxxx', fecha:2015}
                ]
            };*/
        },
        mounted(){
            axios.get('/datos').then(response=>{this.heroes=response.data; this.loading = false;});
        }
    }
</script>

<style scoped>

</style>