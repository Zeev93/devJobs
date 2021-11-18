<template>
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        @click ="cambiarEstado"
        :class="claseEstadoVacante()"
        :key="estadoVacanteData"
    >
        {{estadoVacante}}
    </span>
</template>

<script>


export default {
    props: ['estado', 'vacanteId'],
    mounted(){
       this.estadoVacanteData = Number(this.estado)
    },
    data: function() {
        return {
            estadoVacanteData: null
        }
    },
    methods: {
        cambiarEstado(){
            if (this.estadoVacanteData === 0){
                this.estadoVacanteData = 1
            }else{
                this.estadoVacanteData = 0
            }
             // Enviar Axios
            const params = {
                estado: this.estadoVacanteData
            }
            axios
                .post('/vacantes/'+this.vacanteId, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error))
        },
        claseEstadoVacante(){
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        }


    },
    computed: {
        estadoVacante(){
            return this.estadoVacanteData === 1 ? 'Activa' : 'Inactiva'
        }
    }
}

</script>
