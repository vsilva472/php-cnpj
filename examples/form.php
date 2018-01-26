<?php

    // .... TODO sanitizar as entradas contra injection antes de qualquer coisa

    $str_cnpj = isset( $_POST[ 'cnpj' ] ) ? $_POST[ 'cnpj' ] : '';

    if( isset( $_POST['submit'] ) && strlen( $str_cnpj ) ) {
        require "../vendor/autoload.php";

        $cnpj = new \Vsilva472\phpCNPJ\CNPJ();
        $is_valid = $cnpj->validate( $str_cnpj );
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exemplo | phpCNPJ</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body style="padding-top:30px">

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?php if( isset( $is_valid ) && $is_valid === false ):?>
                <div class="alert alert-danger">
                    <strong>Opss</strong> CNPJ inválido.
                </div>
            <?php elseif( isset( $is_valid ) && $is_valid === true ):?>
                <div class="alert alert-success">
                    <strong>Sucesso</strong> O CNPJ informado é válido!
                </div>
            <?php endif; ?>

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Validar cnpj</h4></div>
                <div class="panel-body">
                    <form name="frmValidate" method="post" action="<?php print $_SERVER['PHP_SELF'];?>">
                        <label for="cnpj">Insira o CNPJ</label>
                        <div class="form-group">
                            <input type="text" name="cnpj" id="cnpj"
                                   class="form-control" placeholder="CNPJ" maxlength="18" value="<?php print $str_cnpj; ?>">
                        </div>
                        <input type="submit" name="submit" value="Validar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>