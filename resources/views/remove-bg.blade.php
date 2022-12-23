<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            margin: 0;
            background-color: yellow;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

</head>

<body>
    <img src="{{ asset('storage/file.jpg') }}" alt="" srcset="">
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/global.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function removeBackground(imageUrl) {
            const image = new Image();
            image.onload = ({
                target
            }) => {
                const w = Math.round(target.width)
                const h = Math.round(target.height)

                const canvas = document.createElement('canvas')
                canvas.width = w
                canvas.height = h
                const canvasContext = canvas.getContext('2d')

                canvasContext.drawImage(target, 0, 0, target.width, target.height, 0, 0, w, h)

                const canvasImageData = canvasContext.getImageData(0, 0, w, h)
                dataLength = canvasImageData.data.length;
                for (let index = 0; index < dataLength; index += 4) {
                    const r = canvasImageData.data[index];
                    const g = canvasImageData.data[index + 1];
                    const b = canvasImageData.data[index + 2];
                    // 230
                    if ([r, g, b].every((item) => item > 120)) {
                        canvasImageData.data[index + 3] = 0;
                    }
                }
                target.width = w;
                target.height = h;
                canvasContext.putImageData(canvasImageData, 0, 0)
                document.body.append(image, canvas)
                // console.log(canvas.toDataURL('image/png'));
                $.ajax({
                    type: "POST",
                    url: url('/coba/store'),
                    data: {
                        'image': canvas.toDataURL('image/png')
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
            image.crossOrigin = "";
            image.src = imageUrl
        }
        removeBackground("{{ asset('ttd.jpg') }}")
    </script>
</body>

</html>
