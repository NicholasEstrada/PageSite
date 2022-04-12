<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
    <style>
        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>

    <script>
        function confirma() {
            if (!confirm('Deseja excluir registro?')) {
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
<div class="contariner mt-5">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <p class="navbar-brand"><?php echo anchor(base_url('editaemail'), 'Edita Recebimentos')  ?></p>
            </div>
        </nav>
    </div>

    <div class="contariner mt-5">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($emails as $mail) : ?>
                <tr>
                    <td><?php echo $mail['id'] ?></td>
                    <td><?php echo $mail['nome'] ?></td>
                    <td><?php echo $mail['emailto'] ?></td>
                    <td><?php echo $mail['telefone'] ?></td>
                    <td><?php echo $mail['mesagem'] ?></td>
                    <td>
                        <?php echo anchor('email/edit/' . $mail['id'], 'Editar') ?>

                        <?php echo anchor('email/delete/' . $mail['id'], 'Excluir', ['onclick' => 'return confirma()']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <?php echo $pager->links() ?>
    </div>
    </div>
</body>

</html>