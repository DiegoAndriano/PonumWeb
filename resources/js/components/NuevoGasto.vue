<template>
    <form
        @submit.prevent="onSubmitClicked"
        class=""
        action="/"
        method="POST">
        <div class="flex pt-4 pb-4">
            <input style="outline:none;"
                   class="w-2/5 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                   :class="fronterrors.nombre ? 'border-red-500' : ''"
                   type="text" placeholder="Gasto"
                   v-model="form.nombre">
            <input style="outline:none;"
                   class="w-1/4 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                   type="text" placeholder="Precio"
                   :class="fronterrors.precio ? 'border-red-500' : ''"
                   v-model="form.precio">

            <autocomplete ref="autocomplete" :categorias="categorias"></autocomplete>

            <button type="submit" class="text-green-600">
                <svg width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <g fill="none" class="stroke-current">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="10" y1="14" x2="21" y2="3"/>
                        <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5"/>
                    </g>
                </svg>
            </button>
        </div>

        <p
            class="text-green-500 underline cursor-pointer mt-4"
            v-if="! mostrar_mas"
            v-on:click="mostrar_mas = true">Mostras más</p>
        <div
            v-if="mostrar_mas"
            class="flex items-center mt-4">
            <input
                id="fecha"
                style="outline:none;"
                class="w-1/4 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                type="date" placeholder="dd/mm/aa"
                v-model="form.date"
                maxlength="8">
        </div>
        <p
            v-on:click="mostrar_mas = false"
            v-if="mostrar_mas"
            class="text-green-500 underline cursor-pointer mt-4">Mostrar menos</p>
    </form>
</template>

<script>
export default {
    props: {
     categorias: String,
    },
    data() {
        return {
            mostrar_mas: false,
            fronterrors: {},
            form: {
                nombre: '',
                precio: '',
                categoria: '',
                moneda: 'ARS',
                fecha: '05-04-2021',
            }
        }
    },
    mounted() {

    },
    methods: {
        addDashToDate(element) {
            let e = document.querySelector('#fecha');

            e = e.value.split('/').join('');    // Remove dash (-) if mistakenly entered.
            let finalVal = e.match(/.{1,2}/g).join('/');
            document.querySelector('#fecha').value = finalVal;
        },
        onSubmitClicked() {
            this.getCategoria();
            if (this.validate()) {
                this.loading = true;

                axios
                    .post('/gasto/', this.form)
                    .catch(this.onFail.bind(this))
                    .then(this.onSuccess.bind(this))

                // setTimeout(function () {
                //     let el = document.querySelector('.btn-contacto-rapido')
                //     el.classList.remove('btn-contacto-rapido')
                //     el.classList.add('btn-contacto-rapido-success')
                //     this.loading = false;
                //     this.exito = true;
                //     this.success = "Será contactado a la brevedad."
                // }.bind(this), 2000);
            }
        },
        onFail(error) {
            this.submited = false
            this.errors = error.response.data.errors;
            throw error;
        },
        onSuccess(response) {
            this.errors = {};
            this.submited = false
            return response;
        },
        validate() {
            this.fronterrors = {}
            if (!this.form.nombre) {
                this.fronterrors = {'nombre': 'Es necesario ingresar un gasto.'}
                return false
            }
            if (!this.form.precio) {
                this.fronterrors = {'precio': 'Es necesario ingresar un precio.'}
                return false
            }
            if (this.form.categoria) {
                if(! JSON.parse(this.categorias).some((item) => {
                    return item.toLowerCase() === this.form.categoria.toLowerCase()
                })){
                    this.fronterrors = {'categoria': 'La categoría debe existir.'}
                    return false
                }
            }
            return true
        },
        getCategoria(){
            this.form.categoria = this.$refs.autocomplete.categoria
        },
    }
}

</script>
