<template>
    <div class="card-columns">
        <spinner-component v-if="loading"></spinner-component>
        <div class="card text-center" v-for="dato in heroes">
            <div class="card-body">
                <h5 class="card-title">{{dato.name}}</h5>
                <p class="card-text">{{dato.history}}</p>
                <p class="card-text"><small class="text-muted">{{dato.anio}}</small></p>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../event-bus';
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

        created(){
            EventBus.$on('add-dato', data=>{
                this.heroes.push(data);
            }); //Escuchamos el evento creado que llamamos 'add-dato' y lo agregamos a la data
        },

        mounted(){
            axios.get('/datos').then(response=>{this.heroes=response.data; this.loading = false;});
        }
    }
</script>

<style scoped>

</style>