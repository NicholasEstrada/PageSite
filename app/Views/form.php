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
                <p class="navbar-brand"><?php echo anchor(base_url('email'), 'Página Gerencial')  ?></p>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <?php echo form_open('envia/store') ?>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" id="nome" value="<?php echo isset($email['nome']) ? $email['nome'] : '' ?>" type="text" name="nome">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" value="<?php echo isset($email['email']) ? $email['email'] : '' ?>" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="tel" id="telefone" value="<?php echo isset($email['telefone']) ? $email['telefone'] : '' ?>" name="telefone" onkeypress="mask(this, telefone);" onblur="mask(this, telefone);" />
        </div>
        <div class="form-group">
            <label for="mesagem">Mensagem</label>
            <input class="form-control" id="mesagem" value="<?php echo isset($email['mesagem']) ? $email['mesagem'] : '' ?>" type="text" name="mesagem">
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
        <?php echo form_close() ?>
    </div>
</div>
    <script type="text/javascript" charset="UTF-8">
        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                // 11+ digits. Format as 5+4.
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                // 6..10 digits. Format as 4+4
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                // 3..5 digits. Add (0XX..)
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                // 0..2 digits. Just add (0XX
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }
    </script>

</body>

</html>