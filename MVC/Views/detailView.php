<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP+PDO+POO+MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> <!-- Correction ajout CSS bootstrap -->
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> <!-- Correction ajout JS bootstrap -->
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
</head>
<body>
    <div class="col-lg-5 mr-auto">
        <form action="index.php?controller=articles&action=maj" method="post">
            <h3>Article detaillé</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $data["article"]->art_id ?>" />
            Nom: <input type="text" name="nom" value="<?php echo $data["article"]->art_nom ?>" class="form-control" />
            Prix: <input type="text" name="prix" value="<?php echo $data["article"]->art_prix ?>" class="form-control" />
            Poids: <input type="text" name="poids" value="<?php echo $data["article"]->art_poids ?>" class="form-control" />
            <input type="submit" value="Modifier" class="btn btn-info"/>
        </form>
        <form method="POST" action="index.php?controller=articles&action=supprimer" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $data["article"]->art_id; ?>" />
            <button type="submit"class="btn btn-danger"> Supprimer </button>
        </form>
    </div>
</body>
</html>