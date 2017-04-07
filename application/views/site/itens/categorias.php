<?php

if (isset($id_categoria) and isset($nome) and isset($descricao) and isset($fotos) and isset($subcategorias) and isset($total_produtos)):

    $_POST['id_categoria'] = $id_categoria;
    $_POST['nome'] = $nome;
    $_POST['descricao'] = $descricao;
    $_POST['fotos'] = $fotos;
    $_POST['subcategorias'] = $subcategorias;
    $_POST['total_produtos'] = $total_produtos;

endif;


if (empty($_POST['fotos'])):

    $foto = base_url('assets/img/noimage.gif');

else:

    $explode_ft = explode('(<==>)', $_POST['fotos']);
    $foto = base_url('web/fotos/categorias/') . $explode_ft[0];

endif;

$replace = array('@', '#', '/', '|', '\'', '(', ')');

?>

<div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
    <a href="<?php echo base_url('categoria/').str_replace(' ', '-', str_replace($replace, '', strtolower($_POST['nome'])))?>">
        <img style="height: 200px;" src="<?php echo $foto; ?>" alt="<?php echo $_POST['nome']; ?>">
        <p><?php echo $_POST['nome']; ?></p>
    </a>
</div>


