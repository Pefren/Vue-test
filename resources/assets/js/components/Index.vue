<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div v-if="notes.length > 0" class="panel-body">
                        Notes:
                    </div>

                    <div v-for="note,index in notes">
                        Id: {{ note.id }} ,
                        Title: {{ note.title }}
                        | <a href="#" v-on:click="deleteNote(note.id, index)"> DELETE </a>
                        | <router-link :to="{ name: 'update' , params: {id:note.id}}">UPDATE</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                notes: {}
            }
        },
        mounted() {
            var app = this;
            axios.get('api/notes')
                .then(function(resp){
                    app.notes = resp.data;
                })
                .catch(function(resp){
                    console.log(resp);
                })
        },
        methods: {
            deleteNote(id, index) {
                event.preventDefault();
                var app = this;
                var id_json = {id: id};
                axios.post('/api/note/delete', id_json)
                    .then(function(){
                        console.log('kek...');
                        app.notes.splice(index, 1);
                    })
                    .catch(function (response) {
                        console.log(response);
                    })
            }
        }
    }
</script>
