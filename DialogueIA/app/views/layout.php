<!DOCTYPE html>
<html>
<head>
    <title>Chat + CRUD MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#111; color:#eee; }
        .split { display:flex; height:100vh; }
        .left, .right { width:50%; padding:20px; overflow:auto; }
        .left { border-right:1px solid #333; }
        input, textarea { background:#222 !important; color:#fff !important; border:1px solid #444 !important; }
        table { color:#ddd; }
    </style>
</head>
<body>

<div class="split">

    <div class="left">
        <?php include "chat.php"; ?>
    </div>

    <div class="right">
        <?php include "news.php"; ?>
    </div>

</div>

<script src="/public/app.js"></script>
</body>
</html>