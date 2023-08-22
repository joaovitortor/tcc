<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESSHEET -->
    <link rel="stylesheet" href="css/styleLara.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top"></div>
            <div class="logo">
                <img src="img/logo.png">
            </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>
        
        <div class="sidebar">
            <a href="#">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Painel</h3>
            </a>
            <a href="#" class="active">
                <span class="material-icons-sharp">person_outline</span>
                <h3>Cadastros</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">receipt_long</span>
                <h3>Pedidos</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">insights</span>
                <h3>Dados</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Mensagens</h3>
                <span class="message-count">26</span>
            </a>
            <a href="#">
                <span class="material-icons-sharp">inventory</span>
                <h3>Produtos</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">report_gmailerrorred</span>
                <h3>Informações</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">settings</span>
                <h3>Configurações</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">add</span>
                <h3>Adicionar Produto</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">logout</span>
                <h3>Sair</h3>
            </a>
        </div>
        </aside>
        <!----------------------- FIM DO ASIDE ----------------------->
        <main> 
            <h1>Painel do Administrador</h1>

            <div class="date"> 
                <input type="date">
            </div>
            <div class="insights">
                <div class="sales"> 
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Venda Total</h3>
                            <h1>R$25,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Últimas 24 Horas</small>
                </div>
                <!----------------------- FIM DAS VENDAS ----------------------->
                <div class="expenses"> 
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Despesa Total</h3>
                            <h1>R$14,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Últimas 24 Horas</small>
                </div>
                <!----------------------- FIM DAS DESPESAS ----------------------->
                <div class="income"> 
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Renda Total</h3>
                            <h1>R$10,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>44%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Últimas 24 Horas</small>
                </div>
                <!----------------------- FIM DA RENDA ----------------------->
            </div>
            <!----------------------- FIM DAS DESPESAS ----------------------->
            <div class="recent-orders">
                <h2>Pedidos Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do Produto</th>
                            <th>Número do Produto</th>
                            <th>Método de Pagamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                        <tr>
                            <td>Blusa Listrada</td>
                            <td>59234</td>
                            <td>Pix</td>
                            <td class="warning">Pendente</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Mostrar Tudo</a>
            </div>
        </main>
        <!----------------------- FIM DO MAIN ----------------------->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Olá, <b>Iara</b></p>
                        <small class="text-muted">Administrador</small>
                    </div>
                    <div class="profile-photo">
                        <img src="img/perfil1.jpg"> 
                    </div>
                </div>
            </div>
            <!----------------------- FIM DO TOP -----------------------><!--
            <div class="recent-updates">
                <h2>Atualizações Recentes</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/perfil2.jpg">
                        </div>
                        <div class="message">
                            <p><b>Jõao Vitor Bidoia</b> recebeu seu pedido de Blusa Listrada.</p>
                            <small class="text-muted">2 minutos atrás</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/perfil3.jpg">
                        </div>
                        <div class="message">
                            <p><b>Lara Gimenez</b> recebeu seu pedido de Blusa Listrada.</p>
                            <small class="text-muted">2 minutos atrás</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/perfil4.jpg">
                        </div>
                        <div class="message">
                            <p><b>Dalva de Oliveira</b> recebeu seu pedido de Blusa Listrada.</p>
                            <small class="text-muted">2 minutos atrás</small>
                        </div>
                    </div>
                </div>
            </div>
            --------------------- FIM DAS ATUALIZAÇÕES RECENTES --------------------
            <div class="sales-analytics">
                <h2>Análise de Vendas</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>PEDIDOS ONLINE</h3>
                            <small class="text-muted">Últimas 24 horas</small>
                        </div>
                        <h5 class="succes">+39%</h5>
                        <h3>3849</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-sharp">local_mall</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>PEDIDOS OFFLINE</h3>
                            <small class="text-muted">Últimas 24 horas</small>
                        </div>
                        <h5 class="danger">-17%</h5>
                        <h3>1100</h3>
                    </div>
                </div>
                <div class="item costumers">
                    <div class="icon">
                        <span class="material-icons-sharp">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>NOVOS CLIENTES</h3>
                            <small class="text-muted">Últimas 24 horas</small>
                        </div>
                        <h5 class="succes">+25%</h5>
                        <h3>849</h3>
                    </div>
                </div>
                <div class="item add-product">
                    <div>
                        <span class="material-icons-sharp">add</span>
                        <h3>Adicionar Produto</h3>
                    </div>
                </div>
            </div>--->
        </div>
    </div>
    
    <script src="js/index.js"></script>
    <script src="js/pedidos.js"></script>
</body>

</html>