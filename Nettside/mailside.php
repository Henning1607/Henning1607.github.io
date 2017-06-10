<?php  error_reporting(0); ?>
<html lang="no">
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="JS/timeout.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/mailsidecss.css">
    <?php
        include("required.php");
        include 'db.php';
        include 'navn.php';
        
        $userid = $_SESSION['id'];
        $niva2 = $_SESSION["niva2"];

    ?>
        
    </head>
    <body>
        <div id="page">
            <header>
                <?php include 'mailheader.html';?>
            </header>            
            <?php 
            include 'mailmeny.html';
            ?>
            <div id="main" role="main">
                <div class="main-inner main-menu" id="view-main" style="display: block;">
                    <div>
                        <div
                            ><div class="items items-table items-doc">
                                <div class="inner">
                                    <h1 class="heading skiplink-target" tabindex="-1">Min postkasse</h1>
                                    <p>Disse mailene er testmailer og er ikke ekte</p>
                                    <div class="list-tools">
                                        <div>
                                            <div class="toolbar" role="toolbar">
                                                <div class="toolbar-inner">
                                                    <div class="toolbar-first">
                                                        <a class="select-all" href="#"><i aria-hidden="true" class="fa fa-circle"></i> Velg alle</a>
                                                        <a class="select-none action action-disabled" href="#"><i aria-hidden="true" class="fa fa-circle-o"></i> Fjern valg</a>
                                                        </form></a>
                                                        
                                                        <a href="#" class="action-move tooltip action action-disabled" original-title="">
                                                            <i aria-hidden="true" class="fa fa-folder"></i>
                                                            <label>Flytt</label>
                                                        </a>
                                                        
                                                        <a href="#" class="action-remove tooltip action action-disabled" original-title="">
                                                            <i aria-hidden="true" class="fa fa-trash-o"></i>
                                                            <label>Slett</label>
                                                        </a>
                                                        
                                                    </div>
                                                    
                                                </div></div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="list-items">
                                        <ul class="savescroll">
                                            
                                            <li class="search-include sort-include item draggable ui-draggable" tabindex="-1" data-id="25270604">
                                                <a href="mail1.php" class="" data-index="0">
                                                    <span aria-hidden="true" class="badge">
                                                        <i class="fa fa-circle-o badge-type"></i>
                                                        <i class="fa fa-circle-o badge-blank hide"></i>
                                                        <i class="fa fa-circle badge-check hide"></i>
                                                    </span>
                                                    <strong>
                                                        <i class="icon">
                                                            <i aria-hidden="true" class="fa open-envelope"></i>        
                                                        </i>        
                                                        
                                                        <em class="subject">
                                                            <em class="sender">Posten: </em>Velkommen</em>    
                                                        
                                                    </strong>
                                                    
                                                    <span class="tags" data-sort="2016-02-25, kl.16.48">
                                                        
                                                        <span class="tag tag-date">07.04.2016</span>
                                                    </span>
                                                    
                                                </a>
                                                <p class="empty search-empty hide">
                                                </p>
                                        </div>
                                    <div class="list-items">
                                            <ul class="savescroll">
                                                
                                                <li class="search-include sort-include item draggable ui-draggable" tabindex="-1" data-id="25270604">
                                                    <a href="mail2.php" class="" data-index="0">
                                                        
                                                        <span aria-hidden="true" class="badge">
                                                            <i class="fa fa-circle-o badge-type"></i>
                                                            <i class="fa fa-circle-o badge-blank hide"></i>
                                                            <i class="fa fa-circle badge-check hide"></i>
                                                        </span>
                                                        
                                                        <strong>
                                                            <i class="icon">
                                                                <i aria-hidden="true" class="fa open-envelope"></i>        
                                                            </i>        
                                                            
                                                            <em class="subject">
                                                                
                                                                <em class="sender">Oslo Kommune : </em>Varekjøp</em>    
                                                            
                                                        </strong>
                                                        
                                                        <span class="tags" data-sort="2015-01-29, kl.16.48">
                                                            
                                                            <span class="tag tag-date">11.06.2015</span>
                                                        </span>
                                                        
                                                    </a>
                                                    
                                                    
                                                    <p class="empty search-empty hide">
                                                    </p>
                                                    
                                                </div><div class="list-items">
                                                <ul class="savescroll">
                                                    
                                                    <li class="search-include sort-include item draggable ui-draggable" tabindex="-1" data-id="25270604">
                                                        <a href="mail3.php" class="" data-index="0">
                                                            
                                                            <span aria-hidden="true" class="badge">
                                                                <i class="fa fa-circle-o badge-type"></i>
                                                                <i class="fa fa-circle-o badge-blank hide"></i>
                                                                <i class="fa fa-circle badge-check hide"></i>
                                                            </span>
                                                            
                                                            <strong>
                                                                <i class="icon">
                                                                    <i aria-hidden="true" class="fa open-envelope"></i>        
                                                                </i>        
                                                                
                                                                <em class="subject">
                                                                    
                                                                    <em class="sender">FastlegeOrdning : </em>Bytte fastlege</em>     
                                                                
                                                            </strong>
                                                            
                                                            <span class="tags" data-sort="2015-01-29, kl.16.48">
                                                                
                                                                <span class="tag tag-date">01.09.2015</span>
                                                            </span>
                                                            
                                                        </a>
                                                        
                                                        
                                                        <p class="empty search-empty hide">
                                                        </p>
                                                        
                                                        </div>
                                                        
                                                        <div class="list-items">
                                                            <ul class="savescroll">
                                                                
                                                                <li class="search-include sort-include item draggable ui-draggable" tabindex="-1" data-id="25270604">
                                                                    <a href="mail4.php" class="" data-index="0">
                                                                        
                                                                        <span aria-hidden="true" class="badge">
                                                                            <i class="fa fa-circle-o badge-type"></i>
                                                                            <i class="fa fa-circle-o badge-blank hide"></i>
                                                                            <i class="fa fa-circle badge-check hide"></i>
                                                                        </span>
                                                                        
                                                                        <strong>
                                                                            <i class="icon">
                                                                                <i aria-hidden="true" class="fa open-envelope"></i>        
                                                                            </i>        
                                                                            
                                                                            <em class="subject">
                                                                                <em  class="sender">NAF : </em>Salgskontrakt for bil</em>    
                                                                            
                                                                        </strong>
                                                                        
                                                                        <span class="tags" data-sort="2015-01-29, kl.16.48">
                                                                            
                                                                            <span class="tag tag-date">19.12.2015</span>
                                                                        </span>
                                                                        
                                                                    </a>
                                                                    
                                                                    
                                                                    <p class="empty search-empty hide">
                                                                    </p>
                                                                    
                                                                    </div>
                                    <div class="list-items" id="gjemt">
                                        <ul class="savescroll">
                                            
                                            <li class="search-include sort-include item draggable ui-draggable" tabindex="-1" data-id="25270604">
                                                <a href="mail5.php" class="" data-index="0">
                                                    <span aria-hidden="true" class="badge">
                                                        <i class="fa fa-circle-o badge-type"></i>
                                                        <i class="fa fa-circle-o badge-blank hide"></i>
                                                        <i class="fa fa-circle badge-check hide"></i>
                                                    </span>
                                                    <strong>
                                                        <i class="icon">
                                                            <i aria-hidden="true" class="fa open-envelope"></i>        
                                                        </i>        
                                                        
                                                        <em class="subject">
                                                            <em class="sender">Digipost: </em>Økt sikkerhet</em>    
                                                        
                                                    </strong>
                                                    
                                                    <span class="tags" data-sort="2016-02-25, kl.16.48">
                                                        
                                                        <span class="tag tag-date">07.04.2015</span>
                                                    </span>
                                                    
                                                </a>
                                                <p class="empty search-empty hide">
                                                </p>
                                        </div>
                                                                    
                                                                    </div></div>
                                                                    </div></div></div>
                                                                    </div>
                                                                    
                                                                    
                                                                    </div>
                                                                    </body>
                                                                    </html>
<?php 
        if($niva2 == TRUE){
            echo "<script>document.getElementById('gjemt').style.visibility = 'visible';</script>";
        } else {
            echo "<script>document.getElementById('gjemt').style.visibility='hidden';</script>";
        }
        
        
?>