<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>

</head>

<body>
<div class="container mt-5">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <p class="navbar-brand"><?php echo anchor(base_url(), 'Página Inicial')  ?></p>
            </div>
        </nav>
    </div>
    <div class="container mt-5">

        <?php echo form_open('editaemail/store') ?>
        <div class="form-group">
            <label for="emailto">Email</label>
            <input class="form-control" id="emailto" value="<?php echo isset($emailto['emailto']) ? $emailto['emailto'] : '' ?>" type="email" name="emailto">
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
        <?php echo form_close() ?>
    </div>
</div>

</body>

</html>