<?php $this->load->view('/admin/header'); ?>
<div>
    <ul class="breadcrumb">
        <?php if(isset($bred)){ foreach ($bred as $value):?>
	    <li>
            <a href="<?=$value['url']?>"><?=$value['title']?></a>
        </li>
	    <?php endforeach;}else{?>
	    <li>
		    <a href="/admin">Главная</a>
	    </li>
	        <?php }?>
    </ul>
</div>
<?php echo $content;?>
<?php $this->load->view('/admin/footer'); ?>
