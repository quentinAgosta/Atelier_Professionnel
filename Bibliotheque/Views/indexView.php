<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 

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
        <form action="index.php?controller=livres&action=creer" method="POST" class="col-lg-5">
            <h3>Ajouter un livre à la bibliotheque</h3>
            Nom du livre : <input type="text" name="nom_livre" class="form-control">
            Nombre de pages : <input type="text" name="nombre_pages" class="form-control">
            Nom de l'auteur : <input type="text" name="nom_auteur" class="form-control">
            <input type="submit" value="Send" class="btn btn-primary">
        </form>
        <div class="col-lg-7">
            <h3>Bibliotheque</h3>
            <hr/> 
        </div>
    
        <section class="col-lg-7" style="height:400px;overflow-y:scroll;">
            <?php foreach($data["livre"] as $livre) { ?>
                <?php echo $livre["nom_livre"]; ?> - 
                <?php echo $livre["nombre_pages"]; ?> - 
                <?php echo $livre["nom_auteur"]; ?> - 
                <div class="right">
                    <a href="index.php?controller=livres&action=detail&id=<?php echo $livre['id_livre']; ?>" 
                    class="btn btn-info">
                        Detail
                    </a>
                    <form method="POST" action="index.php?controller=livres&action=supprimer" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $livre['id_livre']; ?>">
                        <button type="submit" style="" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                <hr/>
            <?php } ?>
        </section>
    </body>
</html>