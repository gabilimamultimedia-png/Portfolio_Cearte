<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriela Lima | Digital Designer</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fonte INTER (Padrão profissional moderno) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- HERO SECTION: Texto Focado em Design e Técnica -->
    <section class="hero">
        <div class="profile-container anime delay-1">
            <!-- A tua foto tem de estar em: imagens/gabriela.jpg -->
            <img src="imagens/gabriela.jpg" alt="Gabriela Lima" class="profile-img">
        </div>

        <h2 class="anime delay-2">Design Visual & Multimédia</h2>
        
        <h1 class="anime delay-2">Domínio do Pixel.<br>Precisão do Vetor.</h1>
        
        <p class="anime delay-3">
            Técnico/a Especialista em Desenvolvimento de Produtos Multimédia (Cearte).
            O meu foco está na criação visual de alto impacto, combinando <strong>Ilustração Vetorial</strong>, 
            <strong>Edição Bitmap</strong> e <strong>Design de Interfaces</strong>. 
            Transformo conceitos abstratos em identidades visuais fortes e experiências digitais memoráveis.
        </p>
    </section>

    <!-- FILTROS FLUTUANTES -->
    <div class="filtros-wrapper anime delay-3">
        <nav class="filtros">
            <a href="index.php" class="<?php echo !isset($_GET['cat']) ? 'active' : ''; ?>">Todos</a>
            <a href="index.php?cat=Design" class="<?php echo (isset($_GET['cat']) && $_GET['cat'] == 'Design') ? 'active' : ''; ?>">Design</a>
            <a href="index.php?cat=Web" class="<?php echo (isset($_GET['cat']) && $_GET['cat'] == 'Web') ? 'active' : ''; ?>">Web & UI</a>
            <a href="index.php?cat=Ilustracao" class="<?php echo (isset($_GET['cat']) && $_GET['cat'] == 'Ilustracao') ? 'active' : ''; ?>">Ilustração</a>
        </nav>
    </div>

    <!-- GALERIA -->
    <main class="galeria">
        <?php
        // Lógica para filtrar a tabela 'trabalhos' dentro da base de dados 'projetos'
        if(isset($_GET['cat'])) {
            $cat = $conn->real_escape_string($_GET['cat']);
            $sql = "SELECT * FROM trabalhos WHERE categoria = '$cat' ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM trabalhos ORDER BY id DESC";
        }

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <article class="card anime">
                    <div class="card-img-box">
                        <!-- O caminho já vem com a pasta do SQL (ex: web/imagem.jpg) -->
                        <img src="imagens/<?php echo $row['imagem_url']; ?>" alt="<?php echo $row['titulo']; ?>">
                    </div>
                    
                    <div class="card-info">
                        <div>
                            <span class="card-category"><?php echo $row['categoria']; ?></span>
                            <h3><?php echo $row['titulo'];
