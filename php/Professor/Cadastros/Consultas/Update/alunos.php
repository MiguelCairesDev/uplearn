<?php

    session_start();

    include ('../../../../mysqlconecta.php');

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $turma = $_POST['turma'];
        
        $update_query = "UPDATE alunos SET alu_nome = '$nome', alu_turma = '$turma' WHERE alu_id = $id";
        
        if (mysqli_query($conexao, $update_query)) {
            header("Location:../alunos.php");
            exit();
        } else {
            echo "<script>alert('Erro ao atualizar aluno.');</script>";
        }
    }else{

    $query = "SELECT alu_id, alu_nome, alu_turma
              FROM alunos WHERE alu_id = $id ORDER BY alu_id";
    $result = mysqli_query($conexao, $query);

    $query_turma = "SELECT tur_nome FROM turmas";
    $result_turma = mysqli_query($conexao, $query_turma);

    $aluno = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplearn | <?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']." | ".$_SESSION['turma']; }else{ header("Location: ../Index/index.php"); exit(); } ?></title>
    <link rel="stylesheet" href="../../../../../css/menu/style.css">
    <link rel="stylesheet" href="../../../../../css/general/settings.css">
    <link rel="stylesheet" href="../../../../../css/general/fonts.css">
    <link rel="stylesheet" href="../../../../../css/general/elements.css">
    <link rel="stylesheet" href="../../../../../css/general/attributes.css">
    <link rel="stylesheet" href="../../../../../css/pages/index.css">
        <link rel="stylesheet" href="../../../../../css/pages/cadastros.css">
        <link rel="stylesheet" href="../../../../../css/pages/menu.css">
    <link rel="shortcut icon" href="https://dseedgestao.sp.senai.br/assets/media/logos/senai_logo_small_red.png" type="image/png">
</head>
<body>

    <nav class="menu noSelect">

        <ul>

            <li><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/8/8c/SENAI_S%C3%A3o_Paulo_logo.png" alt="logo  "></li>

            <li><a href="../../../../Professor/menu.php"><?php if (isset($_SESSION['prof'])) { echo $_SESSION['prof']; }else{ echo "Professor"; } ?></a></li>

        </ul>

    </nav>

    <div class="container">

        <h1 class="tex bold red SdarkRed">Atualizar Aluno</h1>
        <form class="alunos bold redBC mediumBS solid light-redBT" action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $aluno['alu_nome'] ?>" required>
            </div>
            <div class="form-group">
                <label for="responsavel">Turma:</label>
                <select id="turma" name="turma" required>
                    <option value="">Selecione uma turma</option>
                    <?php while ($turma = mysqli_fetch_assoc($result_turma)) {
                        if ($turma['tur_nome'] == $_SESSION['turma']) {?>
                            <option selected value="<?php echo $turma['tur_nome']; ?>">
                                <?php echo $turma['tur_nome']; ?>
                            </option>
                        <?php }else{ ?>
                            <option value="<?php echo $turma['tur_nome']; ?>">
                                <?php echo $turma['tur_nome']; ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <button class="btn" type="submit">Atualizar aluno</button>
        </form>

    </div>
    
</body>
</html>