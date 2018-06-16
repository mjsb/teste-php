<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="../interface/main_adm.php">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo $activeHm; ?>">
                <a class="nav-link" href="../produtos/index.php">Home</a>
            </li>
            <li class="nav-item dropdown <?php echo $activePr; ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item <?php echo $activeLs; ?>" href="../produtos/listar.php">Listar</a>
                    <a class="dropdown-item <?php echo $activeCd; ?>" href="../produtos/form.php">Cadastrar</a>
                </div>
            </li>
        </ul>
    </div>
</nav>