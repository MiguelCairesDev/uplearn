<?php

    session_start();

    include ('../mysqlconecta.php');
    
    $turma = $_SESSION['turma'];

    $query = "SELECT ses_id, ses_aluno, ses_notebook, ses_note_car, ses_turma, ses_prof, ses_retirada, ses_devolucao, ses_status 
              FROM sessoes WHERE ses_turma = '$turma' ORDER BY ses_id DESC"; 
    $result = mysqli_query($conexao, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplearn | <?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']." | ".$_SESSION['turma']; }else{ header("Location: ../Index/index.php"); exit(); } ?></title>
    <link rel="stylesheet" href="../../css/menu/style.css">
    <link rel="stylesheet" href="../../css/general/settings.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <link rel="stylesheet" href="../../css/pages/index.css">
    <link rel="stylesheet" href="../../css/pages/devolucoes.css">
    <link rel="shortcut icon" href="https://dseedgestao.sp.senai.br/assets/media/logos/senai_logo_small_red.png" type="image/png">
</head>
<body>

    <nav class="menu noSelect">

        <ul>

            <li><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/8/8c/SENAI_S%C3%A3o_Paulo_logo.png" alt="logo  "></li>

            <li><a href="../Professor/menu.php"><?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']; }else{ echo "Professor"; } ?></a></li>

        </ul>

    </nav>

    <div class="container">

        <table>
            <thead>
                <tr>
                    <th class="Bigb">#</th>
                    <th class="Bigb">Aluno</th>
                    <th class="Bigb">Notebook</th>
                    <th class="Bigb">Note Car</th>
                    <th class="Bigb">Turma</th>
                    <th class="Bigb">Professor</th>
                    <th class="Bigb">Retirada</th>
                    <th class="Bigb">Devolução</th>
                    <th class="Bigb">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="bold center Bigb"><?php echo $row['ses_id']; ?></td>
                        <td class="left"><?php echo $row['ses_aluno']; ?></td>
                        <td class="right"><?php echo $row['ses_notebook']; ?></td>
                        <td class="right"><?php echo $row['ses_note_car']; ?></td>
                        <td class="center"><?php echo $row['ses_turma']; ?></td>
                        <td class="center"><?php echo $row['ses_prof']; ?></td>
                        <td class="center"><?php echo $row['ses_retirada']; ?></td>
                        <td class="center"><?php echo $row['ses_devolucao']; ?></td>
                        <td class="center bold"><?php echo $row['ses_status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>