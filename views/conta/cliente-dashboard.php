<?php if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); }  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Banco Brabo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="O banco mais incrível de todos">
	<meta name="author" content="Alexandre, Flávio, Gabriel, Marcelo, Yasmin">
  <!-- styles -->
  <link href="<?php echo SRC_PATH; ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/docs.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/refineslide.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/css/animate.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="<?php echo SRC_PATH; ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo SRC_PATH; ?>assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="<?php echo SRC_PATH; ?>img/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo SRC_PATH; ?>assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo SRC_PATH; ?>assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo SRC_PATH; ?>assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo SRC_PATH; ?>assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Plato
    Theme URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">

            <div class="span4">
              <!-- logo -->
              <div class="logo">
                <img src="<?php echo SRC_PATH; ?>img/logo_banco_brabo.png" width="120px" alt="" />
                <!-- <h1><a href="index.html">Banco Brabo</a></h1> -->
              </div>
              <!-- end logo -->
            </div>

            <div class="span8">
              <!-- top menu -->
              <div class="navbar">
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">
                      <li class="dropdown active">
                        <a href="<?php echo BASE_URL; ?>conta">HOME</a>
                      </li>
                      <li class="dropdown">
                        <a href="<?php echo BASE_URL; ?>usuario/logout">SAIR</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- end menu -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="intro">

    <div class="container">
      <div class="row">
        <div class="span6">
          <h2><strong>Banco <span class="highlight primary">Brabo</span></strong> &nbsp;&nbsp; Olá @ganesher</h2>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
        <!-- Mensagens de Erro -->
          <?php if($viewData['formulario-transferencia'] == 'erro'): ?>
            <div class="alert alert-error" style="clear: both;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Falha na Transferência!</strong><br/> Verifique os número da conta e o Saldo Disponível.
            </div>
          <?php elseif($viewData['formulario-transferencia'] == 'sucesso'): ?>
            <div class="alert alert-success" style="clear: both;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Transferência Realizada!</strong><br/> O valor desejado foi transferido e debitado do seu saldo.
            </div>
          <?php endif; ?>

          <?php if($viewData['formulario-saque'] == 'erro'): ?>
            <div class="alert alert-error" style="clear: both;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Falha no Saque!</strong><br/> Verifique o valor inserido e o Saldo disponível!
            </div>
          <?php elseif($viewData['formulario-saque'] == 'sucesso'): ?>
            <div class="alert alert-success" style="clear: both;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Saque realizado!</strong><br/> O valor de saque foi debitado do seu saldo.
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="span12">
          <p class="text-right">Minha conta: <strong><?php echo $viewData['account']['accountNumber']; ?></strong></p>
        </div>
        <div class="span4">
          <div class="features">
              <div class="accordion" id="accordion6">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion6" href="#collapseOne">
                      <i class="icon-caret-down"></i> Saldo </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                      <div class="accordion-inner center">
                        <!-- inserir valor de acordo com saldo -->
                        <h3>R$ <?php echo number_format($viewData['account']['balance'], 2, ",","."); ?></h3>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
              <div class="accordion" id="accordion5">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion5" href="#collapseTwo">
                      <i class="icon-caret-right"></i> Transferência </a>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                      <div class="accordion-inner cta-box">
                        <form action="<?php echo BASE_URL; ?>conta" method="POST" role="form" class="">
                          <div class="span8 form-group">
                            <!-- falta colocar em um form -->
                            <input type="text" class="form-control" name="accountNumber" id="subject" placeholder="Número da Conta Destino" data-rule="minlen:4" required/>
                            <div class="validation"></div>
                          </div>
                          <div class="span8 form-group">
                            <input type="text" class="form-control" name="amount" id="subject" placeholder="Valor" data-rule="minlen:4" required/>
                            <div class="validation"></div>
                          </div>
                          <div class="cta center">
                            <input type="submit" name="btn-transferir" value="Ok" class="btn btn-medium btn-rounded btn-color">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
              <div class="accordion" id="accordion2">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                      <i class="icon-caret-right"></i> Saque </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                      <div class="accordion-inner cta-box">
                        <form action="<?php echo BASE_URL; ?>conta" method="post" role="form" class="">
                          <div class="span8 form-group">
                            <input type="text" class="form-control" name="amount" id="subject" placeholder="Valor" data-rule="minlen:4"/>
                            <div class="validation"></div>
                          </div>
                          <div class="cta center">
                            <input type="submit" name="btn-sacar" value="Ok" class="btn btn-medium btn-rounded btn-color">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

      </div>

      <!-- blank divider -->
      <div class="row">
        <div class="span12">
          <div class="blank8"></div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="cta-box">
            <div class="cta-text">
              <h2>Extrato</h2>
              <div class="span11"><hr></div>
              <div class="span12">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Tipo </th>
                        <th> De/Para </th>
                        <th> Data </th>
                        <th> Valor </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $rowCount = 1;
                        if(is_array($viewData['extrato'])){
                          foreach($viewData['extrato'] as $row) {
                            $tipo   = '';
                            $fromTo = '-';
                            $color  = '';
                            $dataHora = (new DateTime($row['date']))->format('d/m/Y H:i:s');
                            $amount = number_format($row['amount'], 2, ",",".");
                            
                            if(is_null($row['userToNumber'])){
                              $tipo  = 'Saque';
                              $color = 'red';
                            } elseif($row['userFromNumber'] == $viewData['account']['accountNumber']){
                              $tipo   = 'Transferência';
                              $color  = 'red';
                              $fromTo = 'para conta Nº '. $row['userToNumber'];
                            } else {
                              $tipo   = 'Depósito';
                              $color  = 'green';
                              $fromTo = 'da conta Nº '. $row['userFromNumber'];
                            }
                            // echo 
                            
                            echo '<tr>';
                            echo '<td>'. $rowCount++ .'</td>';
                            echo "<td> $tipo </td>";
                            echo "<td> $fromTo </td>";
                            echo "<td> $dataHora </td>";
                            echo "<td style=\"color: $color\"> R$ $amount </td>";

                          }
                        }
                      ?>
                    </tbody>
                  </table>
                 
                  <?php if(!is_array($viewData['extrato'])): ?>
                  <p><strong>Ainda não houveram movimentações nesta conta.</strong></p>
                  <?php endif; ?>

                </div>
            </div>
          </div>
          
          <!-- end tagline -->
        </div>
      </div>

    </div>
  </section>
  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span3">
          <div class="widget">
            <!-- logo -->
            <div class="footerlogo">
              <h6><a href="index.html">Banco Brabo</a></h6>
              <!-- <img src="<?php echo SRC_PATH; ?>assets/img/logo.png" alt="" /> -->
            </div>
            <!-- end logo -->
            <address>
				<strong>Banco Brabo business company, Inc.</strong><br>
				 4455 Great building Ave, Suite A10<br>
				 San Charles, SP 94107<br>
				<abbr title="Phone">P:</abbr> (12) 3456-7890 </address>
          </div>
        </div>

        <div class="span6">
          <div class="widget center">
            <h5>Keep updated</h5>
            <ul class="social-network">
              <li><a href="#"><i class="icon-bg-light icon-facebook icon-circled icon-1x"></i></a></li>
              <li><a href="#" title="Twitter"><i class="icon-bg-light icon-twitter icon-circled icon-1x"></i></a></li>
              <li><a href="#" title="Linkedin"><i class="icon-bg-light icon-linkedin icon-circled icon-1x"></i></a></li>
              <li><a href="#" title="Pinterest"><i class="icon-bg-light icon-pinterest icon-circled icon-1x"></i></a></li>
              <li><a href="#" title="Google plus"><i class="icon-bg-light icon-google-plus icon-circled icon-1x"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="subfooter">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; Banco Brabo - All right reserved
            </p>
          </div>
          <div class="span6">
            <div class="pull-right">
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Plato
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/modernizr.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/google-code-prettify/prettify.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/bootstrap.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.prettyPhoto.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/portfolio/setting.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/hover/jquery-hover-effect.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.flexslider.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/classie.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/cbpAnimatedHeader.min.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.refineslide.js"></script>
  <script src="<?php echo SRC_PATH; ?>assets/js/jquery.ui.totop.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="<?php echo SRC_PATH; ?>assets/js/custom.js"></script>

</body>

</html>
