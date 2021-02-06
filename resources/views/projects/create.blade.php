<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>
    <body>
        <div id="root">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="/projects" method="POST" @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
                            <div class="form-group">
                                <label for="name" class="control-label">Porject Name: </label>
                                <input class="form-control" type="text" id="name" name="name" v-model="form.name">
                                <span v-if="form.errors.has('name')" class="text text-danger" v-text="form.errors.get('name')"></span>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label">Project Description: </label>
                                <input type="text" id="description" name="description" class="form-control" v-model="form.description">
                                <span v-if="form.errors.has('description')" class="text text-danger" v-text="form.errors.get('description')"></span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" :disabled="form.errors.any()">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @include('projects.list')
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
