<template>
<div class="modal" id="adddata" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Formulario-->
                <form @submit.prevent="saveData">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" v-model="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="history">Password</label>
                        <input type="text" v-model="history" class="form-control" id="history" placeholder="Texto">
                    </div>
                    <div class="form-group">
                        <label for="anio">Año</label>
                        <input type="text" v-model="anio" class="form-control" id="anio" placeholder="Año">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import EventBus from '../event-bus'; //Importamos el EventBus para compartir los datos entre componentes
    export default{
        name:"modalDataComponent",

        data(){
            return{
                name:null,
                history:null,
                anio:null
            }
        },

        methods:{
            saveData: function() {
                axios.post('/datos',{
                    name:this.name,
                    history:this.history,
                    anio:this.anio
                })
                    .then(function(response){
                        //console.log(response)
                        $('#adddata').modal('hide'); //cerramos modal
                        EventBus.$emit('add-dato',response.data.dato); //damos un nombre al evento 'add-dato' y mandamos la información response.data.dato
                        console.log(response.data.dato);
                    }
                ).catch(function(error){
                    console.log(error) //Capturamos el error
                });
                console.log(this.name)
            }
        }
    }
</script>