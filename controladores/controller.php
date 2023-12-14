<?php 


// Proibe o acesso a esses arquivos no navegador
if (!defined('__INCLUDED_BY_OTHER_FILE__')) {
    // Se a constante não estiver definida, encerre a execução
    header('HTTP/1.0 403 Forbidden');
    header("Location: ./index.php");
    exit('Acesso proibido');
}

function sideBarAdm(){

    print '
        <nav id="sidebar" class="sidebar">
            <a class="sidebar-brand" href="index.html">
                <img>
                Portal Administrativo
            </a>
            <div class="sidebar-content">
                <div class="sidebar-user">
                    <img src="img/avatars/logo.jpeg" class="img-fluid rounded-circle mb-2" alt="Linda Miller">
                    <div class="fw-bold">Fábio Madruga Concursos</div>
                    <small>Esse nome aprova!</small>
                </div>
                    
                <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="home.php">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Home</span>
                </a>
                <a class="sidebar-link" href="alunos.php">
                    <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Alunos</span>
                </a>
                <a class="sidebar-link" href="mensalidades.php">
                    <i class="align-middle me-2 fas fa-fw fa-money-bill-wave"></i> <span class="align-middle">Mensalidades</span>
                </a>
                <a class="sidebar-link" href="GerarReciboManual.php">
                    <i class="align-middle me-2 fas fa-fw fa-money-check-alt"></i> <span class="align-middle">Gerar Recibo Manual</span>
                </a>
                <a class="sidebar-link" href="configuracoes.php">
                    <i class="align-middle me-2 fas fa-fw fa-tools"></i> <span class="align-middle">Configurações</span>
                </a>
                <a class="sidebar-link" href="controladores/SairSessao.php">
                    <i class="align-middle me-2 fas fa-fw fa-power-off"></i></i> <span class="align-middle">Sair</span>
                </a>
            </li>
            </ul>

            </div>
        </nav>';

};

function barraConfi() {

    print ' <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-user"></i> Meu Perfil</a>
                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-cogs"></i> Alterar Senha</a>
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="controladores/SairSessao.php"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sair</a>
            </div>';
};

function footer() {


    print "<div class='container-fluid'>
            <div class='row text-muted'>
                <div class='col-4 text-end'>
                    <p class='mb-0'>
                        &copy; <?php echo date('Y') ?> - <span class='text-muted'>Fábio Madruga Concursos</span>
                    </p>
                </div>
            </div>
        </div>";




}



 /* <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-file-download"></i> <span class="align-middle">Materiais em PDF</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-comments"></i> <span class="align-middle">Fórum</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-hands-helping"></i> <span class="align-middle">Financeiro do Aluno</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-podcast"></i> <span class="align-middle">Iniciar Transmissão</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-file-export"></i> <span class="align-middle">Publicar Materiais em PDF</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-comment"></i> <span class="align-middle">Publicar no Fórum</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 far fa-fw fa-money-bill-alt"></i> <span class="align-middle">Financeiro</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="calendar.html">
            <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Alunos</span>
        </a>
    </li>
*/

?>
