<template>
    <div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> All Notes
                <router-link to="/create-note" class="btn btn-info " style="float:right">Create Supplier</router-link>
            </div>
            <div class="card-body">
                <p class="text-danger" v-if="offlineNote === 'notLoggedIn'">Data Shows From Local Storage</p>
                <div class="table-responsive">
                    <label for="">Search</label>
                    <input type="text" v-model="searchTerm" class="form-control"> <br>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr v-for="note in filterSearch" :key="note.id">
                            <td>{{ note.name }}</td>
                            <td>{{ note.description }}</td>
                            <td>
                                <router-link :to="{ name: 'edit-note', params:{id: note.id} }" class="btn btn-success" v-if="offlineNote === 'loggedIn'">Edit</router-link>
                                <a @click="deleteNote(note.id)"  class="btn btn-danger" v-if="offlineNote === 'loggedIn'">Delete</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created(){
            if(!User.loggedIn()){
                this.offlineNote = 'notLoggedIn';
            }
        },
        data(){
            return{
                notes: [],
                searchTerm:'',
                offlineNote: 'loggedIn'
            }
        },
        computed:{
            filterSearch(){
                return this.notes.filter(note => {
                    return note.name.match(this.searchTerm)
                })
            }
        },
        methods: {
            allNotes(){
                console.log(this.offlineNote)
                if(this.offlineNote == 'notLoggedIn'){

                    let note = localStorage.getItem('notes');
                    if(note){
                        this.notes =  JSON.parse(note);
                    }
                }else{
                    axios.get('/api/note')
                        .then(({data}) => (this.notes = data))
                        .catch()
                }
            },
            deleteNote(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/note/'+id)
                            .then(()=>{
                                this.notes = this.notes.filter(note => {
                                    return note.id != id
                                })
                            })
                            .catch(() => {
                                this.$router.push( {name:'allnotes' } )
                            })
                        Swal.fire(
                            'Deleted!',
                            'Your note has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },
        mounted(){
            this.allNotes();
        }
    }
</script>
