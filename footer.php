    </div> <!-- /container -->


    <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="http://eudy.260mb.net"><?php echo $label->FooterDerechos; ?></a></p>
      </div>
    </footer>


    <div id="modalPrimeraVez" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Bienvenido a la red social de agimerca</h4>
      </div>
      <div class="modal-body">
        <!--p>One fine body&hellip;</p-->
          <h4 class="text-center">Instructivo de como usar nuestra red social</h4>
          <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" id="viEmbe" src="https://www.youtube.com/embed/aKdV5FvXLuI?rel=0&autoplay=1 "></iframe>
            </div>
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<input id="logueadoprimeravez" type="hidden" value="<?php echo $_SESSION["primeravez"]; ?>" />

    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/docs.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="application/javascript">
        $(document).ready(function (){
            if($("#logueadoprimeravez").val() == 1){
            $('#modalPrimeraVez').modal('show');
            $('#modalPrimeraVez').on('hidden.bs.modal', function (e) {
              $("#logueadoprimeravez").val("0");
              $.ajax({
                  url:"ajax.php",
                  data:{accion:"primeravez"},
                  type:"post",
                  dataType:"html",
                  success:function (){
                     console.log("completo");                  
                  },
                  error:function (){
                      console.log("Nada bueno");
                  }
              });
            });
            }else{
                $("#viEmbe").attr("src","https://www.youtube.com/embed/aKdV5FvXLuI");
            }
            $("#btpublicar").click(function (event){
                event.preventDefault();
                //var writer = new tinymce.html.Writer({indent: true});
                //alert("ddddd");
                if($("#agregarproducto").val() == 1){
                    if($("#categoria_id").val() == 0){
                        alert("Debe de seleccionar el mercado");
                        $("#categoria_id").focus();
                        return false;
                    }
                    else if($("#relacion_sector_roll_id").val() == 0){
                        alert("Debe de seleccionar el sector");
                        $("#relacion_sector_roll_id").focus();
                        return false;
                    }
                    else if($("#relacion_producto_sector_id").val() == 0){
                        alert("Debe de seleccionar el producto");
                        $("#relacion_producto_sector_id").focus();
                        return false;
                    }
                    
                }else{
                    
                    var ed = tinyMCE.get('post');
 		             var contenido = ed.getContent();
                    //alert(contenido);
                    
                    if( (contenido == "") && ( $("#imgProducto").val() == 0 ) ){
                        alert("Ingrese el texto a publicar o ponga una imagen");
                        $("#post").focus();
                        return false;
                    }
                }
                $("#formPublicaciones").submit();
            });
        });
    </script>
  </body>
</html>