<?php

session_start();
include ('../mysqlconecta.php');

$query_notebooks = "SELECT note_id, note_num, note_car, note_status FROM notebooks WHERE note_status = '0' ORDER BY note_num";
$result_notebooks = mysqli_query($conexao, $query_notebooks);

if (mysqli_num_rows($result_notebooks) != 0) {
    
    $query_carrinhos = "SELECT DISTINCT note_car FROM notebooks WHERE note_status = '0' ORDER BY note_car";
    $result_carrinhos = mysqli_query($conexao, $query_carrinhos);

    $carrinhos = [];
    while ($row = mysqli_fetch_assoc($result_carrinhos)) {
        $carrinhos[$row['note_car']] = [];
    }

    while ($row = mysqli_fetch_assoc($result_notebooks)) {
        $carrinhos[$row['note_car']][] = $row;
    }
    
    $query_alunos = "SELECT alu_nome, alu_note, alu_note_car FROM alunos WHERE alu_turma = '{$_SESSION['turma']}' AND alu_note IS NOT NULL AND alu_note_car IS NOT NULL";
    $result_alunos = mysqli_query($conexao, $query_alunos);

    $alunos = [];
    while ($row = mysqli_fetch_assoc($result_alunos)) {
        $alunos[$row['alu_note']][$row['alu_note_car']] = $row['alu_nome'];
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Uplearn | <?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']." | ".$_SESSION['turma']; } else { header("Location: menu.php"); } ?></title>
        <link rel="stylesheet" href="../../css/menu/style.css">
        <link rel="stylesheet" href="../../css/general/settings.css">
        <link rel="stylesheet" href="../../css/general/fonts.css">
        <link rel="stylesheet" href="../../css/general/elements.css">
        <link rel="stylesheet" href="../../css/general/attributes.css">
        <link rel="stylesheet" href="../../css/pages/index.css">
        <link rel="stylesheet" href="../../css/pages/aula.css">
        <link rel="shortcut icon" href="https://dseedgestao.sp.senai.br/assets/media/logos/senai_logo_small_red.png" type="image/png">
    </head>
    <body>

        <nav class="menu noSelect">
            <ul>
                <li><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/8/8c/SENAI_S%C3%A3o_Paulo_logo.png" alt="logo"></li>
                <li><a href="menu.php"><?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']; } else { echo "Professor"; } ?></a></li>
            </ul>
        </nav>

        <div class="container">
            <?php foreach ($carrinhos as $carrinho_id => $notebooks) { ?>
                <div class="carrinho blackBC solid mediumBS">
                    <h1>Carrinho <?php echo $carrinho_id; ?></h1>
                    <?php if (!empty($notebooks)) { ?>
                        <ul>
                            <?php foreach ($notebooks as $notebook) { 
                                $aluno_nome = isset($alunos[$notebook['note_num']][$notebook['note_car']]) ? $alunos[$notebook['note_num']][$notebook['note_car']] : "Sem aluno associado";
                            ?>
                                <li>Notebook <?php echo $notebook['note_num'];?> | <?php echo $aluno_nome; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p>Nenhum notebook neste carrinho.</p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </body>
    </html>

<?php
} else {
    unset($_SESSION['aula']);
    header("Location: menu.php");
}
?>
