import { default } from './EliminarReceta.vue';
<template>
    <input 
        type="submit" 
        class="btn btn-danger d-block w-100 mb-2" 
        value="Eliminar ×"
        @click="eliminarReceta"
    >
</template>

<script>

    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                
            }
        },
    }
   
</script>