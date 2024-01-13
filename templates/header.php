<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramen-Shop</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
        .primary-text {
            color: #424242 !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        textarea {
            border: none;
            border-bottom: 1px solid #9e9e9e;
            background-color: transparent;
            resize: vertical;
            min-height: 70px;
            outline: none;
            padding: 15px 0;
        }
        #modal {
            position: absolute; /* Important */
            background-color: white;
            border: 1px solid #9e9e9e;
            top: 50%; /* Position Y halfway in */
            left: 50%; /* Position X halfway in */
            transform: translate(-50%,-50%); /* Move it halfway back(x,y) */
            max-width: 460px;
            padding: 10px 0;
        }
        #empty-img {
            width: 30%;
            height: auto;
        }
    </style>

</head>
<body class="yellow lighten-5">
    <?php require('./components/nav.php') ?>
