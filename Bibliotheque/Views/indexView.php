<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bibliothèque</title>

  <!-- Bootstrap 3 -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .card h3 {
      margin-top: 0;
      margin-bottom: 15px;
    }
    .book-list {
        max-height: 400px;
        overflow-y: auto;
        overflow-x: hidden; /* empêche la barre horizontale */
    }
    .book-item {
      border-bottom: 1px solid #eee;
      padding: 12px 0;
    }
    .book-item:last-child {
      border-bottom: none;
    }
    .book-actions {
      margin-top: 8px;
    }
    .btn-sm.custom-text {
        font-size: 14px;
        padding: 5px 7px;  /* ajuste les marges internes */
        line-height: 1.2;
    }

  </style>
</head>
<body>
  <div class="container" style="margin-top:40px;">
    <div class="row">

      <!-- Formulaire -->
      <div class="col-lg-4">
        <div class="card">
          <h3>➕ Ajouter un livre</h3>
          <form action="index.php?controller=livres&action=creer" method="POST">
            <div class="form-group">
              <label>Nom du livre</label>
              <input type="text" name="nom_livre" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nombre de pages</label>
              <input type="number" name="nombre_pages" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nom de l'auteur</label>
              <input type="text" name="nom_auteur" class="form-control" required>
            </div>
            <div class="form-group">
              <label>URL de la couverture</label>
              <input type="text" name="couverture" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Ajouter</button>
          </form>
        </div>
      </div>

      <!-- Liste des livres -->
      <div class="col-lg-8">
        <div class="card">
          <h3>📚 Bibliothèque</h3>
          <div class="book-list">
            <?php foreach($data["livre"] as $livre) { ?>
              <div class="book-item">
                <div class="row">
                  <div class="col-sm-8">
                    <img src="<?php echo $livre["couverture"]; ?>" alt="Couverture du livre" style="width:80px; height:auto; margin-right:10px; float:left;">
                    <strong><?php echo $livre["nom_livre"]; ?></strong><br>
                    <small><?php echo $livre["nombre_pages"]; ?> pages - <?php echo $livre["nom_auteur"]; ?></small>
                  </div>
                  <div class="col-sm-4 text-right book-actions">
                    <a href="index.php?controller=livres&action=detail&id=<?php echo $livre['id_livre']; ?>" class="btn btn-info btn-md" style="margin-right:7px;">Détails</a>
                    <input type="hidden" name="id" value="<?php echo $livre['id_livre']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm custom-text">Supprimer</button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>