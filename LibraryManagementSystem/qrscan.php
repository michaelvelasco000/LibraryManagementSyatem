<html>
    <head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <style>
        .div{
            background-image: url("aaaa.png");
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
    </style>
    <body>
<?php
        include('studentnavbar.php')
        ?>
      
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="div" style="padding:20% 10%;">
                    <video id="preview" width="100%;" height="80%;"></video>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="qrinsert.php" method="post" class="form-horizontal">
                    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control" hidden>
                    </form>
                   
                </div>
            </div>
        </div>

        <script>
     let scanner = new Instascan.Scanner({video: document.getElementById('preview'),scanPeriod: 2, mirror: false});
    Instascan.Camera.getCameras().then (function(cameras){
       if(cameras.length > 0 ){
           scanner.start(cameras[1]);
       }else{
           alert (' No cameras found');
       }
         }).catch (function(e) {  
       console.error(e);
    });
   scanner.addListener('scan',function(c){
       document.getElementById('text').value=(c);
       document. forms[0].submit ();
   });
        </script>
    </body>
</html>