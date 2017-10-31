<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{!! asset('/components/bootstrap/dist/css/bootstrap.min.css') !!}">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! route('category.index') !!}">Test task</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('category.create') !!}">Create category</a></li>
                    <li><a href="{!! route('post.create') !!}">Create post</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browsers Statistics<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($browsers as $browser)
                                <li><a>{{ $browser->browser }}: {{ $browser->total }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    @yield('content')

    <script src="{!! asset('/components/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    <script>
        $(function(){
            $('#comment_form').on('submit', function(e){

                var $form = $(this);

                $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: $form.serialize()
                }).done(function(response){
                    if(response.status === 'success'){
                        $('#comments_section').append(response.comment);

                        $form.find('input[type=text], textarea').val('');
                    }
                });

                e.preventDefault();
            })
        })
    </script>
</body>
</html>