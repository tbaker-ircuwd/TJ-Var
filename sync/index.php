<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <style>
        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 30px;
            height: 30px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #000000;
            border-color: #000000 transparent #000000 transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body style="margin:0;">
    <div id="loader" class="hidden"
        style="width:100%;height:100%;z-index:1000;position:fixed;background-color: rgba(128, 128, 128, 0.349);margin:0;">
        <div class="lds-dual-ring"></div>
    </div>
    <button onclick="run()">Run Script</button>
    <textarea id='result' readonly></textarea>
</body>

<script>
    function run() {
        $.ajax({
            url: "/run.php",
            beforeSend: function () {
                document.getElementById('loader').classList.remove('hidden');
            },
            success: function (data) {
                document.getElementById('result').value = data;
            },
            error: function (textStatus, errorThrown) {
            }
        });
    }

    $(document).ajaxComplete(function () {
        document.getElementById('loader').classList.add('hidden');
    });
</script>

</html>
