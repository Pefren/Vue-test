<template>
    <div>
        <p>Create new note</p>

        <form v-on:submit="saveForm()">
            Id: <input type="text" v-model="note.id">
            Title: <input type="text" v-model="note.title">

            <div v-for="error in formErrors.id">
                {{ error }}
            </div>

            <button>Отправить</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                noteId: null,
                note: {
                    title: '',
                    id: ''
                },
                formErrors: {
                    id: '',
                    title: ''
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newNote = app.note;
                axios.post('/api/note/create', newNote)
                    .then( function(response) {
                        app.$router.push({path: '/'});
                    }, function(error) {
                        console.log(error.response.data.errors);
                        app.formErrors = error.response.data.errors;// So here I just replaced it.
                        // this.errors.password = response.data.body.password;
                    });
            }
        }

    }
</script>