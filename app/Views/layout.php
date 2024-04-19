<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/layout.css">
    <?php if (isset($this->viewCss)): ?>
        <link rel="stylesheet" href="/css/<?= $this->viewCss ?>.css">
    <?php endif ?>
    <script src="/js/layout.js" defer></script>
    <?php if (isset($this->viewJs)): ?>
        <script src="/js/<?= $this->viewJs ?>.js" defer></script>
    <?php endif ?>
    <?= "<title>{$this->viewTitle}</title>" ?>
</head>
<body>
    <header>
        <a href="/" class="h1-link">
            <h1>{project_name}</h1>
        </a>
        <nav>
            <div id="menu-button">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul id="menu-list">
                <li><a href="/">Home</a></li>
                <li><a href="/teste">Teste</a></li>
                <li><a href="/user">Usuários</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            <?php $this->loadView($viewName, $modelData) ?>
        </div>
    </main>
    <footer>
        <p>Copyright, {project_name} - 2024</p>
    </footer>
</body>
</html>