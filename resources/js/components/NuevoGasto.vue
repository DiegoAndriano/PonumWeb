<template>
    <div>
        <div class="flex py-16">
            <input style="outline:none;"
                   class="w-2/5 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                   type="text" placeholder="Compras varias">
            <input style="outline:none;"
                   class="w-1/4 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                   type="text" placeholder="$100">
            <input style="outline:none;"
                   class="w-1/4 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                   type="text" placeholder="Supermercado">
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
        <div class="flex items-center">
            <input
                id="fecha"
                style="outline:none;"
                class="w-1/4 transition ease-in-out duration-250 pr-4 pl-4 border border-gray-200 bg-gray-100 focus:bg-white focus:px-6 mr-4 py-2"
                type="text" placeholder="dd/mm/aa"
                maxlength="8">
            <p class="text-xs font-light items-center uppercase tracking-widest text-gray-400">viernes</p>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.addDashToDate()


    },
    methods: {
        addDashToDate(){
            document.querySelector('#fecha').addEventListener('input', function (e) {
                var target = e.target, position = target.selectionEnd, length = target.value.length;
                if(e.target.value.length < 8){
                    target.value = target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1/').trim();
                }
            });
        },
    }
}

</script>
