<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto mt-5">
                    <div class="card-header">
                        Update Note
                        <router-link to="/note" class="btn btn-info " style="float:right">All Notes</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="noteUpdate" >
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Note Name</label>
                                        <input class="form-control" id="name" type="text" v-model="form.name">
                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" v-model="form.description" class="form-control" rows="5"></textarea>
                                        <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary " type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        created(){
            let id = this.$route.params.id;
            axios.get('/api/note/'+id)
                .then(( {data} ) => (this.form = data))
                .catch(console.log('error'))
        },
        data(){
            return{
                form:{
                    name: '',
                    description:''
                },
                errors: {}
            }
        },
        methods:{
            noteUpdate(){
                let id = this.$route.params.id;
                axios.patch('/api/note/'+id, this.form)
                    .then(() => {
                        this.$router.push({ name: 'allnotes' })
                        Toast.fire({
                            type: 'success',
                            title: 'Note updated successfully'
                        })
                    })
                    .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>
