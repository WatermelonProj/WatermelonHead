<!-- morris.js -->
<script src="{{ asset('theme/gentelella/vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('theme/gentelella/vendors/morris.js/morris.min.js') }}"></script>

{{--Método para randomizar as cores do grafo--}}
<script>
    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }
</script>