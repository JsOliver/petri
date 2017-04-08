<h1 style="text-align: center;">Completar Cadastro</h1>
<p style="text-align: center;">Complete seu cadastro para poder participar dos leilões</p>
<span id="errorReport"></span>
<!--Inicio Scripts -->
<script>
    $('#cpf-mask').mask('000.000.000-00', {reverse: true});
    $('#cpf-socio-mask').mask('000.000.000-00', {reverse: true});
    $('#cnpj-mask').mask('00.000.000/0000-00', {reverse: true});
    $('#ddn-mask').mask('00/00/0000');



    $('#cpf-form').validate({
        rules: {
            cpf: { minlength: 14, required: true},
            rg: { required: true},
            ddn: {minlength: 10,required: true},
            sexo: { required: true },
            ncd: { required: true},
            ppr: { required: true}
        },
        messages: {
            cpf: { cpf: 'CPF inválido',required:'Informe seu CPF'},
            rg: { required: 'Informe seu RG' },
            ddn: { brazilianDate: 'Data Inválida', required: 'Informe a Data de Nascimento' },
            sexo: { required: 'Informe seu Sexo' },
            ncd: { required: 'Informe sua Nacionalidade'},
            ppr: { required: 'Informe sua Profissão'}
        },
        submitHandler: function( form ){
            var dados = $( form ).serialize();

            $.ajax({
                type: "POST",
                url: DIR+"Ajax/comletecad",
                data: dados,
                beforeSend: function(){ $('.content-loading').html(carregando()); },
                error: function(data){
                    $('.content-loading').html('');
                    alert(data);
                },
                success: function( data )
                {

                    if(data == 1111){
                        $('.content-loading').html('');

                        lancemodal();

                    }else{


                        $('.content-loading').html('');

                        $("#errorReport").html(data);
                    }
                }
            });

            return false;

        }
    });

    $('#cnpj-form').validate({
        rules: {
            cnpj: { minlength: 18, required: true},
            cpf_nsd: {minlength: 14,required: true}

        },
        messages: {
            cnpj: { cnpj: 'CNPJ inválido',required:'Informe seu CPF'},
            cpf_nsd: {cpf_nsd:'CPF inválido', required: 'Informe o CPF do Socio/Diretor'}

        },
        submitHandler: function( form ){
            var dados = $( form ).serialize();

            $.ajax({
                type: "POST",
                url: DIR+"Ajax/comletecad",
                data: dados,
                beforeSend: function(){ $('.content-loading').html(carregando()); },
                error: function(data){
                    $('.content-loading').html('');
                    alert(data);
                },
                success: function( data )
                {
                    if(data == 1111){
                        $('.content-loading').html('');
                        window.location.reload();

                    }else{


                        $('.content-loading').html('');

                        $("#errorReport").html(data);
                    }
                }
            });

            return false;

        }
    });

</script>
<!--Fim Scripts -->


<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" style="text-align: center;">
        <li role="presentation" class="active"><a href="#cpf" aria-controls="cpf" role="tab" data-toggle="tab">Sou Pessoa Fisica</a></li>
        <li role="presentation"><a href="#cnpj" aria-controls="cnpj" role="tab" data-toggle="tab">Sou Pessoa Juridica</a></li>
    </ul>
<br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="cpf">
            <form method="post" action="<?php echo base_url('LoginForm'); ?>" id="cpf-form">

                <div class="form-group group">
                    <label for="cpf-mask">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf-mask"
                           placeholder="Informe seu CPF" required>
                </div>

                <div class="form-group group">
                    <label for="log-password">RG</label>
                    <input type="text" class="form-control" name="rg" id="rg-mask"
                           placeholder="Informe seu RG" required>
                </div>
                <div class="form-group group">
                    <label for="log-password">Endereço Completo</label>
                    <input type="text" class="form-control" name="ec" id="rg-mask"
                           placeholder="Endereço Completo" required>
                </div>

                <div class="form-group group">
                    <label for="log-password">Data de Nascimento</label>
                    <input type="text" class="form-control" name="ddn" id="ddn-mask"
                           placeholder="00/00/0000" required>
                </div>

                <div class="form-group group">
                    <label for="log-password">Sexo</label>
                   <select class="form-control" name="sexo">
                   <option value="1">Masculino</option>
                   <option value="2">Feminino</option>
                   <option value="3">Outro</option>
                   </select>
                </div>
                <div class="form-group group">
                    <label for="log-password">Nacionalidade</label>
                    <input type="text" class="form-control" name="ncd" id="nacio-mask"
                           placeholder="Infome sua Nacionalidade" required>
                </div>

                <div class="form-group group">
                    <label for="log-password">Profissão</label>
                    <input type="text" class="form-control" name="ppr" id="ppr-mask"
                           placeholder="Informe sua Profissão" required>
                </div>

                <input type="hidden" name="type" value="1">


                <!--   <div class="form-group group">
                       <label for="log-password">Comprovante de Residência<br> <small>(Alguma Tipo de Conta Residencial, como de Agua ou Energia.)</small></label>
                       <input type="file" class="form-control" name="ccr" id="ccr-mask"
                              placeholder="Comprovante de Residência" required>
                   </div> -->
                <?php

                $this->db->select('como_conheceu');
                $this->db->from('cogs');
                $this->db->order_by('id','desc');
                $this->db->limit(1,0);
                $get = $this->db->get();
                $count = $get->num_rows();

                if($count > 0):
                $result = $get->result_array();
                    $explode_inds = explode(',',$result[0]['como_conheceu']);

                ?>
                <div class="form-group group">
                    <label for="log-password">Como nos Conheceu?</label>
                    <select class="form-control" name="conheceu">
                        <option value="Não Informado" selected style="display: none">Selecione Uma Opção</option>
                        <?php
                        foreach ($explode_inds as $value){
                        ?>
                        <option value="<?php echo $value;?>"><?php echo $value;?></option>

                        <?php } ?>

                    </select>
                </div>

                <?php endif;?>


                <!--  <div class="checkbox">
                      <label><input type="checkbox" name="remember"> Lembre-me</label>
                  </div>-->
                <input style="text-align: center;" class="btn btn-success" type="submit" value="Completar Cadastro">
            </form>

        </div>





        <div role="tabpanel" class="tab-pane" id="cnpj">

            <form method="post" action="<?php echo base_url('LoginForm'); ?>" id="cnpj-form">

                <input type="hidden" name="type" value="2">

                <div class="form-group group">
                    <label for="log-email">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj-mask"
                           placeholder="Entre com Seu CNPJ" required>
                </div>

                <div class="form-group group">
                    <label for="log-email">Razão Social</label>
                    <input type="text" class="form-control" name="razao" id="razao-mask"
                           placeholder="Entre com Sua Razão Social" required>
                </div>

                <div class="form-group group">
                    <label for="log-email">Inscrição Estadual</label>
                    <input type="text" class="form-control" name="ine" id="ie-mask"
                           placeholder="Entre com Sua Inscrição Estadual" required>
                </div>

                <div class="form-group group">
                    <label for="log-email">Inscrição Municipal</label>
                    <input type="text" class="form-control" name="inm" id="im-mask"
                           placeholder="Entre com Sua Inscrição Municipal" required>
                </div>

                <div class="form-group group">
                    <label for="log-email">Nome Sócio/Diretor</label>
                    <input type="text" class="form-control" name="nsd" id="ns-mask"
                           placeholder="Nome Sócio/Diretor" required>
                </div>

                <div class="form-group group">
                    <label for="log-email">CPF do Sócio/Diretor</label>
                    <input type="text" class="form-control" name="cpf_nsd" id="cpf-socio-mask"
                           placeholder="CPF do Sócio/Diretor" required>
                </div>


                <div class="form-group group">
                    <label for="log-password">Sexo do Sócio/Diretor</label>
                    <select class="form-control" name="sexo_diretor">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outro</option>
                    </select>
                </div>

                <div class="form-group group">
                    <label for="log-email">Funcionário Contato</label>
                    <input type="text" class="form-control" name="funcc" id="funcc-mask"
                           placeholder="Funcionário Contato" required>
                </div>

                <div class="form-group group">
                    <label for="log-password">Sexo do Contato</label>
                    <select class="form-control" name="sexo_contato">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outro</option>
                    </select>
                </div>

                <?php

                if($count > 0):

                    ?>
                    <div class="form-group group">
                        <label for="log-password">Como nos Conheceu?</label>
                        <select class="form-control" name="conheceu">
                            <option value="Não Informado" selected style="display: none">Selecione Uma Opção</option>
                            <?php
                            foreach ($explode_inds as $value){
                                ?>
                                <option value="<?php echo $value;?>"><?php echo $value;?></option>

                            <?php } ?>

                        </select>
                    </div>

                <?php endif;?>


                <input type="hidden" name="typeLog" value="1">


                <input class="btn btn-success" type="submit" value="Completar Cadastro">
            </form>

        </div>

    </div>

</div>

