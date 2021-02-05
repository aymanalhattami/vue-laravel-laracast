<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style href="{{ asset('css/bootstrap.css') }}"></style>
    </head>
    <body>
        <div id="root">
            <div class="row">
                <div class="col-md-12">
                    @include('projects.list')

                    <form action="/projects" method="POST">
                        <div class="form-group">
                            <label for="name" class="control-label">Porject Name: </label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label">Project Description</label>
                            <input type="text" id="description" name="description" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
