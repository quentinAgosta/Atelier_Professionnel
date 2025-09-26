<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="index.php?controller=livres&action=maj" method="post">
            <h3>Article detaillé</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $data["livre"]->id_livre ?>" />
            Nom: <input type="text" name="nom" value="<?php echo $data["livre"]->nom_livre ?>" class="form-control" />
            Nombre de pages: <input type="text" name="pages" value="<?php echo $data["livre"]->nombre_pages ?>" class="form-control" />
            Auteur: <input type="text" name="auteur" value="<?php echo $data["livre"]->nom_auteur ?>" class="form-control" />
            <input type="submit" value="Modifier" class="btn btn-info"/>
        </form>
        <form method="POST" action="index.php?controller=livres&action=supprimer" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $data["livre"]->id_livre; ?>" />
            <button type="submit"class="btn btn-danger"> Supprimer </button>
        </form>
    </div>
</body>
</html>