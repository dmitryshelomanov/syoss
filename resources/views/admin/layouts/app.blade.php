<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="srf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script>
        $(document).ready(function() {

            $('.look').on('click', function() {
                window.open(
                    'http://syossdev.soc-app.ru/admin/review?check=' + $(this).data('check-href') + '&photo=' + $(this).data('image-href')
                );
            });

            var skip = 50;
            var take = 50;
            $('#more').click(function() {
                $.ajax({
                    url: '/more',
                    type: 'get',
                    data: {
                        skip: skip,
                        take: take,
                        layout: 'adminPhoto',
                        week: $(this).data("week") ? $(this).data("week") : null
                    },
                    success: function (data) {
                        skip++;
                        $('.photo-items').append(data);
                    }
                });

            });
        });
    </script>
</head>
<body>

@yield('content')
