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
        <div class="contariner mt-5">
        <table class="table">
            <tr>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php foreach($emailto as $mail): ?>
                <tr>
                    <td><?php echo $mail['emailto'] ?></td>
                    <td>
                        <?php echo anchor('editaemail/edit/'.$mail['id'],'Editar') ?>

                        <?php echo anchor('editaemail/delete/'.$mail['id'],'Excluir', ['onclick' => 'return confirma()']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        
        </table>
    </div>
</body>
</html>