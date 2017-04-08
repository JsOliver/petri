<label style="cursor: pointer;width: 100%;">
    <div style="position: relative; float:left;cursor: pointer;width: 100%;" >
        <script>
            function searchloc(inputid,busca) {

                if(busca.length <= 0){
                    document.getElementById("todoslocdiv").style.display = "block";
                    document.getElementById("buscalovdiv").style.display = "none";

                }else
                {

                        $("#buscalovdiv").html('Carregando...');
                        $.ajax({
                            type: "POST",
                            url: DIR+"Ajax/locais",
                            data: {key:busca,tipo:<?php echo $tipo;?>},
                            error: function(data){

                                $("#buscalovdiv").html('<b style="padding: 2%;">Nenhum Resultado Encontrado.</b>');

                            },
                            success: function( data )
                            {
                                $("#buscalovdiv").html(data);


                            }
                        });

                    document.getElementById("todoslocdiv").style.display = "none";
                    document.getElementById("buscalovdiv").style.display = "block";
                }


            }
        </script>
        <div class="dropdown" >
            <button class="form-control"  id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: left">
                Todas as Regiões
                <span class="caret"></span>
            </button>
            <br>
            <br>

            <ul id="dropdown" class="dropdown-menu" aria-labelledby="dLabel" style="padding: 2%;margin-top: 7px;width: 100%; max-height: 200px; overflow-y: scroll;">
                <li style="margin: 0;padding: 0;"><h1 style="text-align: center;margin: 0;"><input id="buscalocal" onkeyup="searchloc(this.id,this.value)" class="form-control" style="height: 30px;border-radius: 0;font-size: 12pt; margin: 0;" type="text"></h1> </li>
                <?php foreach ($result as $value){  ?>
                    <div id="buscalovdiv" style="text-align: center;">
                    </div>
                    <div id="todoslocdiv" style="text-align: center;">
                        <li title="<?php echo $value['nome'];?>" style="margin: 0;padding: 1% 1% 1% 0;"><a style="font-size: 12pt;text-align: center;"><?php echo $value['nome'];?></a></li>
                <?php } ?>
            </ul>
        </div>


    </div>
</label>