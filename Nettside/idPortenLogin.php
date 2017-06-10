<?php session_start(); ?>
<html lang="no">
    <head>
        <title>Digipost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/idpLogin2.css">
    </head>
    <body>
        <div class="container start">
            <div id="wrapper">
                <div class="top-panel">
                    <?php include 'IdPortenHeader.html'; ?>
                </div>
            </div>
            <div id="header">
                <strong class="logo"><a tabindex="150" href="index.html" title="Digipost"><img alt="Tjenesteleverandørens logo kan for tiden ikke lastes." src="CSS/IMG/digipost-logo.png"></a></strong>
                <h1>Digipost</h1>
            </div>
            <div id="main">
                <div id="content">
                    <div class="box">
                        <div class="box-top">
                            <h2 class="with-logo">Velg elektronisk ID:</h2>
                        </div>
                        <ul class="choices">
                                <li>
                                    <a id="BankIDJS" href="idPortenBankID.php" tabindex="3" title="Velg BankID">
                                        <img src="CSS/IMG/logo-bankID-big.gif" alt="BankID" width="100" height="50">
                                        <span class="text">
                                            <span class="btn-title">BankID</span>
                                            <span class="btn-ingress">Med koder fra banken din</span>
                                        </span>
                                    </a>
                                </li>
                        </ul>
                        <div class="box-bottom">
                            <ul class="menu">
                                <li><a target="_blank" href="http://eid.difi.no/nb/id-porten/slik-skaffer-du-deg-elektronisk-id" tabindex="6">Slik skaffer du deg elektronisk ID</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
          </div>
    </body>
</html>
