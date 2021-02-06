
class Errors {
    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }
}

class Form {
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    data() {
        /* method #1 */
        // let data = Object.assign({}, this);
        // delete data.originalData;
        // delete data.errors;

        /* method #2 */
        let data = {};
        for(let property in this.originalData){
            data[property] = this[property];
        }

        return data;
    }

    post(url){
        return this.submit('POST', url);
    }

    delete(url){
        return this.submit('DELETE', url);
    }

    submit(requstType, url) {
        return new Promise((resolve, reject) => {
            axios[requstType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.errors);

                    reject(error.response.data.errors);
                });
        });
    }

    onSuccess(data) {
        // alert(data.message);

        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

new Vue({
    el: "#root",

    data: {
        form: new Form({
            name: '',
            description: ''
        }),
        // errors: new Errors()
    },

    methods: {
        onSubmit() {
            this.form.submit('post', 'http://localhost/laravel7-vue/public/projects')
                .then(data => alert(data.message))
                .catch(errors => console.log(errors));
        }
    }
});
