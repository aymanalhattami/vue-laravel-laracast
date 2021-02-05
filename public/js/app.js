Vue.prototype.$http = axios;

new Vue({
    el: "#root",

    data: {
        // skills: ["html", 'css', 'php', 'js', 'wordpress', 'laravel']
        skills: []
    },

    mounted(){
        this.$http.get('/skills')
            .then(response => this.skills = response.data)
            .catch(error => console.log(error));
    },
});
