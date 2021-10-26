<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
</head>

<body>

    <script>
        function fetch_data() {
            const chemin = "<?= site_url() . 'test/test_code' ?>";

            fetch(chemin)
                .then((res) => res.json())
                .then(data => console.log(data.nom[0].civilite))
                
        }

        fetch_data();
    </script>
</body>

</html>