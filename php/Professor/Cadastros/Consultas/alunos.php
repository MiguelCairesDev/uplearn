<?php

    session_start();

    include ('../../../mysqlconecta.php');
    
    $turma = $_SESSION['turma'];

    $query = "SELECT alu_id, alu_nome, alu_turma, alu_note, alu_note_car
              FROM alunos
              ORDER BY (alu_turma = '{$turma}') DESC, alu_turma ASC, alu_nome ASC;"; 
    $result = mysqli_query($conexao, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplearn | <?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']." | ".$_SESSION['turma']; }else{ header("Location: ../Index/index.php"); exit(); } ?></title>
    <link rel="stylesheet" href="../../../../css/menu/style.css">
    <link rel="stylesheet" href="../../../../css/general/settings.css">
    <link rel="stylesheet" href="../../../../css/general/fonts.css">
    <link rel="stylesheet" href="../../../../css/general/elements.css">
    <link rel="stylesheet" href="../../../../css/general/attributes.css">
    <link rel="stylesheet" href="../../../../css/pages/index.css">
    <link rel="stylesheet" href="../../../../css/pages/devolucoes.css">
    <link rel="shortcut icon" href="https://dseedgestao.sp.senai.br/assets/media/logos/senai_logo_small_red.png" type="image/png">
</head>
<body>

    <nav class="menu noSelect">

        <ul>

            <li><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/8/8c/SENAI_S%C3%A3o_Paulo_logo.png" alt="logo  "></li>

            <li><a href="../../../Professor/menu.php"><?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']; }else{ echo "Professor"; } ?></a></li>

        </ul>

    </nav>

    <div class="container">

        <table>
            <thead>
                <tr>
                    <th class="Bigb">Aluno</th>
                    <th class="Bigb">Turma</th>
                    <th class="Bigb">Notebook</th>
                    <th class="Bigb">Carrinho</th>
                    <th class="Bigb"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="left"><?php echo $row['alu_nome']; ?></td>
                        <td class="left"><?php echo $row['alu_turma']; ?></td>
                        <td class="right"><?php echo $row['alu_note']; ?></td>
                        <td class="right"><?php echo $row['alu_note_car']; ?></td>
                        <td class="center"><a href="Update/alunos.php?id=<?php echo $row['alu_id']; ?>">Alterar</a></td>
                        <td class="center"><a href="">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>