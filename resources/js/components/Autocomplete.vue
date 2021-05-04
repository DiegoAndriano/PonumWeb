<template>
    <div
        id="main"
        class="w-full">
        <input type="text" placeholder="Categoría" v-model="categoria" v-on:keyup="autoComplete"
               :class="fronterrors.categoria ? 'border-red-500' : ''"
               class="w-full transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2">
        <transition name="autocomplete">
            <div class="absolute cursor-pointer bg-white rounded-xl shadow-xl mt-4"
                 v-if="results.length">
                <ul class="items-center">
                    <li
                        v-on:click="updateCategoria(result)"
                        class="px-4 py-2 transition duration-100 hover:bg-green-100 hover:text-green-900"
                        v-for="result in results">
                        {{ result }}
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>
<script>

export default {
    props: {
        categorias: String
    },
    data() {
        return {
            categoria: '',
            results: [],
            fronterrors: {},
        }
    },
    mounted() {

    },
    methods: {
        autoComplete() {
            this.results = [];
            if (this.categoria.length > 2) {
                document.addEventListener('click', this.closeIfClickedOutside);
                document.addEventListener('keyup', this.closeIfClickedOutside);
                JSON.parse(this.categorias).map((item) => {
                    if (item.toLowerCase().includes(this.categoria.toLowerCase())) {
                        this.results.push(item)
                    }
                })
            }
        },
        updateCategoria(categoria) {
            this.categoria = categoria
            this.results = []
        },
        closeIfClickedOutside(event) {
            if (event.keyCode === 27) {
                this.results = []
                document.removeEventListener('click', this.closeIfClickedOutside);
            }
            if (!event.target.closest('#main')) {
                this.results = []
                document.removeEventListener('click', this.closeIfClickedOutside);
            }
        },
    }
}
</script>
