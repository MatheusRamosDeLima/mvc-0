<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/layout.css">
    <?= "<title>{$this->viewTitle}</title>" ?>
</head>
<body>
    <header>
        <h1>{PROJECT_NAME}</h1>
        <nav>
            <div id="menu-button">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul id="menu-list">
                <li><a href="/">Home</a></li>
                <li><a href="/teste">Teste</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            <?php $this->loadView($viewName, $modelData) ?>
        </div>
    </main>
    <footer>
        <p>Copyright, {PROJECT_NAME} - 2024</p>
    </footer>
</body>
</html>