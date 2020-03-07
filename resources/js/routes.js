let home = require('./components/Home.vue').default;
let login = require('./components/auth/login.vue').default;
let logout = require('./components/auth/logout.vue').default;

//notes crud
let allnotes = require('./components/notes/index.vue').default;
let createnote = require('./components/notes/create.vue').default;
let editnote = require('./components/notes/edit.vue').default;

export const routes = [
    { path: '/', component: home, name:'/' },
    { path: '/login', component: login, name:'forget' },
    { path: '/logout', component: logout, name:'logout' },
    { path: '/note', component: allnotes, name:'allnotes' },
    { path: '/create-note', component: createnote, name:'createnote' },
    { path: '/edit-note/:id', component: editnote, name:'edit-note' }
];