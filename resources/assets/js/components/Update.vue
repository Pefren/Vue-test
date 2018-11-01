<template>
    <div>
        <p>Create new note</p>

        <form v-on:submit="saveForm()">
            <input type="text" v-model="note.id">
            <input type="text" v-model="note.title">

            <button>Отрпавить</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                noteId: null,
                note: {
                    id: '',
                    title: ''
                }
            }
        },
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            axios.get('/api/note/' + id)
                .then(function(resp){
                    app.note = resp.data;
                })
                .catch(function(resp){
                    console.log(resp);
                })
        },
        methods: {
            saveForm() {
                event.preventDefault();
                let app = this;
                let newNote = app.note;
                newNote.old_id = app.$route.params.id;
                axios.post('/api/note/update', newNote)
                    .then(function(response){
                        app.$router.push({path: '/'});
                    })
            }
        }

    }
</script>