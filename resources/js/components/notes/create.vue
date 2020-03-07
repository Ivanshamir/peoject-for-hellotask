<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto mt-5">
                    <div class="card-header">
                        Create New Note
                        <router-link to="/note" class="btn btn-info " style="float:right">All Notes</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="noteInsert" >
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
        data(){
            return{
                form:{
                    name: '',
                    description: ''
                },
                errors: {}
            }
        },
        methods:{
            noteInsert(){
                if(!User.loggedIn()){
                    this.offlineInsert();
                    this.notification()
                }else{
                axios.post('/api/note', this.form)
                    .then(() => {
                        this.notification()
                    })
                    .catch(error => this.errors = error.response.data.errors)
                }
            },
            offlineInsert(){
                if(this.form.name === '' || this.form.description === ''){
                    Toast.fire({
                        type: 'error',
                        title: 'Input Can Not Be Empty'
                    });
                    this.clearData();
                    return;
                }
               let note = localStorage.getItem('notes');
                let result = [];
               if(note){
                  var existing = JSON.parse(note);
                   existing.push({id: Math.floor(Math.random() * 101), name: this.form.name, description: this.form.description});
                   localStorage.setItem('notes', JSON.stringify(existing));
               }else{
                   result.push({id: Math.floor(Math.random() * 101),name: this.form.name, description: this.form.description});
                   localStorage.setItem('notes', JSON.stringify(result));
               }
                this.clearData();
            },
            clearData(){
                this.form.name = "";
                this.form.description = "";
            },
            notification(){
                this.$router.push({ name: 'allnotes' });
                Toast.fire({
                    type: 'success',
                    title: 'Data saved successfully'
                })
            }
        }
    }
</script>
