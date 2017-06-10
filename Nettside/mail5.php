<html lang="no">
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/mail1.css">
        <script src="JS/timeout.js"></script>
 
    <?php
include("required.php");
$userid = $_SESSION['id'];
include("db.php");
include 'navn.php';
?>

    </head>
    <body>
        <div id="page">
            <header>
                <?php include 'mailheader.html';?>
            </header>            
            <div id="menu"><div><nav class="nav" role="navigation">
        <div class="">
        <ul>

        <li class="send ui-not-min left-menu-button skiplink-target" 
                    tabindex="-1">
            <a href="#/send" class="button button-dark-flat button-small-font" 
               accesskey="1"> <i aria-hidden="true" class="fa fa-pencili"></i> Nytt brev</a>
        </li>

            <li class="postkassen droppable ui-droppable active" data-id="INBOX">
                <a href="mailside.php" accesskey="2">
                    <i class="picture1">
                    </i>Postkassen
                     <div class="picture1">&nbsp;</div>
                   
            </a>
            </li>


                <li class="kvitteringer">
                    <a href="" accesskey="3"><div class="picture2">&nbsp;</div> E-kvitteringer</a>
                    
                </li>


            <li class="utkast">
                <a href="" accesskey="4"><div class="picture3">&nbsp;</div><i aria-hidden="true" class="fa fa-file"></i> Usendte brev</a>
                
            </li>

            <li class="sendt">
                <a href="" accesskey="5"><div class="picture5">&nbsp;</div><i aria-hidden="true" class="fa fa-paper-plane"></i> Sendte brev</a>
                
            </li>

            </ul>
            
            <div id="folders" style="display: block;"><div>
                   <h3 class="folder-header"> Mine mapper</h3>

<div class="scrollable-folders sortable  folders ps-container">
<ul>

    <li class="folder droppable arkivet ui-droppable" data-id="68793086" draggable="true">
        <a href="" class="nokey" draggable="false">

        <div class="picture4">&nbsp;</div><i aria-hidden="true" class="fa fa-arrows-v movearrows"></i>
        <i aria-hidden="true" class="fa fa-archive"> </i>
        <span class="mappenavn tooltip" data-tooltip-delay="200" >Arkivet</span>
        </a>
            <span class="actions">

                 <i class="fa fa-pencil edit tooltip" aria-label="Rediger mappen" ></i>
            </span>
    </li>

</ul>
<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 210px; display: none;">
    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 32px; display: none;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>

<ul>
    <li class="lagmappe">
        
        <a href="" class="nokey"><div class="picture6">&nbsp;</div><i class="fa fa-plus"></i> Opprett mappe</a>
    </li>
</ul>

</div></div>
        </div>
                    </nav>
                </div>
            </div>
            
       
            
            
<div id="main" role="main">
    <div class="main-inner main-menu" id="view-main" style="display: block;"><div><div><div class="items items-table items-doc"><div class="inner">

<div class="list-tools"><div><div class="toolbar" role="toolbar"><div class="toolbar-inner">
    <div class="toolbar-first">
        <embed name="plugin" src="PDF/test5.pdf" type="application/pdf" id="plugin">
        


    </div>

</div></div>



<p class="empty search-empty hide">
</p>

</div>

</div></div>
</div></div></div>
</div>
            
            
        </div>
    </body>
</html>
